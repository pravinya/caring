<?php

if($model->scenario === 'photo')  $htmlOptions = array(
		'name'=>'ad-pic-form',
		'enctype'=>'multipart/form-data');
	
	$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'ad-form',
		'enableAjaxValidation'=>true,
                'enableClientValidation'=>true,
             //   'action' => Yii::app()->createUrl('ad/publish'),
                'method' => 'POST',
                'clientOptions'=>array(
                     'validateOnSubmit'=>true,
                     'validateOnChange'=>true,
                     'validateOnType'=>false,
		),
		
		'htmlOptions'=>$htmlOptions
	)); ?>
   
    
    <?php $this->renderPartial('_'.$event->step,array('form'=>$form,'model'=>$model,'event'=>$event),false,true);?>
    
	<div class="form-actions">
		
		 <span class="pull-right"><?php echo CHtml::htmlButton('Next Step<i class="icon-chevron-right"></i> ', array('class'=>'btn btn-primary btn-large', 'type'=>'submit')); ?></span>
  
	</div>

<?php $this->endWidget(); ?>    