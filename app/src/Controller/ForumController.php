<?php
declare(strict_types=1);

namespace App\Controller;

class ForumController extends AppController
{
    private function prijavljenUporabnik(): ?array
    {
        $u = $this->request->getSession()->read('Auth.User');
        return is_array($u) ? $u : null;
    }

    public function index()
    {
        $query = $this->fetchTable('Recepti')->find()
            ->contain(['Uporabniki', 'Komentarji'])
            ->orderDesc('Recepti.ustvarjen');

        $this->paginate = ['limit' => 10];
        $objave = $this->paginate($query);
        $prijavljenUporabnik = $this->prijavljenUporabnik();

        $this->set(compact('objave', 'prijavljenUporabnik'));
    }

    public function view($id = null)
    {
        $objava = $this->fetchTable('Recepti')->get($id, [
            'contain' => ['Uporabniki', 'Komentarji' => ['Uporabniki']],
        ]);
        $prijavljenUporabnik = $this->prijavljenUporabnik();
        $this->set(compact('objava', 'prijavljenUporabnik'));
    }

    public function add()
    {
        $uporabnik = $this->prijavljenUporabnik();
        if (!$uporabnik) {
            $this->Flash->error('Prijaviti se moraš za objavljanje.');
            return $this->redirect(['controller' => 'Uporabniki', 'action' => 'login']);
        }

        $recept = $this->fetchTable('Recepti')->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['uporabnik_id'] = $uporabnik['id'];

            // Združi več kategorij
            if (!empty($data['kategorije']) && is_array($data['kategorije'])) {
                $data['kategorija'] = implode(', ', $data['kategorije']);
            }

            $recept = $this->fetchTable('Recepti')->patchEntity($recept, $data);

            if ($this->fetchTable('Recepti')->save($recept)) {
                $this->Flash->success('Objava uspešno objavljena in dodana med recepte!');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Napaka pri shranjevanju.');
        }

        $this->set(compact('recept', 'uporabnik'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $uporabnik = $this->prijavljenUporabnik();

        if (!$uporabnik) {
            return $this->redirect(['controller' => 'Uporabniki', 'action' => 'login']);
        }

        $recept = $this->fetchTable('Recepti')->get($id);

        if ($uporabnik['vloga'] !== 'admin' && (int)$recept->uporabnik_id !== (int)$uporabnik['id']) {
            $this->Flash->error('Nimate dovoljenja.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->fetchTable('Recepti')->delete($recept)) {
            $this->Flash->success('Objava izbrisana.');
        }

        return $this->redirect(['action' => 'index']);
    }
}