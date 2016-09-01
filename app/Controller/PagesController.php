<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    var $helpers = array('Html', 'Form');
    public $uses = array("User", "Country", "State", "City", "Location", "Collage", "Degree", "DoctorType", "Board", "Professional");
    var $components = array('Session', 'Auth', 'Common');

    function beforeFilter() {
        // tell Auth not to check authentication when doing the 'register' action

        $this->Auth->allow('home','delete');
        parent::beforeFilter();
    }

    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     * 	or MissingViewException in debug mode.
     */
    public function display() {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = $title_for_layout = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        $this->set(compact('page', 'subpage', 'title_for_layout'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingViewException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    public function home() {
        $result=  $this->User->find("all");
        $this->set("res",$result);
    }
    public function delete($id="") {
        $this->User->id = $id;
          if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid qualification'));
        }
        if ($this->User->delete()) {
            $this->set("res", array('r' => 1));
            $this->response->type('json');
            $this->render('/Common/ajax', 'ajax');
        } else {
            $this->set("res", array('r' => 0));
            $this->response->type('json');
            $this->render('/Common/ajax', 'ajax');
        }
    }
    

}
