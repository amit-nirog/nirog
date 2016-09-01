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
class StatesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $uses = array("State","Country");
    public $components = array('Paginator', 'Session', 'Flash');
    
   

    
    public function admin_add() {
        
        $countries = $this->Country->find('all');
         $this->set('countries', $countries);
        
        if ($this->request->is('post')) {
            $this->State->create();
            if ($this->State->save($this->request->data)) {
                $this->Flash->success(__('The state mame has been saved.'));
                return $this->redirect(array('action' => 'add'));
            } else {
                $this->Flash->error(__('The state name could not be saved. Please, try again.'));
            }
        }
        
    }

  

}
