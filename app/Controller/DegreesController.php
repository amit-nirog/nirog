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
class DegreesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $uses = array("Degree");
    public $components = array('Paginator', 'Session', 'Flash');
    
   

    
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Degree->create();
            if ($this->Degree->save($this->request->data)) {
                $this->Flash->success(__('The degree mame has been saved.'));
                return $this->redirect(array('action' => 'add'));
            } else {
                $this->Flash->error(__('The degree name could not be saved. Please, try again.'));
            }
        }
        
    }

  

}
