
 
<?php
     
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'ad-gen-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation'=>true,

                'method' => 'POST',
                'clientOptions'=>array(
                     'validateOnSubmit'=>true,
                     'validateOnChange'=>true,
                     'validateOnType'=>false,
		),
		
		'htmlOptions'=>array('class'=>'formoid-default','style'=>'background-color:#7ddfe0;font-size:14px;font-family:"Open Sans",Arial,Verdana,sans-serif;width:780px;max-width:100%;min-width:448px;')
	)); ?>
 
<?php 
if(isset($event)){

echo '<p class="fl">';

echo 'Step '.$event->sender->currentStep;
echo ' of '.$event->sender->stepCount;
echo '</p/>';

echo $event->sender->menu->run();

}  ?>
 
	<div id="fancy_header"><h2><?=Yii::t('publish_page_v2', 'Specify Your Contact Information')?></h2>
   <?php echo CHtml::errorSummary($model); ?>
 
 
	 <div class="row-fluid">
		<?php echo CHtml::activeLabelEx($model,'ad_email');?> 
		<?php echo CHtml::activeTextField($model,'ad_email',array('maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 1)); ?>
         </div>
         <div class="row-fluid">   
		<?php echo CHtml::activeLabelEx($model,'ad_puslisher_name');?> 
		<?php echo CHtml::activeTextField($model,'ad_puslisher_name',array('maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 1)); ?>
	   </div>	
	 <div class="row-fluid"> 
		<?php echo CHtml::activeLabelEx($model,'ad_phone');?> 
		<?php echo CHtml::activeTextField($model,'ad_phone',array('maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 1)); ?>
	   </div>
	 <div class="row-fluid">  
		<?php echo CHtml::activeLabelEx($model,'ad_skype');?> 
		<?php echo CHtml::activeTextField($model,'ad_skype',array('maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 1)); ?>
	   </div>	
	 <div class="row-fluid">   
		<?php echo CHtml::activeLabelEx($model,'ad_address');?> 
        <div class="addrselect"><?php echo CHtml::activeTextField($model,'ad_address',array('maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 1)); ?></div>
                       <span><?php echo CHtml::link('View on Map',array('/dashboard/classifieds/gmap.pick'),array('id'=>'view-gmap','class' => 'btn btn-info')); ?></span>
	<?php
	$this->widget('application.components.widgets.EFancyBox', array(
    'target'=>'#view-gmap',
    'config'=>array(
	   'title'   => 'Choose your locationon google map',
        
        'enableEscapeButton' => false,
        'overlayShow' => true,
        'overlayOpacity' => 0,
        'hideOnOverlayClick' => false,
       	'type'          => 'iframe',
           ),
        ));  ?><?php echo CHtml::error($model,'ad_address'); ?>
		<div class="clear"></div>
         </div>
	
                
        <div class="row" style="margin-bottom:20px;">
					 
	
		<div class="publish_label_conatiner">
			<?php //echo "Your Address";?>
			
			<div class="latselect"><?php echo CHtml::activeHiddenField($model,'ad_lat'); ?></div>
			<div class="lngselect"><?php echo CHtml::activeHiddenField($model,'ad_lng'); ?></div>
		</div>	
	
	       
	
	
	<div class="clear"></div>
     </div>
 

  	
	  <div class="form-actions ">
              <div class="pull-right">
		 <?php echo CHtml::htmlButton('Next Step<i class="icon-chevron-right"></i> ', array('class'=>'btn btn-primary btn-large', 'type'=>'submit')); ?>
              </div>
          </div>
</div>
     <?php $this->endWidget();?>