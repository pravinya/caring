<?php
$this->breadcrumbs=array(
	Yii::t('userGroupsModule.general','User Registration'),
);
?>
<?php if (Yii::app()->user->hasFlash('user')):?>
<div class="info">
    <?php echo Yii::app()->user->getFlash('user');?>
</div>    
<?php else:?>
<div id="userGroups-container"  >
   <div id="xfancy_header" class="alert alert-success"><h3>User Registration</h3><br/>
       New user? Please register yourself by providing the following details</div>
<div id="signup-error-div" class="alert alert-block alert-error" style="display:none;"> </div>
 <?php //print_r($fbUser);
        /*   $this->widget('ext.imageSelect.ImageSelect',  array(
                                 'path'=>'/image/default/create/id/'.$model->imageId.'&version=medium',
                                 'alt'=>'alt text',
                                 'uploadUrl'=>$this->createUrl('/user/uploadAvatar',array('imid'=>$model->imageId)),
        'htmlOptions'=>array()
   )); */ ?>
	
		<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'user-groups-registration-form',
                        'type'=>'vertical',
			 'method' => 'POST',
		'enableAjaxValidation' => true,
		'enableClientValidation' => true,
                'inlineErrors'=>true,
		
		
               'htmlOptions'=>array('style'=>"margin-left:24px;")
                      )  ); ?>
          <fieldset>
 
    
    
                <?php echo $form->dropDownListRow($model, 'group_id', array('4'=>'Tutor','5'=>'Training Business','6'=>'Tutoring Agency')); ?>
           <div class="row-fluid" style="margin-bottom:4px;">
              <div class="span4"><?php echo $form->textFieldRow($model, 'username', array('title'=>'username')); ?></div>
              <div class="span4"><?php echo $form->textFieldRow($model, 'email', array('title'=>'email address')); ?></div>
           </div>
            <div class="row-fluid" style="margin-bottom:4px;">
	     <div class="span4"><?php echo $form->passwordFieldRow($model, 'password', array('title'=>'password')); ?></div>
	     <div class="span4"><?php echo $form->passwordFieldRow($model, 'password_confirm', array('title'=>'repeat password')); ?></div>
		
              </div>
		<?php
		// additional fields of additional profiles supporting registration
		foreach ($profiles as $p) {
			$this->renderPartial('//'.str_replace(array('{','}'), NULL, $p['model']->tableName()).'/'.$p['view'], array('form' => $form, 'model' => $p['model']));
		}
		?>
	<?php if (UserGroupsConfiguration::findRule('simple_password_reset') === false): ?>
    
            <div class="row-fluid" style="margin-bottom:4px;">
               <div class="span4"><?php echo $form->textFieldRow($model, 'question', array('title'=>'password reset question')); ?> </div>
	       <div class="span4"><?php echo $form->textFieldRow($model, 'answer', array('title'=>'password reset answer')); ?> </div>
	     </div>
	<?php endif; ?>
    
           <?php echo $form->captchaRow($model, 'captcha', array('title'=>'Verification')); ?>
		<div class="row" style="display:none;">
		<?php echo $form->textField($model,'facebook',array('value' => $fbUser['id'])); ?>
		<?php //echo $form->error($message,'receiver_id'); ?>
	     </div>
	     <div class="row" style="display:none;">
		<?php echo $form->hiddenField($model,'firstname',array('value' => $fbUser['first_name'])); ?>
             </div>
	     <div class="row" style="display:none;">
		<?php echo $form->hiddenField($model,'lastname',array('value' => $fbUser['last_name'])); ?>
             </div>
	     <div class="row" style="display:none;">
		<?php echo $form->hiddenField($model,'displayname',array('value' => $fbUser['name'])); ?>
             </div>
	     <div class="row" style="display:none;">
		<?php echo $form->hiddenField($model,'gender',array('value' => $fbUser['gender'])); ?>
             </div>
          </fieldset>
	    <div class="form-actions">
		 
		 <?php $this->widget('bootstrap.widgets.TbButton', array(
                                               'buttonType'=>'submit', 
                                               'type'=>'primary', 
                                               'label'=>'Submit Details',
                                               'ajaxOptions' => array('success'=>'function(){
                                                   parent.location.reload(true);
	                                           parent.jQuery.fancybox.close();

                                               }')
                     
                                        )); ?>
		
	    </div>
     <?php $this->endWidget(); ?>
</div>

<?php endif;?>