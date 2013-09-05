
<h5 class="tab">Dear Guest, Please Sign In to your account</h5>

	<?php if(isset(Yii::app()->request->cookies['success'])): ?>
	<div class="info">
		<?php echo Yii::app()->request->cookies['success']->value; ?>
		<?php unset(Yii::app()->request->cookies['success']);?>
	</div>
	<?php endif; ?>
	<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="info">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
	<?php endif; ?>
	<?php if(Yii::app()->user->hasFlash('mail')):?>
    <div class="info">
        <?php echo Yii::app()->user->getFlash('mail'); ?>
    </div>
	<?php endif; ?>
<div class="row">
    <div class="span9">
	
         
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
               
		'enableAjaxValidation'=>false,
                'enableClientValidation'=>true, 
             
		'focus'=>array($model, 'username'),
            'htmlOptions' => array('class' => 'form-stacked' )
	)); ?>
		<!--<p class="note"><?php echo Yii::t('userGroupsModule.general', 'Fields with {*} are required.', array('{*}' => '<span class="required">*</span>'))?></p>-->
		
	
                
                <div class="clearfix">
                   <?php echo $form->labelEx($model,'username'); ?>
                   <?php echo $form->textField($model,'username'); ?>
                  <?php //echo $form->error($model,'username'); ?>
                </div>
          


          
                <div class="clearfix">
                    <?php echo $form->labelEx($model,'password'); ?>
                    <?php echo $form->passwordField($model,'password'); ?>
                    <?php echo $form->error($model,'password'); ?>
                </div> 
         

         
                <div class="clearfix">
                    <?php echo $form->checkBox($model,'rememberMe');?>
                    <?php echo $form->labelEx($model,'rememberMe');?>
                </div>
         


           	<?php if (UserGroupsConfiguration::findRule('registration')): ?>
		<div class="clearfix">
			<?php echo CHtml::link(Yii::t('userGroupsModule.general', 'register'), array('/userGroups/user/register'))?>
		</div>
		<?php endif; ?>
		<div class="clearfix">
                    <?php //echo CHtml::submitButton('Log in',array('class'=>'btn primary large')); 
                    $this->widget('zii.widgets.jui.CJuiButton',array(
                        'name'=>'submit',
                        'caption'=>'Sign In',
                        'options'=>array(
                        // 'onclick'=>new CJavaScriptExpression('function(){alert("Yes");}'),
                    )));   ?>
              </div>
	
	<?php $this->endWidget('CActiveForm'); ?>
            
     
             <?php ;?>
	</div><!-- form -->
        
    
    
    <div class="span6">
      
            
            <h4>Already member of facebook?</h4>
       
    <?php    
         if(Yii::app()->user->isGuest) {
                
                $this->widget('ext.hoauth.HOAuthWidget', array('controllerId' => 'site')); 
                
                
            }?>
    </div>

</div>

 