<?php

App::uses('AuthComponent', 'Controller/Component');

class City extends AppModel {

  public function getcityList() {
       
     $listOfCity = $this->find('all',array('fields'=>array('id','city_name'),'conditions'=>array('status'=>1)));
            return $listOfCity;
    }

}

?>