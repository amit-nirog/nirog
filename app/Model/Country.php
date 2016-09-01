<?php

App::uses('AuthComponent', 'Controller/Component');

class Country extends AppModel {

    public function geCountryList() {
        
           $listOfCountry = $this->find('all',array('fields'=>array('id','country_name'),'conditions'=>array('status'=>1)));
            return $listOfCountry;
        
    }
}

?>