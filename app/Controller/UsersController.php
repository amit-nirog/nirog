<?php

class UsersController extends AppController {

    var $helpers = array('Html', 'Form');
    public $uses = array("User", "Country", "State", "City", "Location", "Collage", "Degree", "DoctorType", "Board", "Professional","Token");
    var $components = array('Session', 'Auth', 'Common');

    //function beforeFilter() {
        // tell Auth not to check authentication when doing the 'register' action

        //$this->Auth->allow('register', 'login', 'signin', 'logout', 'otp', 'admin_index', 'clinicregister', 'regdelete');
        //parent::beforeFilter();
    //}

    public function admin_index() {
        $this->layout = "admin";
    }

    public function register() {
        $this->_checkLogout();

        if ($this->request->is('post')) {
            $countUseremail = $this->User->find('count', array('conditions' => array('User.email' => $this->request->data['User']['email'])));
            $countUserReg = $this->User->find('count', array('conditions' => array('User.mobile_no' => $this->request->data['User']['mobile_no'])));
            $mono = $this->request->data["User"]['mobile_no'];
            if ($countUserReg < 1) {
                if ($countUseremail < 1) {
                    $responOPT = $this->Common->generatedOTP($mono);
                    $Result['OPT'] = $responOPT;
                    $this->request->data["User"]['token'] = $Result['OPT'];
                    $this->request->data["User"]['status'] = 0;
                    if ($this->User->save($this->request->data)) {
                        $lid = $this->User->getLastInsertID();
                        $this->request->data['Professional']['user_id'] = $this->User->getLastInsertID();
                        $this->request->data["Token"]['token']= $responOPT;
                        $this->request->data["Token"]['mobile_no']  = $this->request->data["User"]['mobile_no'];
                        $this->request->data["Token"]['user_id']  = $this->User->getLastInsertID();
                        $this->request->data["Token"]['expire']  = date("Y/m/d h:i:s", strtotime("+30 minutes"));
                        $this->request->data["Token"]['status']  = 1;
                        $this->Token->save($this->request->data);
                        $this->Session->write('lastid', $lid);
                        $this->Professional->Save($this->request->data);
                        $Result['status'] = 'Success';
                        $this->Session->setFlash(__("Registration has been Successfully."), 'success');
                        $this->redirect(array('controller' => 'users', 'action' => 'otp'));
                    } else {
                        $this->Session->setFlash(__("Sorry !! technical issue"), 'error');
                    }
                } else {

                    $this->Session->setFlash('Email already exists Please, enter other email.', 'error');
                }
            } else {
                $this->Session->setFlash('Mobile Number already exists Please, enter other mobile number.', 'error');
            }
        }
    }

    public function clinicregister() {
        if ($this->request->is('post')) {
            $countUseremail = $this->User->find('count', array('conditions' => array('User.email' => $this->request->data['User']['email'])));
            $countUserReg = $this->User->find('count', array('conditions' => array('User.mobile_no' => $this->request->data['User']['mobile_no'])));
            $mono = $this->request->data["User"]['mobile_no'];
            if ($countUserReg < 1) {
                if ($countUseremail < 1) {
                    $responOPT = $this->Common->generatedOTP($mono);
                    $Result['OPT'] = $responOPT;
                    $this->request->data["User"]['token'] = $Result['OPT'];
                    if ($this->User->save($this->request->data)) {
                        $lid = $this->User->getLastInsertID();
                        $this->request->data['Professional']['user_id'] = $this->User->getLastInsertID();
                        $this->Session->write('lastid', $lid);
                        $this->Professional->Save($this->request->data);
                        $Result['status'] = 'Success';
                        $this->Session->setFlash(__("Registration has been Successfully."), 'success');
                        $this->redirect(array('controller' => 'users', 'action' => 'otp'));
                    } else {
                        $this->Session->setFlash(__("Sorry !! technical issue"), 'error');
                    }
                } else {

                    $this->Session->setFlash('Email already exists Please, enter other email.', 'error');
                }
            } else {
                $this->Session->setFlash('Mobile Number already exists Please, enter other mobile number.', 'error');
            }
        }
    }

    public function otp() {
        $id = $this->Session->read('lastid');
        $userDetail = $this->User->find('first', array(
            'conditions' => array('User.id' => $id)
        ));
        $tokens = $this->Token->find('first', array(
            'conditions' => array('Token.user_id' => $id)
        ));
        $this->set('userDetail', $userDetail);
        if ($this->request->is('post')) {
            $this->request->data['User']['status'] = 1;
            if ($tokens['Token']['token'] == $this->request->data['User']['token']) {
                $this->Session->setFlash(__("Please Login here."), 'success');
                $this->User->save($this->request->data);
                $this->redirect(array('controller' => 'users', 'action' => 'signin'));
            } else {
                $this->Session->setFlash(__("Sorry you enter wrong OTP"), 'error');
            }
        }
    }

    public function login() {
        $this->_checkLogout();
    }

    public function personal() {
        $this->_checkLogin();
        $locationList = $this->Location->getLocationList();
        $cityList = $this->City->getcityList();
        $stateList = $this->State->getStateList();
        $countryList = $this->Country->geCountryList();
        $boardList = $this->Board->getboardList();
        $degreeList = $this->Degree->getdegreeList();
        $typeList = $this->DoctorType->gettypeList();
        $collageList = $this->Collage->getcollageList();

        $this->set('countryList', $countryList);
        $this->set('stateList', $stateList);
        $this->set('cityList', $cityList);
        $this->set('locationList', $locationList);
        $this->set('boardList', $boardList);
        $this->set('degreeList', $degreeList);
        $this->set('typeList', $typeList);
        $this->set('collageList', $collageList);
        $this->request->data['User']['id'] = $this->userInfo['User']['id'];

        if ($this->request->is('post')) {
            if ($this->User->save($this->data)) {
                $this->_setUserSession(array_merge($this->data,$this->userInfo));

                $this->Session->setFlash(__("Profile updated successfully!"), 'success');
                $this->redirect(array('controller' => 'users', 'action' => 'personal'));
            } else {
                $this->Session->setFlash(__("Sorry !! technical issue"), 'error');
            }
        }
        
    }

    public function professional() {
        $this->_checkLogin();
        $typeList = $this->DoctorType->gettypeList();
        $this->set('typeList', $typeList);
        $boardList = $this->Board->getboardList();
        $this->set('boardList', $boardList);
        $degreeList = $this->Degree->getdegreeList();
        $this->set('degreeList', $degreeList);

        
        $userDetail = $this->Professional->find('first', array('conditions' => array('Professional.user_id' => $this->userInfo['User']['id'])));
        $this->set('userDetails', $userDetail);
        if ($this->request->is('post')) {
            $this->request->data['Professional']['id'] = $userDetail['Professional']['id'];
            $this->request->data['Professional']['user_id'] = $ids;
            if ($this->Professional->save($this->request->data)) {
                $this->Session->setFlash(__("Edit Successfully."), 'success');
                $this->redirect(array('controller' => 'users', 'action' => 'professional'));
            } else {
                $this->Session->setFlash(__("Something went wrong"), 'error');
            }
        }
    }

    public function regdelete($id = "") {
        if ($this->request->is('post')) {
            $ids = $this->Auth->user('id');

            $this->request->data['User']['id'] = $this->request->data['User']['id'];
//           $im =$this->request->data['User']['rg_proff']
//           unlink(WWW_ROOT."\regg\$this->request->data['User']['rg_proff']");
            $this->request->data['User']['rg_proff'] = '';

            if ($this->User->save($this->request->data)) {

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

    public function bechdelete() {
        if ($this->request->is('post')) {
            $ids = $this->Auth->user('id');

            $this->request->data['User']['id'] = $this->request->data['User']['id'];
//           $im =$this->request->data['User']['rg_proff']
//           unlink(WWW_ROOT."\regg\$this->request->data['User']['rg_proff']");
            $this->request->data['User']['bachlor'] = '';

            if ($this->User->save($this->request->data)) {

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

    public function masdelete() {
        if ($this->request->is('post')) {
            $ids = $this->Auth->user('id');

            $this->request->data['User']['id'] = $this->request->data['User']['id'];
//           $im =$this->request->data['User']['rg_proff']
//           unlink(WWW_ROOT."\regg\$this->request->data['User']['rg_proff']");
            $this->request->data['User']['master'] = '';

            if ($this->User->save($this->request->data)) {

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

    public function cerdelete() {
        if ($this->request->is('post')) {
            $ids = $this->Auth->user('id');

            $this->request->data['User']['id'] = $this->request->data['User']['id'];
//           $im =$this->request->data['User']['rg_proff']
//           unlink(WWW_ROOT."\regg\$this->request->data['User']['rg_proff']");
            $this->request->data['User']['add_certificate'] = '';

            if ($this->User->save($this->request->data)) {

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

    public function othdelete() {
        if ($this->request->is('post')) {
            $ids = $this->Auth->user('id');

            $this->request->data['User']['id'] = $this->request->data['User']['id'];
//           $im =$this->request->data['User']['rg_proff']
//           unlink(WWW_ROOT."\regg\$this->request->data['User']['rg_proff']");
            $this->request->data['User']['other'] = '';

            if ($this->User->save($this->request->data)) {

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

    public function document($id = "") {
        $ids = $this->Auth->user('id');
        $userDetail = $this->Professional->find('first', array(
            'conditions' => array('Professional.user_id' => $ids)
        ));
        $this->set('userDetails', $userDetail);

        if ($this->request->is('post')) {
            $this->request->data['Professional']['id'] = $userDetail['Professional']['id'];
            $this->request->data['Professional']['user_id'] = $ids;
            if ($this->Professional->save($this->request->data)) {
                $this->Session->setFlash(__("Edit Successfully."), 'success');
                $this->redirect(array('controller' => 'users', 'action' => 'document'));
            } else {
                $this->Session->setFlash(__("Sorry !! technical issue"), 'error');
            }
        }
    }

    public function signin() {
        $this->_checkLogout();
        
        if (!empty($this->data))
        {
            //pr($this->data);die;
            $encryptedPassword =Security::hash(Configure::read('Security.salt') . trim($this->data['User']['password']));
            $users = $this->User->find('first',array('conditions' => array('OR'=>array('User.email'=>trim($this->data['User']['email']),'User.mobile_no'=>trim($this->data['User']['email'])),'User.password'=>$encryptedPassword,'User.status'=>'1'),'recursive'=>'-1'));
            //pr($users);die;
            if($users){
                $this->_setUserSession($users);
                $this->redirect(array('controller' => 'users', 'action' => 'personal'));
            }else{
                $this->data=array();
                $this->Session->setFlash('Please enter correct email and password.', 'error');

            }           
        }
        
    }


        
    function userlogout()
    {
        $this->Session->delete('User');
        $this->redirect(array('controller'=>'pages','action'=>'home','plugin'=>false));
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function uploadimg() {
        if ($this->request->is('post')) {
            $file = $this->request->data['User']['image'];
            $path = WWW_ROOT . "img" . DS . $file['name'];
            move_uploaded_file($file['tmp_name'], $path);
            $this->request->data['User']['image'] = $file['name'];
            $user = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id'))));
            $this->request->data['User']['id'] = $user['User']['id'];
            if ($this->User->save($this->request->data)) {
                $this->set("res", array('r' => 1, 'img' => $file['name']));
                $this->response->type('json');
                $this->render('/Common/ajax', 'ajax');
            } else {
                $this->set("res", array('r' => 0));
                $this->response->type('json');
                $this->render('/Common/ajax', 'ajax');
            }
        }
    }

    public function lmdee() {
        if ($this->request->is('post')) {
            $file = $this->request->data['User']['bachlor'];
            $path = WWW_ROOT . "bachlor" . DS . $file['name'];
            move_uploaded_file($file['tmp_name'], $path);
            $this->request->data['User']['bachlor'] = $file['name'];
            $user = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id'))));
            $this->request->data['User']['id'] = $user['User']['id'];
            if ($this->User->save($this->request->data)) {
                $this->set("res", array('r' => 1, 'img' => $file['name']));
                $this->response->type('json');
                $this->render('/Common/ajax', 'ajax');
            } else {
                $this->set("res", array('r' => 0));
                $this->response->type('json');
                $this->render('/Common/ajax', 'ajax');
            }
        }
    }

    public function licence() {
        if ($this->request->is('post')) {
            $file = $this->request->data['User']['master'];
            $path = WWW_ROOT . "master" . DS . $file['name'];
            move_uploaded_file($file['tmp_name'], $path);
            $this->request->data['User']['master'] = $file['name'];
            $user = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id'))));
            $this->request->data['User']['id'] = $user['User']['id'];
            if ($this->User->save($this->request->data)) {
                $this->set("res", array('r' => 1, 'img' => $file['name']));
                $this->response->type('json');
                $this->render('/Common/ajax', 'ajax');
            } else {
                $this->set("res", array('r' => 0));
                $this->response->type('json');
                $this->render('/Common/ajax', 'ajax');
            }
        }
    }

    public function proff() {
        if ($this->request->is('post')) {
            $file = $this->request->data['User']['rg_proff'];
            $path = WWW_ROOT . "regg" . DS . $file['name'];
            move_uploaded_file($file['tmp_name'], $path);
            $this->request->data['User']['rg_proff'] = $file['name'];
            $user = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id'))));
            $this->request->data['User']['id'] = $user['User']['id'];
            if ($this->User->save($this->request->data)) {
                $this->set("res", array('r' => 1, 'img' => $file['name']));
                $this->response->type('json');
                $this->render('/Common/ajax', 'ajax');
            } else {
                $this->set("res", array('r' => 0));
                $this->response->type('json');
                $this->render('/Common/ajax', 'ajax');
            }
        }
    }

    public function certificate() {
        if ($this->request->is('post')) {
            $file = $this->request->data['User']['add_certificate'];
            $path = WWW_ROOT . "certi" . DS . $file['name'];
            move_uploaded_file($file['tmp_name'], $path);
            $this->request->data['User']['add_certificate'] = $file['name'];
            $user = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id'))));
            $this->request->data['User']['id'] = $user['User']['id'];
            if ($this->User->save($this->request->data)) {
                $this->set("res", array('r' => 1, 'img' => $file['name']));
                $this->response->type('json');
                $this->render('/Common/ajax', 'ajax');
            } else {
                $this->set("res", array('r' => 0));
                $this->response->type('json');
                $this->render('/Common/ajax', 'ajax');
            }
        }
    }

    public function other() {
        if ($this->request->is('post')) {
            $file = $this->request->data['User']['other'];
            $path = WWW_ROOT . "other" . DS . $file['name'];
            move_uploaded_file($file['tmp_name'], $path);
            $this->request->data['User']['other'] = $file['name'];
            $user = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id'))));
            $this->request->data['User']['id'] = $user['User']['id'];
            if ($this->User->save($this->request->data)) {
                $this->set("res", array('r' => 1, 'img' => $file['name']));
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
