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
class LocationsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $uses = array("State", "Country", "City", "Location");
    public $components = array('Paginator', 'Session', 'Flash');

    public function admin_add() {



        if ($this->request->is('post')) {
            $this->Location->create();
            if ($this->Location->save($this->request->data)) {
                $this->Flash->success(__('The location mame has been saved.'));
                return $this->redirect(array('action' => 'add'));
            } else {
                $this->Flash->error(__('The location name could not be saved. Please, try again.'));
            }
        }
        $cities = $this->City->find('all');
        $this->set('cities', $cities);
    }

}
