<div  id = "main" >

	  <div class="form">
        <?php $this->widget('ext.pixelmatrix.EUniForm',array('theme' => 'aristo')); 
                    $form = $this->beginWidget('CActiveForm', array(
                         'id' => 'user-groups-passrequest-form',
                         'enableAjaxValidation'=>true,
                         'enableClientValidation'=>true,
           ));  ?>


 
	
  <fieldset>
	 <?php //$this->widget('menuSteps',array('event' => $event,'title'=>'Please specify your Account details'));?>	
    <?php echo CHtml::errorSummary($model); ?>
        <div class="row">
            <div class="span3">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('class'=>'span3', 'title'=>'')); ?>
		<?php echo CHtml::error($model,'username'); ?>
	    </div>
       
            <div class="span3">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('class'=>'', 'title'=>'Contact Email address')); ?>
		<?php echo CHtml::error($model,'email'); ?>
	      </div>
            </div>
     <div class="row">
        <div class="span3">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('class'=>'span3', 'title'=>'')); ?>
        </div>
          <div class="span3">     
              <?php echo $form->labelEx($model,'password_confirm'); ?>
	      <?php echo $form->passwordField($model,'password_confirm',array('class'=>'span3', 'title'=>'')); ?>
	 </div>
    </div>   
    		
    <?php if (UserGroupsConfiguration::findRule('simple_password_reset') === false): ?>
     <div class="row">
       <div class="span5">
		<?php echo $form->labelEx($model,'question'); ?>
		<?php echo $form->textField($model,'question',array('class'=>'span5','placeholder'=>'question', 'title'=>'')); ?>
		<?php echo CHtml::error($model,'question'); ?>
       </div>
	 <div class="span3">       
                <?php echo $form->labelEx($model,'answer'); ?>
		<?php echo $form->textField($model,'answer',array('placeholder'=>'answer', 'title'=>'')); ?>
		<?php echo CHtml::error($model,'answer'); ?>
	</div>
     </div>
    <?php endif; ?>
    
     <?php if(extension_loaded('gd')): ?>
         <div class="row">
             <div class="span3">  
		<?php echo $form->labelEx($model,'captcha'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'captcha'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
	  </div>
         </div>       
           <?php endif; ?>
     	
       <div class="form-actions">
    <?php echo CHtml::hiddenField('formID', $form->id) ?>
     <div class="btn btn-primary">
<?php echo CHtml::submitButton('Submit Account Details',
                             // '',  array('update' => '#main'),   
                 array('id' => 'submit-this','class' =>'btn btn-primary') ); ?>
               </div>
    
</div>
 </fieldset>
 <?php $this->endWidget(); ?>


</div>
 </div>