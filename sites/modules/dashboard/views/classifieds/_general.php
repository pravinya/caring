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
 

<div id="fancy_header">	
<div class="publish_section_header"><h2><?=$lblStr.Yii::t('publish_page_v2', 'Post Your Ad details')?></h2>
	
   <?php echo CHtml::errorSummary($model); ?>
      
           <div class="element-input" title="Choose a suitable title to convey your need or service. It can be maximum of 255 characters length.">      
		<?php echo CHtml::activeLabelEx($model,'ad_title', array('label' => Yii::t('publish_page', 'Title'),'class'=>'title'));?>
		
	         <?php echo CHtml::activeTextField($model,'ad_title',array('maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 1)); ?>
            </div>
          <div class="element-radio">
		
		<?php echo CHtml::activeLabelEx($model,'ad_type_id', array('label' => Yii::t('publish_page_v2', 'Ad Type'),'class'=>'title')); ?>
               <div class="column">
		<?php echo CHtml::activeRadioButtonList($model,'ad_type_id', $this->view->adTypeList, array( 'labelOptions'=>array('style'=>'display:inline'),'template'=>'<div style="width:67%;float:left;">{input} {label}</div>','separator'=>'  ','tabindex' => 2)); ?>
               </div>
	       <div style="clear:both;"></div>
	
   	</div>
             <div class="element-input" title="Give your ad description">           
		   <?php echo CHtml::activeLabelEx($model,'ad_description', array('label' => Yii::t('publish_page', 'Give Your Ad Description'),'class'=>'title')); ?> 
		
		<?php echo CHtml::activeTextArea($model,'ad_description',array('rows'=>6, 'cols'=>50, 'class' => 'publish_input', 'style' => 'width:716px;', 'tabindex' => 5)); ?>
	
		</div>
		
                <div class="element-input" title="The price of your service in Rs.">         
			<?php echo CHtml::activeLabelEx($model,'ad_price', array('label' => Yii::t('publish_page', 'Price'),'class'=>'title')); ?> 
			
			<?php echo CHtml::activeTextField($model,'ad_price',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 6)); ?>
                 </div>      
                 <div class="element-input" title="Please specify some words related to your ad separated by commas">               
			<?php echo CHtml::activeLabelEx($model,'ad_tags', array('label' => Yii::t('publish_page', 'Tags'),'class'=>'title')); ?>
		
			<?php echo CHtml::activeTextField($model,'ad_tags',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 7)); ?>
			
	         </div>
                  <div class="element-input" title="Give your website url">      
			<?php echo CHtml::activeLabelEx($model,'ad_link', array('label' => Yii::t('publish_page_v2', 'Web Site'),'class'=>'title')); ?> 
			
			<?php echo CHtml::activeTextField($model,'ad_link',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'placeholder'=>'http://','tabindex' => 15)); ?>
		 </div>	
		
                   <div class="element-input" title="Link to your youtube or vimeo video">         
			<?php echo CHtml::activeLabelEx($model,'ad_video', array('label' => Yii::t('publish_page_v2', 'Video'),'class'=>'title')); ?> 
			
			<?php echo CHtml::activeTextField($model,'ad_video',array('size'=>60,'maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'placeholder'=>'Link to Youtube or vimeo video','tabindex' => 16,'title'=>'')); ?>
                   </div>	
		
       
	
	
	    
		<div class="element-input" title="Please enter the two words separated by space. The words are not case-sensitive.">
			<label>Verify that You are human<span class="required">*</span></label> 
		
		
	           <?php echo CHtml::activeLabel($model, 'validacion'); ?>
		
		<?php $this->widget('dashboard.extensions.recaptcha.EReCaptcha', 
		   array('model'=>$model, 'attribute'=>'validacion',
			 'theme'=>'red', 'language'=>'es_ES', 
			 'publicKey'=>'6Lfc_eASAAAAALB1F9VWE3qzEKr9bedCixem_q_p')
		     ) ?>
		
	        </div>
	  <div class="element-submit">
            
		 <?php echo CHtml::submitButton('Next Step', array('style'=>'margin:8px;')); ?>
          </div>
      
	</div>
<?php $this->endWidget();?>
</div>