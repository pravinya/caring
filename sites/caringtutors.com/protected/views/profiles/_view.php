
        
    <div class="row-fluid">
    <div class="pull-right">
       <?php
$this->widget('application.extensions.addThis', array(
    'id'=>'addThis',
    'username'=>'purnachandra',
    'htmlOptions'=>array(
        'class'=>'addthis_default_style',
             ),
    
    'showServices'=>array(
        'tweet',
        'google_plusone'=>array(
            'g:plusone:size'=>'medium',
            'g:plusone:annotation'=>'bubble',
        ),
        'facebook_like',
    ),
    
    'config'=>array(),
    'share'=>array(),
));
?> 

     <div class="box_content">
    <address>
    <?php    
    echo '<br>';
       echo  $profile->getAddress();
       ?>
    </address>

    </div>
         <?php echo CHtml::link(CHtml::image( '/image/default/create/id/'.$profile->imageId.'&version=medium',$profile->cname.'-'.$profile->location
        ),$profile->link);?>
    </div>
    
    
     
 <!--bein of location map -->
    <div class="pull-left">
        
 <div class="info_box">
					<div id="gmap_detail" style="width: 245px; "></div>       
        <h5>Location Map</h5>
        
<?php 

Yii::import('ext.gmap.*');
$gMap = new EGMap();
$gMap->setWidth(245);
$gMap->setHeight(245);
$gMap->zoom = 16;
 
$sample_address = $profile->location.", Hyderabad, Andhra Pradesh, India";
 
// Create geocoded address
$geocoded_address = new EGMapGeocodedAddress($sample_address);
$geocoded_address->geocode($gMap->getGMapClient());
 
// Center the map on geocoded address
 $gMap->setCenter($geocoded_address->getLat(), $geocoded_address->getLng());
 
// Add marker on geocoded address
$gMap->addMarker(
     new EGMapMarker($geocoded_address->getLat(), $geocoded_address->getLng())
);
 
$gMap->renderMap();
?>

</div>
 </div>   
 <!--end of location map -->
   </div>
    
  
  
   <div class="row">   
        <div class="span7">
       
        <?php  /*$this->widget('application.components.widgets.EFancyBox', array(
    'target'=>'.info_box',
    'config'=>array(
        maxWidth    => 800,
        maxHeight   => 600,
        fitToView   => false,
        width       => '70%',
        height      => '70%',
        autoSize    => false,
        closeClick  => false,
        openEffect  => 'none',
        closeEffect => 'none'
    ),
));  */?>



  

   </div> </div>
  