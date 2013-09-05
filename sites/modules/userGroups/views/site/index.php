
<?php
$this->pageTitle = "training directory in Hyderabad Secunderabad & Old City";
    $this->metaKeywords = 'it training, management training, tutors, language trainers, competitive exams training';
    $this->metaDescription = 'IT, management & language training institutes in Hyderabad, Secunderabad & Old City, skilled online home tutors, trainer jobs';
   // $this->addMetaProperty('fb:app_id',Yii::app()->params['fbAppId']);
   // $this->canonical = $model->getAbsoluteUrl(); // canonical URLs should always be absolute
?>
  
 
<?php //Yii::app()->facebook->ogTags['og:title'] = "CaringTutors"; ?>
<div class="sapn10">  <!--class = feature group-->
    
   
    <h4>Training institutes and trainers in Hyderabad, Secunderabad and Old city</h4>

      
       

   
    <?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading'=>'Find the best training providers in Hyderabad',
)); ?>
	
   
        
          <p>
		Find the top tutors and training businesses in Hyderabad under your fingertips at CaringTutors.
		We're committed to bringing you the best, most affordable and trustworthy training around!
                <span class="label label-warning">It is free!</span>
       
            
            
          </p>
                   
          
          
          <h3>Popular Searches</h3>
        
          
               <?php  $this->widget('ext.eGoogleImages.EGoogleImages', array('q' => 'online trainers in hyderabad', 'size'=>8, 'safeSearch'=>true));?> 
          
       
   <p><a class="btn btn-primary" href="/training_directory.html">View details &raquo;</a></p>
     
 
<?php $this->endWidget(); ?>
    


</div>

<?php
/*$this->widget('ext.appy_accordion.ButtonAccordianWidget', array(
    //'class'=>'list1 pad_bot1',
    'tabs'=>array(
        'test_tab1'=>$this->renderPartial('test_page',null,true),
        'test_tab2'=>'test_value2',
        'test_tab3'=>'test_value3',
        'page'=>$this->renderPartial('test_page',null,true)
    )
));*/
?>
<!--  By me now  -->


<?php 
  /* 
   * <h1>Yii Chat Demo</h1>
<div id='chat'></div>
   *  $this->widget('YiiChatWidget',array(
        'chat_id'=>'123',                   // a chat identificator
        'identity'=>1,                      // the user, Yii::app()->user->id ?
        'selector'=>'#chat',                // were it will be inserted
        'minPostLen'=>2,                    // min and
        'maxPostLen'=>10,                   // max string size for post
        'model'=>new MyYiiChatHandler(),    // the class handler.
                                            // MyYiiChatHandler is a demo
                                            // you must create your own class 
                                            // and implements IYiiChat interfac
                                            // Read about 'Database Support'

        'data'=>'any data',                 // data passed to the handler

        // success and error handlers, both optionals.
        'onSuccess'=>new CJavaScriptExpression(
            "function(code, text, post_id){   }"),
        'onError'=>new CJavaScriptExpression(
            "function(errorcode, info){  }"),
    ));*/


/*
Yii::import('ext.gmap.*');
$latitude = 39.72098197183251;
$longitude = 2.9115524999999964;
$zoom = 8;
$gMap = new EGMap();
$gMap->setJsName('map');
$gMap->width = '100%';
$gMap->height = '400';
$gMap->setCenter($latitude, $longitude);
$gMap->zoom = 8;
$gMap->addGlobalVariable('geocoder');
$gMap->addGlobalVariable('centerChangedLast');
$gMap->addGlobalVariable('reverseGeocodedLast');
$gMap->addGlobalVariable('currentReversGeocodeResponse');
$gMap->addEvent(
     new EGMapEvent(
             'zoom_changed',
             'document.getElementById("zoom_level").innerHTML = map.getZoom();'));
$gMap->addEvent(new EGMapEvent('center_changed','centerChanged',false));
$gEvent = new EGMapEvent('dblclick','map.setZoom(map.getZoom() +1)');
$gMap->appendMapTo('#map_canvas');
$gMap->renderMap(array(
    'geocoder = new google.maps.Geocoder();',
    $gEvent->getDomEventJs('crosshair'),
    'reverseGeocodedLast= new Date();',
    'centerChagedLast = new Date();',
    'setInterval(function(){
        if((new Date()).getSeconds() - centerChangedLast.getSeconds() > 1) {
        if(reverseGeocodedLast.getTime() < centerChangedLast.getTime())
          reverseGeocode();
      }
    },1000);',
    'centerChanged();'
));*/
?>
<!--
<div class="form">
Find by address:
 <input type="text" id="address" style="width:300px"/>
 <button type="button" class="small"onclick="geocode()">Go to Address</button>
  <ul>
     <li>Lat/Lng:&nbsp;<span id="latlng"></span></li>
     <li>Address:&nbsp;<span id="formatedAddress"></span></li>
     <li>Zoom Level:&nbsp;<span id="zoom_level"><?php echo $zoom;?></span></li>
 </ul>
</div>
<div id="map">
    <div id="map_canvas" style="width:100%; height:400px"></div>
    <div id="crosshair"></div>
</div>
<div style="overflow:hidden;width:100%;text-align:right">
<button type="button" class="small" onclick="setLatLngToClass()">Set Latitude & Longitude</button>
<button type="button" class="small" onclick="addMarkerAtCenter()">Add Marker at Center</button>
</div>
<hr>
Latitude: <input id="test_latitude" value=""/> Longitude: <input id="test_longitude" value=""/>
</hr>
  	
    -->  
  
 