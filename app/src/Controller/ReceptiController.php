<?php
declare(strict_types=1);

namespace App\Controller;

class ReceptiController extends AppController
{
    private function prijavljenUporabnik(): ?array
    {
        $uporabnik = $this->request->getSession()->read('Auth.User');

        return is_array($uporabnik) ? $uporabnik : null;
    }

    private function jeAdmin(): bool
    {
        $uporabnik = $this->prijavljenUporabnik();

        return ($uporabnik['vloga'] ?? '') === 'admin';
    }

    private function zahtevajPrijavo()
    {
        if (!$this->prijavljenUporabnik()) {
            $this->Flash->error('Za to dejanje se moraš najprej prijaviti.');

            return $this->redirect(['controller' => 'Uporabniki', 'action' => 'login']);
        }

        return null;
    }

    private function lahkoUpravljaRecept($recept): bool
    {
        $uporabnik = $this->prijavljenUporabnik();

        if (!$uporabnik) {
            return false;
        }

        if (($uporabnik['vloga'] ?? '') === 'admin') {
            return true;
        }

        return (int)$recept->uporabnik_id === (int)$uporabnik['id'];
    }

    public function index()
    {
        $query = $this->Recepti->find()->contain(['Uporabniki'])->orderDesc('Recepti.ustvarjen');
        $iskanje = trim((string)$this->request->getQuery('q'));
        $kategorije_filter = $this->request->getQuery('kategorije');

        if ($iskanje !== '') {
            $query->where([
                'OR' => [
                    'Recepti.naslov LIKE' => '%' . $iskanje . '%',
                    'Recepti.opis LIKE' => '%' . $iskanje . '%',
                    'Recepti.navodila LIKE' => '%' . $iskanje . '%',
                ],
            ]);
        }

        if (!empty($kategorije_filter) && is_array($kategorije_filter)) {
            $orPogoji = [];
            foreach ($kategorije_filter as $kat) {
                $orPogoji[] = ['Recepti.kategorija LIKE' => '%' . $kat . '%'];
            }
            $query->where(['OR' => $orPogoji]);
        }

        $this->paginate = ['limit' => 9];
        $recepti = $this->paginate($query);

        $prijavljenUporabnik = $this->prijavljenUporabnik();
        $jeAdmin = $this->jeAdmin();

        $this->set(compact('recepti', 'iskanje', 'kategorije_filter', 'prijavljenUporabnik', 'jeAdmin'));
    }
    public function view($id = null)
    {
        $recepti = $this->Recepti->get($id, [
            'contain' => ['Uporabniki', 'Komentarji' => ['Uporabniki']],
        ]);

        $prijavljenUporabnik = $this->prijavljenUporabnik();
        $lahkoUpravlja = $this->lahkoUpravljaRecept($recepti);

        $this->set(compact('recepti', 'prijavljenUporabnik', 'lahkoUpravlja'));
    }

    public function add()
    {
        $redirect = $this->zahtevajPrijavo();
        if ($redirect) {
            return $redirect;
        }

        $prijavljenUporabnik = $this->prijavljenUporabnik();
        $jeAdmin = $this->jeAdmin();
        $recepti = $this->Recepti->newEmptyEntity();

            if ($this->request->is('post')) {
            $data = $this->request->getData();

            if ($this->request->is('post')) {
            $data = $this->request->getData();

            // Združi več kategorij
            if (!empty($data['kategorije']) && is_array($data['kategorije'])) {
                $data['kategorija'] = implode(', ', $data['kategorije']);
            }

            if (!$jeAdmin) {
                unset($data['uporabnik_id']);
                $data['uporabnik_id'] = $prijavljenUporabnik['id'];
            } elseif (empty($data['uporabnik_id'])) {
                $data['uporabnik_id'] = $prijavljenUporabnik['id'];
            }

            unset($data['ustvarjen']);

            $recepti = $this->Recepti->patchEntity($recepti, $data);
            if ($this->Recepti->save($recepti)) {
                $this->Flash->success('Recept je shranjen.');
                return $this->redirect(['action' => 'view', $recepti->id]);
            }
            $this->Flash->error('Recepta ni bilo mogoče shraniti. Preveri podatke.');
         }
        }

        $uporabniki = $this->Recepti->Uporabniki->find('list', ['limit' => 200])->all();
        $this->set(compact('recepti', 'uporabniki', 'prijavljenUporabnik', 'jeAdmin'));
    }

    public function edit($id = null)
    {
        $redirect = $this->zahtevajPrijavo();
        if ($redirect) {
            return $redirect;
        }

        $recepti = $this->Recepti->get($id, ['contain' => ['Uporabniki']]);
        if (!$this->lahkoUpravljaRecept($recepti)) {
            $this->Flash->error('Lahko urejaš samo svoje recepte.');

            return $this->redirect(['action' => 'view', $recepti->id]);
        }

        $prijavljenUporabnik = $this->prijavljenUporabnik();
        $jeAdmin = $this->jeAdmin();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            if ($this->request->is(['patch', 'post', 'put'])) {
             $data = $this->request->getData();

            // Združi več kategorij
            if (!empty($data['kategorije']) && is_array($data['kategorije'])) {
                $data['kategorija'] = implode(', ', $data['kategorije']);
            }

            if (!$jeAdmin) {
                unset($data['uporabnik_id']);
                $data['uporabnik_id'] = $recepti->uporabnik_id;
            } elseif (empty($data['uporabnik_id'])) {
                $data['uporabnik_id'] = $recepti->uporabnik_id;
            }

            unset($data['ustvarjen']);

            $recepti = $this->Recepti->patchEntity($recepti, $data);
            if ($this->Recepti->save($recepti)) {
                $this->Flash->success('Recept je posodobljen.');
                return $this->redirect(['action' => 'view', $recepti->id]);
            }
            $this->Flash->error('Recepta ni bilo mogoče posodobiti.');
            }
        }

        $uporabniki = $this->Recepti->Uporabniki->find('list', ['limit' => 200])->all();
        $this->set(compact('recepti', 'uporabniki', 'prijavljenUporabnik', 'jeAdmin'));
    }

    public function delete($id = null)
    {
        $redirect = $this->zahtevajPrijavo();
        if ($redirect) {
            return $redirect;
        }

        $this->request->allowMethod(['post', 'delete']);
        $recepti = $this->Recepti->get($id);

        if (!$this->lahkoUpravljaRecept($recepti)) {
            $this->Flash->error('Lahko izbrišeš samo svoje recepte.');

            return $this->redirect(['action' => 'view', $recepti->id]);
        }

        if ($this->Recepti->delete($recepti)) {
            $this->Flash->success('Recept je izbrisan.');
        } else {
            $this->Flash->error('Recepta ni bilo mogoče izbrisati.');
        }

        return $this->redirect(['action' => 'index']);
    }
}
