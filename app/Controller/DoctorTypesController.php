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
class DoctorTypesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Flash');
    
   

    
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->DoctorType->create();
            if ($this->DoctorType->save($this->request->data)) {
                $this->Flash->success(__('The Doctor Type has been saved.'));
                return $this->redirect(array('action' => 'add'));
            } else {
                $this->Flash->error(__('The Doctor Type could not be saved. Please, try again.'));
            }
        }
        
    }

  

}
