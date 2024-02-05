<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Stores Controller
 *
 * @property \App\Model\Table\StoresTable $Stores
 * @method \App\Model\Entity\Store[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $stores = $this->paginate($this->Stores);

        $this->set(compact('stores'));
    }

    /**
     * View method
     *
     * @param string|null $id Store id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $store = $this->Stores->get($id, [
            'contain' => ['Addresses'],
        ]);

        $this->set(compact('store'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
{
    $store = $this->Stores->newEmptyEntity();
    if ($this->request->is('post')) {
        $store = $this->Stores->patchEntity($store, $this->request->getData(), [
            'associated' => ['Addresses'] // Indica ao CakePHP para salvar os dados do endereço também
        ]);
        
        if ($this->Stores->save($store, ['associated' => ['Addresses']])) {
            $this->Flash->success(__('A Loja foi Salva.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Nome em uso.'));
    }
    $this->set(compact('store'));
}


    /**
     * Edit method
     *
     * @param string|null $id Store id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
{
    $store = $this->Stores->get($id, [
        'contain' => ['Addresses'],
    ]);

    if ($this->request->is(['patch', 'post', 'put'])) {
        $store = $this->Stores->patchEntity($store, $this->request->getData());

        // Verifica se o endereço foi alterado
        if (!empty($this->request->getData('address'))) {
            $newAddressData = $this->request->getData('address');
            $newAddress = $this->Stores->Addresses->patchEntity($newAddress, $newAddressData);
            $newAddress->store_id = $store->id;

            // Deleta o endereço existente
            if ($store->address && isset($store->address->store_id)) {
                $this->Stores->Addresses->delete($store->address);
            }

            // Salva o novo endereço
            if (!$this->Stores->Addresses->save($newAddress)) {
                $this->Flash->error(__('Erro ao salvar o novo endereço.'));
                return;
            }
        }

        if ($this->Stores->save($store)) {
            $this->Flash->success(__('The store has been saved.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Erro ao salvar a loja.'));
    }
    $this->set(compact('store'));
}

    /**
     * Delete method
     *
     * @param string|null $id Store id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $store = $this->Stores->get($id);
        if ($this->Stores->delete($store)) {
            $this->Flash->success(__('A loja foi excluída.'));
        } else {
            $this->Flash->error(__('Não foi possível excluir. Por favor Tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
