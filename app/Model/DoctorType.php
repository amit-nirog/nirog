<?php

App::uses('AuthComponent', 'Controller/Component');

class DoctorType extends AppModel 
{
    public function gettypeList() {
       
     $listOftype = $this->find('all',array('fields'=>array('id','type_name'),'conditions'=>array('status'=>1)));
            return $listOftype;
    }
	
}

?>