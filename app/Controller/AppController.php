<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
     

      
	var $helpers = array('Html', 'Form');
  public $uses = array("User", "Country", "State", "City", "Location", "Collage","Token", "Degree", "DoctorType", "Board", "Professional","Token");
  public $components = array('Auth','Session','RequestHandler');
          
	public function beforeFilter(){
		// $this->Auth->loginAction = array( 'controller' => 'users', 'action' => 'signin');
		// $this->Auth->loginRedirect = array( 'controller' => 'users', 'action' => 'profile');
		// $this->Auth->logoutRedirect = array( 'controller' => 'users', 'action' => 'signin');
		// $this->Auth->authenticate = array( 'Form' => array( 'userModel' => 'User', 'fields' => array( 'username' => 'email', 'password' => 'password')));
    $this->Auth->allow('add','view','index','search','signin','userlogin','userlogout','changepassword','edit','captcha','index','detail','forgotpassword','home','delete','download','error','sitemap','lastlogin','personal','terms','professional');
    $this->userInfo=$this->Session->read('User');
    //pr($this->userInfo);
		$this->set('userInfo',$this->userInfo);    
    $this->set('loggedIn',(isset($this->userInfo) && !empty($this->userInfo)));
    if(isset($this->params['admin'])){
        $this->layout = 'admin';
        $this->Auth->loginRedirect = array('controller'=>'users','action'=>'admin_index','admin'=>true);
    }
  }

  function _checkLogout(){
        $User=$this->Session->read('User');
        if($User) {
            if($this->request->is('ajax')){
                echo '<script>window.location=ABSOLUTE_URL+"users/personal"</script>';
                exit;
            }
            else{//die('dd');
            if($this->request->url!='users/login'){
                pr($this->request->url);die;
              }
                $this->redirect(array('controller'=>'users','action'=>'personal'));
            }
        }
  }

  function _checkLogin(){
        $User=$this->Session->read('User');
        if(empty($User)) {
            if($this->request->is('ajax')){
                echo '<script>window.location=ABSOLUTE_URL+"users/signin"</script>';
                exit;
            }
            else
                $this->redirect(array('controller'=>'users','action'=>'signin'));
        }
  }


  function _setUserSession($user){
    if(!empty($user)){
      $this->Session->write('User',$user);
    }


  }
}


