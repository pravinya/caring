
  <div class=span6">
   <?php
   if(Yii::app()->user->hasFlash('mail')):?>
   <div>
   <?php echo  Yii::app()->user->getFlash('mail');?>
   </div>
   <?php else:?>
       <p class="lead"><i class="icon-envelope icon-4x pull-left icon-border"></i>
You can reach the advertiser by sending the filling details . Thank you.
</p>
<?php  $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'normal-contact-form',
                        // 'class'=>'contact',
			//'action' => array('/site/contact.modal'),
			'type'=>'vertical',
			//'focus'=>($contact_model->hasErrors()) ? '.error:first' : array($form, 'name'),
                        //'inlineErrors'=>true,
			//'enableAjaxValidation'=>true,
			//'enableClientValidation'=>true,
			//'htmlOptions'=>
		));
             
    ?>
	
            
       
	<fieldset>
		 
		 <?php echo $form->textFieldRow($contact_model, 'name', array('title'=>'name')); ?>
		 <?php echo $form->textFieldRow($contact_model, 'email', array('title'=>'email')); ?>
		 <?php echo $form->textFieldRow($contact_model, 'mobile', array('prepend'=>'091+','placeholder'=>'10-digit mobile number','title'=>'mobile')); ?>
		 <?php echo $form->textFieldRow($contact_model, 'subject', array('title'=>'subject'),array('size'=>60,'maxlength'=>128)); ?>
		 <?php echo $form->textAreaRow($contact_model, 'body', array('class'=>'span5', 'rows'=>5)); ?>
		 <?php //echo $form->captchaRow($contact_model, 'verifyCode', array('title'=>'Verification')); ?>            
	 </fieldset>

  <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit Details')); ?>
      
      </div>
 
	    
		
   	
	    
     <?php $this->endWidget(); ?>
     

 <?php endif;?>
</div>