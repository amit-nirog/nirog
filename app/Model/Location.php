<?php

App::uses('AuthComponent', 'Controller/Component');

class Location extends AppModel {

 public function getLocationList() {
       
       $listOfLocation = $this->find('all',array('fields'=>array('id','location'),'conditions'=>array('status'=>2),'order'=>array('Location.location'=>'ASC')));
        return $listOfLocation;
     
    }
   
}

?>