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
class CollagesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $uses = array("Collage");
    public $components = array('Paginator', 'Session', 'Flash');
    
    public function admin_getCollages(){
        $result = $this->Collage->find('all',array(
        'order' => array('Collage.id' => 'desc')
    ));

        $this->set('data', $result);
        $this->set('_serialize', ['data']);
    }
   
public function admin_delete() {
        if ($this->request->allowMethod('post', 'delete'))
            $id = $this->request->data['Collage']['id'];
        $this->Collage->id = $id;
        if (!$this->Collage->exists()) {
            throw new NotFoundException(__('Invalid qualification'));
        }
        if ($this->Collage->delete()) {
            $this->set("res", array('r' => 1));
            $this->response->type('json');
            $this->render('/Common/ajax', 'ajax');
        } else {
            $this->set("res", array('r' => 0));
            $this->response->type('json');
            $this->render('/Common/ajax', 'ajax');
        }
    }
    
    public function admin_add() {
       if ($this->request->is('post')) {
           $collname =  $this->request->data['Collage']['collage_name'];
            $this->Collage->create();
           if ($this->Collage->save($this->request->data)) {
                $id = $this->Collage->getLastInsertID();
                $this->set("res", array('collage_name' => $collname, 'id' => $id));
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
