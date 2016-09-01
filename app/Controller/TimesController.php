<?php

App::uses('AppController', 'Controller');

/**
 * Times Controller
 *
 * @property Time $Time
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class TimesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Flash');
    
    public function getTime(){
        $result = $this->Time->find('all',[
           'contain' => false,
           'conditions' => [
               'Time.user_id' => $this->Auth->user('id')
           ] 
        ]);
        $this->set('data', $result);
        $this->set('_serialize', ['data']);
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Time->recursive = 0;
        $this->set('times', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Time->exists($id)) {
            throw new NotFoundException(__('Invalid time'));
        }
        $options = array('conditions' => array('Time.' . $this->Time->primaryKey => $id));
        $this->set('time', $this->Time->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Time->create();
            $day = $this->request->data['Time']['days'];
            $this->request->data['Time']['user_id'] = $this->Auth->user('id');
            if ($this->Time->save($this->request->data)) {
                $id = $this->Time->getLastInsertID();
                $this->set("res", array('r' => 1, 'id' => $id,'days' => $day));
                $this->response->type('json');
                $this->render('/Common/ajax', 'ajax');
            } else {
                $this->set("res", array('r' => 0));
                $this->response->type('json');
                $this->render('/Common/ajax', 'ajax');
            }
        }
        $users = $this->Time->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Time->exists($id)) {
            throw new NotFoundException(__('Invalid time'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Time->save($this->request->data)) {
                $this->Flash->success(__('The time has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The time could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Time.' . $this->Time->primaryKey => $id));
            $this->request->data = $this->Time->find('first', $options);
        }
        $users = $this->Time->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete() {
        if ($this->request->allowMethod('post', 'delete'))
            $id = $this->request->data['Time']['id'];
        $this->Time->id = $id;
        if (!$this->Time->exists()) {
            throw new NotFoundException(__('Invalid qualification'));
        }
        if ($this->Time->delete()) {
            $this->set("res", array('r' => 1));
            $this->response->type('json');
            $this->render('/Common/ajax', 'ajax');
        } else {
            $this->set("res", array('r' => 0));
            $this->response->type('json');
            $this->render('/Common/ajax', 'ajax');
        }
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Time->recursive = 0;
        $this->set('times', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Time->exists($id)) {
            throw new NotFoundException(__('Invalid time'));
        }
        $options = array('conditions' => array('Time.' . $this->Time->primaryKey => $id));
        $this->set('time', $this->Time->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Time->create();
            if ($this->Time->save($this->request->data)) {
                $this->Flash->success(__('The time has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The time could not be saved. Please, try again.'));
            }
        }
        $users = $this->Time->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Time->exists($id)) {
            throw new NotFoundException(__('Invalid time'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Time->save($this->request->data)) {
                $this->Flash->success(__('The time has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The time could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Time.' . $this->Time->primaryKey => $id));
            $this->request->data = $this->Time->find('first', $options);
        }
        $users = $this->Time->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Time->id = $id;
        if (!$this->Time->exists()) {
            throw new NotFoundException(__('Invalid time'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Time->delete()) {
            $this->Flash->success(__('The time has been deleted.'));
        } else {
            $this->Flash->error(__('The time could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
