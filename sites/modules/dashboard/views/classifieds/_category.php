
<?php
//$this->widget('ext.pixelmatrix.EUniform',array('theme' => 'aristo',));
$form=$this->beginWidget('CActiveForm', array(
		'id'=>'ad-cat-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation'=>true,

                'method' => 'POST',
                'clientOptions'=>array(
                     'validateOnSubmit'=>true,
                     'validateOnChange'=>true,
                     'validateOnType'=>false,
		),
		
		'htmlOptions'=>array('class'=>'formoid-default','style'=>'background-color:#7ddfe0;font-size:14px;font-family:"Open Sans",Arial,Verdana,sans-serif;width:780px;max-width:100%;min-width:448px;')
	
	));?>
   
 <?php 
if(isset($event)){

echo '<p class="fl">';

echo 'Step '.$event->sender->currentStep;
echo ' of '.$event->sender->stepCount;
echo '</p/>';

echo $event->sender->menu->run();

}  ?>
 
<div id="fancy_header">	<h2><?=Yii::t('publish_page_v2', 'Choose Your Ad Category')?></h2>
<p class="alert">Please choose a category by clicking on a category title. Your selection will be seen on the right. </p>
<table><tr><td>
 <?php  // echo $form->errorSummary($model); ?> 

	<div style="float:left;width:100%;"><?php $this->widget('dashboard.components.widgets.catBrowser');   ?></div>	
        </td>
        <td>
			<div class="publish_label_conatiner">
			         <?php echo "Your choosen category"; ?>
			</div>
			
			<?php echo CHtml::activeTextField($model,'category_title',array('value'=>!empty($model->category_title) ? $model->category_title:'Training Category','disabled'=>'disabled','style'=>'width: 290px; height: 40px; border: 1px solid #999999; padding: 5px;font-weight:600;'));
     echo CHtml::activeHiddenField($model,'category_id'); ?>
     <?php echo CHtml::error($model,'category_id');?>
				
		
   <div class="form-actions">
		 <div class="pull-right" >
			
		 <?php echo CHtml::htmlButton('Next Step<i class="icon-chevron-right"></i> ', array('class'=>'btn btn-primary btn-large', 'type'=>'submit')); ?>
  
	</div>
 </div>  
        </td>
</tr>	
</table>

</div>
<?php $this->endWidget(); ?>
