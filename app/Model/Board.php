<?php

App::uses('AuthComponent', 'Controller/Component');

class Board extends AppModel 
{
    public function getboardList() {
       
     $listOfyear = $this->find('all',array('fields'=>array('id','board_name'),'conditions'=>array('status'=>1)));
            return $listOfyear;
    }
	
}

?>