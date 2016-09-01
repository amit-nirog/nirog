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
class AwardsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $uses = array("Award");
    public $components = array('Paginator', 'Session', 'Flash');
    
   
    
    public function add() {
       if ($this->request->is('post')) {
           $collname =  $this->request->data['Award']['award_name'];
           $this->request->data['Award']['user_id'] = $this->Auth->user('id');
            $this->Award->create();
           if ($this->Award->save($this->request->data)) {
                $id = $this->Award->getLastInsertID();
                $this->set("res", array('award_name' => $collname, 'id' => $id));
                $this->response->type('json');
                $this->render('/Common/ajax', 'ajax');
            } else {
                $this->set("res", array('r' => 0));
                $this->response->type('json');
                $this->render('/Common/ajax', 'ajax');
            }
        }
        
    }

  

}
