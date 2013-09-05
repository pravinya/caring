
<div id="userGroups-container">
	<?php if(Yii::app()->user->hasFlash('mail')):?>
    <h2>
        <?php echo Yii::app()->user->getFlash('mail'); ?>
    </h2>
	<?php else: ?>
    <h2>Forgot your account password? </h2>
<h4>Please fill the following form and submit to get one</h4>
	 <?php /** @var BootActiveForm $form */
       $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
             'id'=>'verticalForm',
              'htmlOptions'=>array('class'=>'well'),
      )); ?>
 
<?php echo $form->textFieldRow($model, 'username', array('class'=>'span3')); ?>
<?php echo $form->textFieldRow($model, 'email', array('class'=>'span3')); ?>
    
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
<?php $this->endWidget(); ?>
    <?php endif; ?>
</div>