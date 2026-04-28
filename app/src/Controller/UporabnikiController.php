<?php
declare(strict_types=1);

namespace App\Controller;

class UporabnikiController extends AppController
{
    private function prijavljenUporabnik()
    {
        return $this->request->getSession()->read('Auth.User');
    }

    private function zahtevajPrijavo()
    {
        if (!$this->prijavljenUporabnik()) {
            $this->Flash->error('Za dostop se moraš najprej prijaviti.');
            return $this->redirect(['controller' => 'Uporabniki', 'action' => 'login']);
        }

        return null;
    }

    private function zahtevajAdmina()
    {
        $redirect = $this->zahtevajPrijavo();
        if ($redirect) {
            return $redirect;
        }

        $uporabnik = $this->prijavljenUporabnik();

        if (($uporabnik['vloga'] ?? '') !== 'admin') {
            $this->Flash->error('Nimaš dostopa do admin panela.');
            return $this->redirect(['controller' => 'Uporabniki', 'action' => 'userPanel']);
        }

        return null;
    }

    public function login()
    {
        if ($this->prijavljenUporabnik()) {
            $uporabnik = $this->prijavljenUporabnik();

            if ($uporabnik['vloga'] === 'admin') {
                return $this->redirect(['action' => 'adminPanel']);
            }

            return $this->redirect(['action' => 'userPanel']);
        }

        if ($this->request->is('post')) {
            $eposta = $this->request->getData('eposta');
            $geslo = $this->request->getData('geslo');

            $uporabnik = $this->Uporabniki
                ->find()
                ->where(['eposta' => $eposta])
                ->first();

            if ($uporabnik && password_verify($geslo, $uporabnik->geslo)) {
                $this->request->getSession()->write('Auth.User', [
                    'id' => $uporabnik->id,
                    'uporabnisko_ime' => $uporabnik->uporabnisko_ime,
                    'eposta' => $uporabnik->eposta,
                    'vloga' => $uporabnik->vloga,
                    'profilna_slika' => $uporabnik->profilna_slika,
                ]);

                if ($uporabnik->vloga === 'admin') {
                    return $this->redirect(['action' => 'adminPanel']);
                }

                return $this->redirect(['action' => 'userPanel']);
            }

            $this->Flash->error('Napačen email ali geslo.');
        }
    }

    public function logout()
    {
        $this->request->getSession()->delete('Auth.User');
        $this->Flash->success('Uspešno si se odjavil.');

        return $this->redirect(['action' => 'login']);
    }

    public function adminPanel()
    {
        $redirect = $this->zahtevajAdmina();
        if ($redirect) {
            return $redirect;
        }

        $uporabnik = $this->prijavljenUporabnik();

        $stats = [
            'uporabniki' => $this->Uporabniki->find()->count(),
        ];

        $this->set(compact('uporabnik', 'stats'));
    }

    public function userPanel()
    {
        $redirect = $this->zahtevajPrijavo();
        if ($redirect) {
            return $redirect;
        }

        $uporabnik = $this->prijavljenUporabnik();

        $this->set(compact('uporabnik'));
    }

    public function index()
    {
        $redirect = $this->zahtevajAdmina();
        if ($redirect) {
            return $redirect;
        }

        $uporabniki = $this->paginate($this->Uporabniki);
        $this->set(compact('uporabniki'));
    }

    public function view($id = null)
    {
        $redirect = $this->zahtevajAdmina();
        if ($redirect) {
            return $redirect;
        }

        $uporabniki = $this->Uporabniki->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('uporabniki'));
    }

    public function add()
    {
        $redirect = $this->zahtevajAdmina();
        if ($redirect) {
            return $redirect;
        }

        $uporabniki = $this->Uporabniki->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            if (!empty($data['geslo'])) {
                $data['geslo'] = password_hash($data['geslo'], PASSWORD_BCRYPT);
            }

            $uporabniki = $this->Uporabniki->patchEntity($uporabniki, $data);

            if ($this->Uporabniki->save($uporabniki)) {
                $this->Flash->success('Uporabnik je bil uspešno dodan.');
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error('Uporabnika ni bilo mogoče dodati.');
        }

        $this->set(compact('uporabniki'));
    }

    public function edit($id = null)
    {
        $redirect = $this->zahtevajAdmina();
        if ($redirect) {
            return $redirect;
        }

        $uporabniki = $this->Uporabniki->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            if (!empty($data['geslo'])) {
                $data['geslo'] = password_hash($data['geslo'], PASSWORD_BCRYPT);
            } else {
                unset($data['geslo']);
            }

            $uporabniki = $this->Uporabniki->patchEntity($uporabniki, $data);

            if ($this->Uporabniki->save($uporabniki)) {
                $this->Flash->success('Uporabnik je bil uspešno posodobljen.');
                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error('Uporabnika ni bilo mogoče posodobiti.');
        }

        $this->set(compact('uporabniki'));
    }

    public function delete($id = null)
    {
        $redirect = $this->zahtevajAdmina();
        if ($redirect) {
            return $redirect;
        }

        $this->request->allowMethod(['post', 'delete']);
        $uporabniki = $this->Uporabniki->get($id);

        if ($this->Uporabniki->delete($uporabniki)) {
            $this->Flash->success('Uporabnik je bil izbrisan.');
        } else {
            $this->Flash->error('Uporabnika ni bilo mogoče izbrisati.');
        }

        return $this->redirect(['action' => 'index']);
    }
}