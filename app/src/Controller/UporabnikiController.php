<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Uporabniki Controller
 *
 * @property \App\Model\Table\UporabnikiTable $Uporabniki
 * @method \App\Model\Entity\Uporabniki[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UporabnikiController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $uporabniki = $this->paginate($this->Uporabniki);

        $this->set(compact('uporabniki'));
    }

    /**
     * View method
     *
     * @param string|null $id Uporabniki id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $uporabniki = $this->Uporabniki->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('uporabniki'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $uporabniki = $this->Uporabniki->newEmptyEntity();
        if ($this->request->is('post')) {
            $uporabniki = $this->Uporabniki->patchEntity($uporabniki, $this->request->getData());
            if ($this->Uporabniki->save($uporabniki)) {
                $this->Flash->success(__('The uporabniki has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The uporabniki could not be saved. Please, try again.'));
        }
        $this->set(compact('uporabniki'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Uporabniki id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $uporabniki = $this->Uporabniki->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $uporabniki = $this->Uporabniki->patchEntity($uporabniki, $this->request->getData());
            if ($this->Uporabniki->save($uporabniki)) {
                $this->Flash->success(__('The uporabniki has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The uporabniki could not be saved. Please, try again.'));
        }
        $this->set(compact('uporabniki'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Uporabniki id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $uporabniki = $this->Uporabniki->get($id);
        if ($this->Uporabniki->delete($uporabniki)) {
            $this->Flash->success(__('The uporabniki has been deleted.'));
        } else {
            $this->Flash->error(__('The uporabniki could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
