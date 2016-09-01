<?php

App::uses('AuthComponent', 'Controller/Component');

class State extends AppModel 
{
	public function getStateList() 
	 {	   
		$listOfState = $this->find('all',array('fields'=>array('id','state_name'),'conditions'=>array('status'=>1)));
		return $listOfState;    
	}
}

?>