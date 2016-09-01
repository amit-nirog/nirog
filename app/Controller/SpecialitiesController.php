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
class SpecialitiesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $uses = array("Specialitie");
    public $components = array('Paginator', 'Session', 'Flash');
    
   

    
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Specialitie->create();
            if ($this->Specialitie->save($this->request->data)) {
                $this->Flash->success(__('The Specialities has been saved.'));
                return $this->redirect(array('action' => 'add'));
            } else {
                $this->Flash->error(__('The Specialities could not be saved. Please, try again.'));
            }
        }
        
    }
    
     public function admin_index() {
       $result = $this->Specialitie->find('all',array(
        'order' => array('Specialitie.id' => 'desc')
    ));
      //print_r($result);
        $this->set('data', $result);
        
    }

  

}
