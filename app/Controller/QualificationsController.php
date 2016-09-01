<?php

App::uses('AppController', 'Controller');

/**
 * Qualifications Controller
 *
 * @property Qualification $Qualification
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class QualificationsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $uses = array("User", "Country", "State", "City", "Qualification", "Location", "Collage", "Degree", "DoctorType", "Board", "Professional");
    public $components = array('Paginator', 'Session', 'Flash');

    /**
     * index method
     *
     * @return void
     */
    public function getQualification() {
        $result = $this->Qualification->find('all', [
            'contain' => true,
            'conditions' => [
                'Qualification.user_id' => $this->Auth->user('id')
            ]
        ]);

        $this->set('data', $result);
        $this->set('_serialize', ['data']);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Qualification->exists($id)) {
            throw new NotFoundException(__('Invalid qualification'));
        }
        $options = array('conditions' => array('Qualification.' . $this->Qualification->primaryKey => $id));
        $this->set('qualification', $this->Qualification->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $year = $this->request->data['Qualification']['year'];
            $uniname = $this->request->data['Qualification']['university'];
            $collage = $this->request->data['Qualification']['collage_name'];
            $digid = $this->request->data['Qualification']['degree_id'];
            $degree = $this->Degree->find('first', array(
                'fields' => array('degree_name'),
                array(
                    'conditions' => array('Degree.id' => $digid)
            )));

            $this->Qualification->create();
            $this->request->data['Qualification']['user_id'] = $this->Auth->user('id');
            if ($this->Qualification->save($this->request->data)) {
                $deg = $degree['Degree']['degree_name'];
                $id = $this->Qualification->getLastInsertID();
                $this->set("res", array(
                    'year' => $year,
                    'Univer' => $uniname,
                    'Collage' => $collage,
                    'Degrees' => $deg,
                    'InsetId' => $id
                ));
                $this->response->type('json');
                $this->render('/Common/ajax', 'ajax');
            } else {
                $this->Flash->error(__('The qualification could not be saved. Please, try again.'));
            }
        }
        $users = $this->Qualification->User->find('list');
        $degrees = $this->Qualification->Degree->find('list');
        $this->set(compact('users', 'degrees'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Qualification->exists($id)) {
            throw new NotFoundException(__('Invalid qualification'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Qualification->save($this->request->data)) {
                $this->Flash->success(__('The qualification has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The qualification could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Qualification.' . $this->Qualification->primaryKey => $id));
            $this->request->data = $this->Qualification->find('first', $options);
        }
        $users = $this->Qualification->User->find('list');
        $degrees = $this->Qualification->Degree->find('list');
        $this->set(compact('users', 'degrees'));
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
            $id = $this->request->data['Qualification']['id'];
        $this->Qualification->id = $id;
        if (!$this->Qualification->exists()) {
            throw new NotFoundException(__('Invalid qualification'));
        }
        if ($this->Qualification->delete()) {
            $this->set("res", array('r' => 1));
            $this->response->type('json');
            $this->render('/Common/ajax', 'ajax');
        } else {
            $this->set("res", array('r' => 0));
            $this->response->type('json');
            $this->render('/Common/ajax', 'ajax');
        }
    }

    public function uploaddegree($id = "") {
        if ($this->request->is(array('post', 'put'))) {
            $this->Qualification->id = $id;
            if ($this->Qualification->save($this->request->data)) {
                $this->Flash->success(__('The qualification has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The qualification could not be saved. Please, try again.'));
            }
        }
    }

}
