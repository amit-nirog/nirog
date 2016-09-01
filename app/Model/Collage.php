<?php

App::uses('AuthComponent', 'Controller/Component');

class Collage extends AppModel 
{
    public function getcollageList() {
       
     $listOfCollage = $this->find('all',array('fields'=>array('id','collage_name'),'conditions'=>array('status'=>1)));
            return $listOfCollage;
    }
	
}

?>