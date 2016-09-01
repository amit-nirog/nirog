<?php

App::uses('AuthComponent', 'Controller/Component');

class Degree extends AppModel 
{
	public function getdegreeList() {
       
     $listOfdegree = $this->find('all',array('fields'=>array('id','degree_name'),'conditions'=>array('status'=>1)));
            return $listOfdegree;
    }
    
    
    
}

?>