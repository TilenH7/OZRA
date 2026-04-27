<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Komentarji Controller
 *
 * @property \App\Model\Table\KomentarjiTable $Komentarji
 * @method \App\Model\Entity\Komentarji[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class KomentarjiController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Uporabniki', 'Recepti'],
        ];
        $komentarji = $this->paginate($this->Komentarji);

        $this->set(compact('komentarji'));
    }

    /**
     * View method
     *
     * @param string|null $id Komentarji id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $komentarji = $this->Komentarji->get($id, [
            'contain' => ['Uporabniki', 'Recepti'],
        ]);

        $this->set(compact('komentarji'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $komentarji = $this->Komentarji->newEmptyEntity();
        if ($this->request->is('post')) {
            $komentarji = $this->Komentarji->patchEntity($komentarji, $this->request->getData());
            if ($this->Komentarji->save($komentarji)) {
                $this->Flash->success(__('The komentarji has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The komentarji could not be saved. Please, try again.'));
        }
        $uporabniki = $this->Komentarji->Uporabniki->find('list', ['limit' => 200])->all();
        $recepti = $this->Komentarji->Recepti->find('list', ['limit' => 200])->all();
        $this->set(compact('komentarji', 'uporabniki', 'recepti'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Komentarji id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $komentarji = $this->Komentarji->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $komentarji = $this->Komentarji->patchEntity($komentarji, $this->request->getData());
            if ($this->Komentarji->save($komentarji)) {
                $this->Flash->success(__('The komentarji has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The komentarji could not be saved. Please, try again.'));
        }
        $uporabniki = $this->Komentarji->Uporabniki->find('list', ['limit' => 200])->all();
        $recepti = $this->Komentarji->Recepti->find('list', ['limit' => 200])->all();
        $this->set(compact('komentarji', 'uporabniki', 'recepti'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Komentarji id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $komentarji = $this->Komentarji->get($id);
        if ($this->Komentarji->delete($komentarji)) {
            $this->Flash->success(__('The komentarji has been deleted.'));
        } else {
            $this->Flash->error(__('The komentarji could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
