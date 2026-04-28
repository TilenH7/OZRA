<?php
declare(strict_types=1);

namespace App\Controller;

class ReceptiController extends AppController
{
    public function index()
    {
        $query = $this->Recepti->find()->contain(['Uporabniki'])->orderDesc('Recepti.ustvarjen');
        $iskanje = trim((string)$this->request->getQuery('q'));
        $kategorija = trim((string)$this->request->getQuery('kategorija'));

        if ($iskanje !== '') {
            $query->where([
                'OR' => [
                    'Recepti.naslov LIKE' => '%' . $iskanje . '%',
                    'Recepti.opis LIKE' => '%' . $iskanje . '%',
                    'Recepti.navodila LIKE' => '%' . $iskanje . '%',
                ],
            ]);
        }

        if ($kategorija !== '') {
            $query->where(['Recepti.kategorija' => $kategorija]);
        }

        $this->paginate = ['limit' => 9];
        $recepti = $this->paginate($query);
        $kategorije = $this->Recepti->find('list', ['keyField' => 'kategorija', 'valueField' => 'kategorija'])
            ->where(['kategorija IS NOT' => null, 'kategorija !=' => ''])
            ->distinct(['kategorija'])
            ->orderAsc('kategorija')
            ->all();

        $this->set(compact('recepti', 'kategorije', 'iskanje', 'kategorija'));
    }

    public function view($id = null)
    {
        $recepti = $this->Recepti->get($id, [
            'contain' => ['Uporabniki', 'Komentarji' => ['Uporabniki']],
        ]);
        $this->set(compact('recepti'));
    }

    public function add()
    {
        $recepti = $this->Recepti->newEmptyEntity();
        if ($this->request->is('post')) {
            $recepti = $this->Recepti->patchEntity($recepti, $this->request->getData());
            if ($this->Recepti->save($recepti)) {
                $this->Flash->success(__('Recept je shranjen.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Recepta ni bilo mogoče shraniti. Preveri podatke.'));
        }
        $uporabniki = $this->Recepti->Uporabniki->find('list', ['limit' => 200])->all();
        $this->set(compact('recepti', 'uporabniki'));
    }

    public function edit($id = null)
    {
        $recepti = $this->Recepti->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recepti = $this->Recepti->patchEntity($recepti, $this->request->getData());
            if ($this->Recepti->save($recepti)) {
                $this->Flash->success(__('Recept je posodobljen.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Recepta ni bilo mogoče posodobiti.'));
        }
        $uporabniki = $this->Recepti->Uporabniki->find('list', ['limit' => 200])->all();
        $this->set(compact('recepti', 'uporabniki'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recepti = $this->Recepti->get($id);
        if ($this->Recepti->delete($recepti)) {
            $this->Flash->success(__('Recept je izbrisan.'));
        } else {
            $this->Flash->error(__('Recepta ni bilo mogoče izbrisati.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
