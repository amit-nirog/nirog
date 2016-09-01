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
class CountriesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $uses = array("Country");
    public $components = array('Paginator', 'Session', 'Flash');
    
   

    
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Country->create();
            if ($this->Country->save($this->request->data)) {
                $this->Flash->success(__('The country mame has been saved.'));
                return $this->redirect(array('action' => 'add'));
            } else {
                $this->Flash->error(__('The country name could not be saved. Please, try again.'));
            }
        }
        
    }

  

}
