<?php 
$this->breadcrumbs=array(
     'Directory'=>array('profile/list'),   
     $profile->cname=>array('profile/view', 'id'=>$profile->profile_id),
        
    );

$geocode=file_get_contents($address);

$output= json_decode($geocode);


   $this->lat = $output->results[0]->geometry->location->lat;



   $this->lng = $output->results[0]->geometry->location->lng;

//echo $address;
$parser=new CHtmlPurifier(); //create instance of CHtmlPurifier
$about=$parser->purify($profile->about);
 $this->renderPartial('_view', array('profile'=>$profile,
                        'model'=>$model,
                         'role'=>$model->role,'about'=>$about,
                           'loc'=>$loc,'lat'=>$this->lat,'lng'=>$this->lng));?>


<div id="TelcomsInfo"></div>
