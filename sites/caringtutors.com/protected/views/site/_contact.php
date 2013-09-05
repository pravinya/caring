<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="alert">
	<h3><?php echo Yii::app()->user->getFlash('contact'); ?></h3>
	
</div>

<?php else: ?>

<h4>Please Contact Us</h4>
<p class="lead"><i class="icon-envelope icon-2x pull-left icon-border"></i>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

       
<?php  $form=$this->beginWidget('CActiveForm', array(
		'id'=>'ad-loc-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation'=>true,

                'method' => 'POST',
                'clientOptions'=>array(
                     'validateOnSubmit'=>true,
                     'validateOnChange'=>true,
                     'validateOnType'=>false,
		),
		
		'htmlOptions'=>array('class'=>'gen-form','style'=>'margin-left:23px;')
	)); 
             
    ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	
            
       <div class="row-fluid">
              <div class="publish_label_conatiner"> 
		<?php echo $form->labelEx($contact_model,'name'); ?>
             </div>     
		<?php echo $form->textField($contact_model,'name',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($contact_model,'name'); ?>
           <div class="clear"></div>
	</div>
        <div class="row-fluid">
            <div class="publish_label_conatiner">
		<?php echo $form->labelEx($contact_model,'email'); ?>
           </div>     
		<?php echo $form->textField($contact_model,'email',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($contact_model,'email'); ?>
            <div class="clear"></div>
	</div>
        <div class="row-fluid">
            <div class="publish_label_conatiner">
		<?php echo $form->labelEx($contact_model,'mobile'); ?>
           </div>     
		<?php echo $form->textField($contact_model,'mobile',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($contact_model,'mobile'); ?>
            <div class="clear"></div>
	</div>
        <div class="row-fluid">
            <div class="publish_label_conatiner">
		<?php echo $form->labelEx($contact_model,'subject'); ?>
           </div>     
		<?php echo $form->textField($contact_model,'subject',array('size'=>80,'maxlength'=>128)); ?>
		<?php echo $form->error($contact_model,'subject'); ?>
            <div class="clear"></div>
	</div>
        
        <div class="row-fluid">
            <div class="publish_label_conatiner">
		<?php echo $form->labelEx($contact_model,'body'); ?>
           </div>     
		<?php echo CHtml::activeTextArea($contact_model,'body',array('row-fluids'=>10, 'cols'=>70)); ?>

		<?php echo $form->error($contact_model,'body'); ?>
            <div class="clear"></div>
	</div>
	
   <div class="form-actions ">
              
		 <?php echo CHtml::htmlButton('Send Message ', array('class'=>'btn btn-primary btn-large', 'type'=>'submit')); ?>
              
          </div>
         
  
	    
     <?php $this->endWidget(); ?>



<?php endif; ?>


