
<div id="userGroups-container">
	<?php if(Yii::app()->user->hasFlash('mail')):?>
    <h2>
        <?php echo Yii::app()->user->getFlash('mail'); ?>
    </h2>
	<?php else: ?>
    
	 <?php /** @var BootActiveForm $form */
	 $form=$this->beginWidget('CActiveForm', array(
		'id'=>'verticalForm',
		'enableAjaxValidation'=>false,
		'enableClientValidation'=>true,

                'method' => 'POST',
                'clientOptions'=>array(
                     'validateOnSubmit'=>true,
                     'validateOnChange'=>true,
                     'validateOnType'=>false,
		),
		
		'htmlOptions'=>array('class'=>'formoid-default','style'=>'background-color:#7ddfe0;font-size:14px;font-family:"Open Sans",Arial,Verdana,sans-serif;width:880px;max-width:100%;min-width:448px;')
	));
       ?>
       <div id="fancy_header" >
			<h2>caringtutors.com:Password Recovery</h2>
			
			<h2>Forgot your account password? </h2>
                     <h4>Please fill the following form and submit to get one</h4>
<div class="element-input">
		<?php echo CHtml::activeLabelEx($model,'username', array('label' => Yii::t('publish_page', 'User Name'),'class'=>'title'));?>
		
	         <?php echo CHtml::activeTextField($model,'username',array('maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 1)); ?>
            </div>
    <div class="element-input">
		<?php echo CHtml::activeLabelEx($model,'email', array('label' => Yii::t('publish_page', 'Email Id'),'class'=>'title'));?>
		
	         <?php echo CHtml::activeTextField($model,'email',array('maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 1)); ?>
            </div>

 <?php if (isset($model->errors['answer']) && !isset($model->errors['email']) && !isset($model->errors['username'])): ?>
		<div class="row">
			<h2><?php echo $model->errors['question'][0]; ?></h2>
			<?php echo $form->labelEx($model,'answer'); ?>
			<?php echo $form->textField($model,'answer'); ?>
			<?php echo $form->error($model,'answer'); ?>
		</div>
		<?php endif; ?>   
    
<div class="row buttons">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type'=>'primary',  'label'=>'Request New Password')); ?>
</div>

       </div>
<?php $this->endWidget(); ?>

    <?php endif; ?>
</div>