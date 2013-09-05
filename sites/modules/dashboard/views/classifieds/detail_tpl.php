<div style="min-height:709px;">
<div id="breadcrump" itemprop="breadcrumb">
        	  <?php $this->widget('classifieds.components.BreadCategories'); ?>
  </div>
<?if(isset($this->view->adInfo) && !empty($this->view->adInfo)){
	
	$ad = $this->view->adInfo;
         if(!empty($ad->category_id )){
                            $cat = Category::model()->findByPk($ad->category_id);
                            $ad->category_title = $cat->name;
                        }
	?>

<div style="width: 637px;border: 1px solid #CCC;border-radius: 3px 3px 3px 3px;float: left;">
<div class="box_title" style="font-weight:normal;">
			<h1 style="margin-bottom:0px;"><?=stripslashes($ad->ad_title)?></h1>
                   </div>     
                       	
                     <span>        <?if($ad->type->ad_type_name){?>
			<?=Yii::t('publish_page_v2', 'Ad Type')?> : <b><?=Yii::t('publish_page_nom', $ad->type->ad_type_name)?></b>|
		<?}?>	
		<?=Yii::t('common', 'Category')?> : <b><?=$ad->category_title?></b>|
		<?=Yii::t('common', 'Publish date')?> : <b><?=$ad->ad_publish_date?></b>
                     </span>   
		
<div class="blank1" style="height:30px;clear:both;"></div>


        
     
  <div class="row-fluid" >
    <div class="pull-right">
        
       <div id="social_buttons">
          <div style="float:left;">
	       
	         <?php
$this->widget('application.extensions.addThis', array(
    'id'=>'addThis',
    'username'=>'purnachandra',
    'htmlOptions'=>array(
        'class'=>'addthis_default_style',
             ),
    
    'showServices'=>array(
        'tweet',
       
        'facebook_like',
    ),
    
    'config'=>array(),
    'share'=>array(),
));
?> 
               <div style="clear:both;"></div>	
		</div>
		
                </div>
        
    
    <div style="line-height:18px; font-size:12px;">
	       
		<?if($ad->ad_valid_until){?>
		<?=Yii::t('publish_page_v2', 'Classifieds Validity Period')?> : <b><?=$ad->ad_valid_until?></b><br />
		<?}?>
		<?if(!empty($ad->ad_price)){?>
			<?=Yii::t('detail_page', 'Price')?>: <b><?=$ad->ad_price?> <?=PRICE_CURRENCY_NAME?></b><br />
		<?}?>
		<?if(!empty($ad->ad_link)){?>
			<?=Yii::t('publish_page_v2', 'Web Site')?>: <a href="<?=$ad->ad_link?>" target="_blank" rel="nofollow"><?=$ad->ad_link?></a><br />
		<?}?>
		<?if($ad->ad_puslisher_name){?>
			<?=Yii::t('publish_page_v2', 'Contact Name')?> : <b><?=$ad->ad_puslisher_name?></b><br />
		<?}?>	
		
		<?if($ad->ad_skype){?>
			Skype: <a href="skype:<?=$ad->ad_skype?>?chat"><?=stripslashes($ad->ad_skype)?></a><br />
		<?}?>
		<?if($ad->location->location_name){?>
			<?=Yii::t('common', 'Location')?> : <b><?=$ad->location->location_name?></b><br />
		<?}?>	
		<?if($ad->ad_address){?>
			<?=Yii::t('detail_page_v2', 'Adress')?> : <b><?=$ad->getAddress()?></b><br />
		<?}?>	
    </div>
    
	 <div class="pull-left">		
          <div class="info_box" style="background:#fff;">
					
                     <h5>Location Map</h5>   
         <?if(!empty($ad->ad_lat)){?>
					<div id="gmap_detail" style="width: 245px; "></div>
					<?php 

						Yii::import('ext.gmap.*');
						$gMap = new EGMap();
						$gMap->setWidth(245);
						$gMap->setHeight(245);
						$gMap->zoom = 16;
						 
						$sample_address = $ad->ad_address;
						 
						// Create geocoded address
						$geocoded_address = new EGMapGeocodedAddress($sample_address);
						$geocoded_address->geocode($gMap->getGMapClient());
						 
						// Center the map on geocoded address
						 $gMap->setCenter($ad->ad_lat, $ad->ad_lng);
						 
						// Add marker on geocoded address
						$gMap->addMarker(
						     new EGMapMarker($ad->ad_lat, $ad->ad_lng)
						);
						 
						$gMap->renderMap();
					 ?>
					
			<?}?>
                     </div>
             </div>
			<?if(ENABLE_VIDEO_LINK_PUBLISH && !empty($ad->ad_video) && $video = DCUtil::getVideoReady($ad->ad_video)){?>
				<div class="info_box" style="background:#fff;">
					<?
					echo $video;
					?>
				</div>
			<?}?>		
		
	
	</div>
  
 
				<div class="pull-left">
                                    
                                    <?
			$pic = $ad->pics;
			if(!empty($pic)){
			?>		
			<div class="info_box" id="gallery">
					<?
					foreach ($pic as $k){?>
						<a href="<?= Yii::app()->baseUrl.'/sites/caringtutors.com/uf/classifieds/small-'.$k->ad_pic_path;?>"><img src="<?= Yii::app()->baseUrl.'/sites/caringtutors.com/uf/classifieds/small-'. $k->ad_pic_path;?>" width="120" height="90" /></a>
					<?}?>
					
				
			</div>
			<?}//end of if?>
                    <div style="width:318px;">
			<?=stripslashes($ad->ad_description)?>
		</div>             

                                   </div>
   
  
    </div>   
    <div class="row"> 
        <div class="span12">
            	
 <h5>Tags</h5>
<div style="margin-bottom: 10px;">
			<?
			$tags = Ad::model()->normalizeTags($ad->ad_tags);
			if(!empty($tags)){
				foreach ($tags as $k){
					$link = Yii::app()->createUrl('classifieds/ad/search', array('search_string' => stripslashes($k)));
					$tagsArray[] = '<a href="' . $link . '" class="tag_link">' . stripslashes($k) . '</a>';
				}
				echo join(' ', $tagsArray);
			}
			?>
			<div class="clear"></div>
		</div>
    </div>
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
   
<div id="TelcomsInfo"></div>
</div>

<div class="main-rt-newui4" style="float: left;width: 250px;float: left;margin-left: 20px;"> 
    <div class="blank1" style="height:30px;clear:both;"></div>
    <div class="blank1" style="height:30px;clear:both;"></div>
    
    <!--right box 1-->
    <div class="rtboxpopup" id="rtboxpopup" style="width: 200px;top: 226px;">
      <div class="replyico-newui4" style="background: url('/public/images/separator.gif') no-repeat scroll -1129px -191px transparent;
float: left;
height: 43px;
margin-left: -32px;
position: absolute;
width: 26px;"></div>
    
      <div class="blank8" style="clear: both;"></div>
      <div class="">
                  <?php $this->widget('application.components.widgets.contactProvider'); ?>
              </div>
         <div class="blank4" style="height:15px;clear: both;"></div>
            <span class="adreply-infoline"> <span class="socialimgcallnow">  </span> <span class="callnow"></span></span>
      <div class="blank4"></div>
            
      
      <div class="blank4"></div>
      
       
          <div id="prevnext" class="prevnext">
     	<div id="prevAd" style="float:left"></div><div id="nextAd" style="float:right"></div>
     </div>	
          
	
    </div>
    


<div class="blank10"></div>

</div>
	

 <?php if(!Yii::app()->user->isGuest):?>

<div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'caringtutors'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a>

<?php endif;?>                

<?}?>

</div>