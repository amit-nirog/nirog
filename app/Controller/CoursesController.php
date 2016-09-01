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
class CoursesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $uses = array("Course");
    public $components = array('Paginator', 'Session', 'Flash');
    
   
    
    public function add() {
       if ($this->request->is('post')) {
           $collname =  $this->request->data['Course']['course_name'];
           $this->request->data['Course']['user_id'] = $this->Auth->user('id');
            $this->Course->create();
           if ($this->Course->save($this->request->data)) {
                $id = $this->Course->getLastInsertID();
                $this->set("res", array('course_name' => $collname, 'id' => $id));
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
