<?php
declare(strict_types=1);

namespace App\Controller;

class KomentarjiController extends AppController
{
    private function prijavljenUporabnik(): ?array
    {
        $u = $this->request->getSession()->read('Auth.User');
        return is_array($u) ? $u : null;
    }

    public function dodaj($receptId = null)
    {
        $this->request->allowMethod(['post']);
        $uporabnik = $this->prijavljenUporabnik();

        if (!$uporabnik) {
            $this->Flash->error('Prijaviti se moraš za komentiranje.');
            return $this->redirect(['controller' => 'Uporabniki', 'action' => 'login']);
        }

        $komentar = $this->Komentarji->newEmptyEntity();
        $komentar->vsebina = $this->request->getData('vsebina');
        $komentar->uporabnik_id = $uporabnik['id'];
        $komentar->recept_id = $receptId;

        if ($this->Komentarji->save($komentar)) {
            $this->Flash->success('Komentar dodan!');
        } else {
            $this->Flash->error('Napaka pri dodajanju komentarja.');
        }

        return $this->redirect(['controller' => 'Recepti', 'action' => 'view', $receptId]);
    }

    public function izbrisi($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $uporabnik = $this->prijavljenUporabnik();

        if (!$uporabnik) {
            return $this->redirect(['controller' => 'Uporabniki', 'action' => 'login']);
        }

        $komentar = $this->Komentarji->get($id);
        $receptId = $komentar->recept_id;

        if ($uporabnik['vloga'] !== 'admin' && (int)$komentar->uporabnik_id !== (int)$uporabnik['id']) {
            $this->Flash->error('Nimate dovoljenja.');
            return $this->redirect(['controller' => 'Recepti', 'action' => 'view', $receptId]);
        }

        if ($this->Komentarji->delete($komentar)) {
            $this->Flash->success('Komentar izbrisan.');
        }

        return $this->redirect(['controller' => 'Recepti', 'action' => 'view', $receptId]);
    }

    public function index()
    {
        $this->paginate = ['contain' => ['Uporabniki', 'Recepti']];
        $komentarji = $this->paginate($this->Komentarji);
        $this->set(compact('komentarji'));
    }
}