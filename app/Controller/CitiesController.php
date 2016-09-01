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
class CitiesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $uses = array("State","Country","City");
    public $components = array('Paginator', 'Session', 'Flash');
    
   

    
    public function admin_add() {
        
        $states = $this->State->find('all');
         $this->set('states', $states);
         
          $countries = $this->Country->find('all');
         $this->set('countries', $countries);
        
        if ($this->request->is('post')) {
            $this->City->create();
            if ($this->City->save($this->request->data)) {
                $this->Flash->success(__('The city mame has been saved.'));
                return $this->redirect(array('action' => 'add'));
            } else {
                $this->Flash->error(__('The city name could not be saved. Please, try again.'));
            }
        }
        
    }

  

}
