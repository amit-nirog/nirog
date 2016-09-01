<?php
class CommonFunctionsHelper extends AppHelper
{
    public function getBannerPage($pageId,$postion)
    {
            App::import('Model',array('AddManager'));
            $objModel = new AddManager;
            $sliderBanner ='';
            $sliderBanner = $objModel->find('first',array('fields'=>array('AddManager.id','AddManager.top_image','AddManager.right_image','AddManager.add_link','AddManager.title','AddManager.short_description'),'conditions'=>array('AddManager.status'=>1,'AddManager.page_type'=>$pageId)));            
            return $sliderBanner;
    }
    public function getBannerCat($catId)
    {
            App::import('Model',array('AddManager'));
            $objModel = new AddManager;
            $sliderBanner ='';
            $sliderBanner = $objModel->find('first',array('fields'=>array('AddManager.id','AddManager.top_image','AddManager.right_image','AddManager.add_link','AddManager.title','AddManager.short_description'),'conditions'=>array('AddManager.status'=>1,'AddManager.cat_id'=>$catId)));            
            return $sliderBanner;
    }
    
    public function getHomeSlider()
    {
            App::import('Model',array('AddManager'));
            $objModel = new AddManager;
            $sliderBanner ='';
            $sliderBanner = $objModel->find('all',array('fields'=>array('AddManager.id','AddManager.top_image','AddManager.right_image','AddManager.add_link','AddManager.title','AddManager.short_description'),'conditions'=>array('AddManager.status'=>1,'AddManager.page_type'=>1)));            
            return $sliderBanner;
     }
	 function titleMataTagKey($currentController='',$pageName='')
        {            
         
          $titlemetakey='';
             App::import('Model', 'SeoMetatag');
            $objModel = new SeoMetatag; 
			$catId = '';			
            if($pageName=='index' && $currentController=='pages')
             {
                $pageName='default';              
              }
			elseif($currentController=='category' && $pageName=='index')
			{
				$catId = $this->request->params['pass'][0];				
				if($catId == 1)
					$pageName='restaurants';
				elseif($catId == 2)
					$pageName='spaandsalon';
				elseif($catId == 3)
					$pageName='healthandwellness';
				elseif($catId == 10)
					$pageName='retails';
				elseif($catId == 4)
					$pageName='laundry';
				elseif($catId == 6)
					$pageName='hospital';
				elseif($catId == 8)
					$pageName='pathlab';
				elseif($catId == 9)
					$pageName='automobile';
				elseif($catId == 11)
					$pageName='supermarket';
				elseif($catId == 12)
					$pageName='pharmacy';
				elseif($catId == 13)
					$pageName='astrology';
				elseif($catId == 14)
					$pageName='entertainment';
															
			}
                        
		  $titlemetakey = $objModel->find("first", array("fields"=>array("page_title","meta_tag_description","meta_tag_keyword"),"conditions"=>array("SeoMetatag.status"=>1,"SeoMetatag.menu_name"=>$pageName)));          
           if(!empty($titlemetakey))
                  return $titlemetakey;
		
		}
	
	function getCatAndOutletList()
	{
	
	  		App::import('Model',array('Category'));
            $catInf = new Category;
			App::import('Model',array('OutletInformation'));
            $OutletInf = new OutletInformation;			
	        $outletInf = $OutletInf->find("all", array("fields" => array("OutletInformation.id", "OutletInformation.title"),'conditions' => array('OutletInformation.status'=>1),'limit'=>'1000','order'=>array("OutletInformation.title"=>'ASC')));
            $resultArr = array();
			 $catInf = $catInf->find("all", array("fields" => array("Category.id", "Category.category_name"),'conditions' => array('Category.status'=>1)));
			foreach($catInf as $listVal)
			{
				$resultSpecialty1 = array();
                $resultArr1 = array();
                $resultSpecialty1[] = $listVal['Category']['category_name'];
                $resultArr1[] = 'cat_'.$listVal['Category']['id'];
                $result_array1['label'] = implode(',',$resultSpecialty1);
                $result_array1['value'] = implode('|',$resultArr1);
                $finalResult[] = $result_array1;
			}
            foreach($outletInf as $List)
            {
                $resultSpecialty = array();
                $resultArr = array();
                $resultSpecialty[] = $List['OutletInformation']['title'];
                $resultArr[] = $List['OutletInformation']['id'];
                $result_array['label'] = implode(',',$resultSpecialty);
                $result_array['value'] = implode('|',$resultArr);
                $finalResult[] = $result_array;
            }			
            $outletInfData = json_encode($finalResult);		
            return $outletInfData;
	}	
	function getCurrentLocation()
	{
			App::import('Model',array('City'));
            $LocationInf = new City;			
	        $locationList = $LocationInf->find("all", array("fields" => array("City.id", "City.city_name"),'conditions' => array('City.status'=>1),'order'=>array("City.city_name"=>'ASC')));
		 if(!empty($locationList))
        {
            $resultArr = array();
            foreach($locationList as $List)
            {
                $resultLocality = array();
                $resultArr = array();
                $resultLocality[] = $List['City']['city_name']; 
                $resultArr[] = $List['City']['id'];                      
                $resultArray['label'] = implode(', ',$resultLocality);
                $resultArray['value'] = implode('|',$resultArr);
                $finlResult[] = $resultArray;
            }
            $localityArr = json_encode($finlResult); 
            return $localityArr;
        }
	}	
	function getOutletImage($outletid)
	{
			App::import('Model',array('OutletImage'));
            $OutImgObj = new OutletImage;		
			$imageidList = $OutImgObj->find('first', array('fields' => array('OutletImage.thumbs_nail'), 'conditions' => array('OutletImage.outlet_id' => $outletid)));
			if(!empty($imageidList))
				return $imageidList['OutletImage']['thumbs_nail'];
	}
	function getNameOfReferral($useid)
	{
	     App::import('Model', array('VisitingDetail','VisitingSchedule','LocationAddress'));
        $objModel = new LocationAddress;
        $objModel1 = new VisitingDetail;
        $timeBaseSlot = array();
        $numOfVisiting = $objModel->find('all',array('fields' => array('VisitingSchedule.id'),'conditions' => array('LocationAddress.user_id' =>$doctorID,'LocationAddress.id'=>$locationAddressID),"joins"=>array(array("table"=>"md_visiting_schedules","alias"=>"VisitingSchedule","conditions"=>array("VisitingSchedule.location_clinic_id =LocationAddress.id")))));
	}
	function getTotalPoints($customerid)
	{
	 	App::import('Model', array('PointCredit'));
		$objPoint = new PointCredit;
		$totalPoint =$objPoint->getTotalPoints($customerid);
		return $totalPoint;
	}
	function getYourReferralCode($customerid)
	{
		App::import('Model', array('CustomerDetail'));
		$objCustomerDetail = new CustomerDetail;
		$referrcode =$objCustomerDetail->getYourReferralCode($customerid);
		return $referrcode;
	
	}
  }
 ?>
