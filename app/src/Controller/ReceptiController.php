<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Recepti Controller
 *
 * @property \App\Model\Table\ReceptiTable $Recepti
 * @method \App\Model\Entity\Recepti[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReceptiController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Uporabniki'],
        ];
        $recepti = $this->paginate($this->Recepti);

        $this->set(compact('recepti'));
    }

    /**
     * View method
     *
     * @param string|null $id Recepti id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recepti = $this->Recepti->get($id, [
            'contain' => ['Uporabniki'],
        ]);

        $this->set(compact('recepti'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recepti = $this->Recepti->newEmptyEntity();
        if ($this->request->is('post')) {
            $recepti = $this->Recepti->patchEntity($recepti, $this->request->getData());
            if ($this->Recepti->save($recepti)) {
                $this->Flash->success(__('The recepti has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recepti could not be saved. Please, try again.'));
        }
        $uporabniki = $this->Recepti->Uporabniki->find('list', ['limit' => 200])->all();
        $this->set(compact('recepti', 'uporabniki'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Recepti id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recepti = $this->Recepti->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recepti = $this->Recepti->patchEntity($recepti, $this->request->getData());
            if ($this->Recepti->save($recepti)) {
                $this->Flash->success(__('The recepti has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recepti could not be saved. Please, try again.'));
        }
        $uporabniki = $this->Recepti->Uporabniki->find('list', ['limit' => 200])->all();
        $this->set(compact('recepti', 'uporabniki'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Recepti id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recepti = $this->Recepti->get($id);
        if ($this->Recepti->delete($recepti)) {
            $this->Flash->success(__('The recepti has been deleted.'));
        } else {
            $this->Flash->error(__('The recepti could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
