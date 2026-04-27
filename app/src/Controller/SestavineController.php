<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Sestavine Controller
 *
 * @property \App\Model\Table\SestavineTable $Sestavine
 * @method \App\Model\Entity\Sestavine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SestavineController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $sestavine = $this->paginate($this->Sestavine);

        $this->set(compact('sestavine'));
    }

    /**
     * View method
     *
     * @param string|null $id Sestavine id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sestavine = $this->Sestavine->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('sestavine'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sestavine = $this->Sestavine->newEmptyEntity();
        if ($this->request->is('post')) {
            $sestavine = $this->Sestavine->patchEntity($sestavine, $this->request->getData());
            if ($this->Sestavine->save($sestavine)) {
                $this->Flash->success(__('The sestavine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sestavine could not be saved. Please, try again.'));
        }
        $this->set(compact('sestavine'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sestavine id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sestavine = $this->Sestavine->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sestavine = $this->Sestavine->patchEntity($sestavine, $this->request->getData());
            if ($this->Sestavine->save($sestavine)) {
                $this->Flash->success(__('The sestavine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sestavine could not be saved. Please, try again.'));
        }
        $this->set(compact('sestavine'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sestavine id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sestavine = $this->Sestavine->get($id);
        if ($this->Sestavine->delete($sestavine)) {
            $this->Flash->success(__('The sestavine has been deleted.'));
        } else {
            $this->Flash->error(__('The sestavine could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
