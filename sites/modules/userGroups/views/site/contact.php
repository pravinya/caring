

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="alert-message success">
	<h5><?php echo Yii::app()->user->getFlash('contact'); ?></h5>
</div>

<?php else: ?>
<h5 class="tab">Please fill the form to send an email to us.</h5>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

  <div class="form-stacked">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'contact-form',
		'enableClientValidation'=>true,
		'errorMessageCssClass'=>'alert alert-error',
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model,NULL,NULL,$htmlOptions=array('class'=>'alert alert-error')); ?>
	<fieldset>
             <div class="row">
                 <div class="clearfix">
		<?php echo $form->labelEx($model,'name'); ?>
                 </div>
             </div>  
            <div class="row">
                 <div class="clearfix">
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
                 </div>
             </div>
            <div class="row">
                 <div class="clearfix">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
             </div>
             </div>
            <div class="row">
                 <div class="clearfix">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
                  </div>
             </div>
            <div class="row">
                 <div class="clearfix">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
                 </div>
             </div>
		<?php if(CCaptcha::checkRequirements()): ?>
                  <div class="row">
                 <div class="clearfix">
			<?php echo $form->labelEx($model,'verifyCode'); ?>
			<div>
			<?php $this->widget('CCaptcha',array(
                               // 'showRefreshButton' => false,
                                'clickableImage' => true)); ?>
			<?php echo $form->textField($model,'verifyCode'); ?>
			</div>
			<div class="hint">Please enter the letters as they are shown in the image above.
			<br/>Letters are not case-sensitive.</div>
			<?php echo $form->error($model,'verifyCode'); ?>
                      </div>
             </div>
		<?php endif; ?>
	</fieldset>
	<div class="actions" style="padding: 14px 19px;">
		<?php echo CHtml::submitButton('Submit', array('class'=>'btn btn-primary')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- well -->
<?php endif; ?>



<div>
 
</div>