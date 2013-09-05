<?php
$this->metaKeywords = 'IT Training, Management training, languages training, competitive exams training';
$this->metaDescription = 'IT, management & languate training institutes in Hyderabad and Secunderabad, skilled online home tutors, trainer jobs';
//$this->addMetaProperty('fb:app_id',Yii::app()->params['fbAppId']);
//$this->canonical = $model->getAbsoluteUrl(); // canonical URLs should always be absolute
 //$this->pageTitle = DCUtil::getSeoTitle( stripslashes($_GET["cattxt"])).' classified ads';
 
 $is_cadd = $this->getId() == "ad" ;
 
	    $title = $is_cadd ? $_GET["cattxt"] : $_GET["catitl"];
	    $tmp_str = $is_cadd ? "training Classified Ads" : "training";
	    $loc = "near ".(!empty($_GET["location"])? $_GET["location"]: "Hyderabad Secunderabad");
	     
	    $this->pageTitle = $title." ".$tmp_str." ".$loc;
?>

<h1><?=$this->view->name?></h1>

	
	<?if(!empty($this->view->adList)){?>
		<?foreach ($this->view->adList as $k){
			//$adUrl = Yii::app()->createUrl('classifieds/ad/detail' , array('title' => DCUtil::getSeoTitle( stripslashes($k->ad_title) ), 'id' => $k->ad_id));
			//$adUrl = $k->getAbsoluteUrl (array('title' => DCUtil::getSeoTitle( stripslashes($k->ad_title) ), 'id' => $k->ad_id));
			$adUrl = CHtml::link($k->ad_title,$k->link);
			?>
		    <div class="classified_list_container">
		        <div class="classified_list_pic"><a><img src="<?=AdPic::model()->getSmallPic( $k->ad_id )?>" width="120" height="90"></a></div>
		        <div class="classified_list_description">
				 <?php echo CHtml::link($k->ad_title,$k->link);?>
		            <?//=$adUrl?>
		            <p><?=DCUtil::getShortDescription( stripslashes($k->ad_description) )?></p>
		            <p class="info"><?=Yii::t('common', 'Location')?> : <b><?=$k->location->location_name?></b> | <?=Yii::t('common', 'Category')?> : <b><?=$k->category->name?></b> | <?=Yii::t('common', 'Publish date')?> : <b><?=$k->ad_publish_date?></b></p>
		        </div>
		        <div class="clear"></div>
		    </div>
		<?}//end of foreach?>	    
    <?} else {?>
    	<div class="publish_info" style="width:620px;">
		<?=Yii::t('common', 'Ups... No Classifieds Here')?>
		</div>
    <?}//end of if?>

<?php $this->widget('CLinkPager', array('pages' => $pages, 'cssFile' => Yii::app()->baseUrl . '/public/css/pager.css')) ?>

<?php Layout::addBlock('sidebar.left', array(
    'id'=>'left_sidebar',
    'content'=>'the content you want to add to your layout', // eg the result of a partial or widget
        /*
$this->renderPartial('/partial/aspect_index_right', array(
        'aspects'=>$user->aspects,
        'controller'=>$this,
    ), true)
*/
)); ?>