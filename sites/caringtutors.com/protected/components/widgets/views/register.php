<?php if (Yii::app()->user->hasFlash('signup')):?>
<div class="info">
    <?php echo Yii::app()->user->getFlash('signup');?>
</div>    
<?php else:?>

 <?php //print_r($fbUser);
        /*   $this->widget('ext.imageSelect.ImageSelect',  array(
                                 'path'=>'/image/default/create/id/'.$model->imageId.'&version=medium',
                                 'alt'=>'alt text',
                                 'uploadUrl'=>$this->createUrl('/user/uploadAvatar',array('imid'=>$model->imageId)),
        'htmlOptions'=>array()
   )); */ ?>
	
		<?php
		
		 $form=$this->beginWidget('CActiveForm', array(
		'id'=>'user-groups-registration-form',
		'enableAjaxValidation'=>false,
		'enableClientValidation'=>true,

                'method' => 'POST',
                'clientOptions'=>array(
                     'validateOnSubmit'=>true,
                     'validateOnChange'=>true,
                     'validateOnType'=>false,
		),
		
		'htmlOptions'=>array('class'=>'formoid-default','style'=>'background-color:#7ddfe0;font-size:14px;font-family:"Open Sans",Arial,Verdana,sans-serif;width:880px;max-width:100%;min-width:588px;')
	));
		/*$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'user-groups-registration-form',
                       'type' =>'horizontal',
	        'method' => 'POST',
		'enableAjaxValidation' => true,
		'enableClientValidation' => false,
                'clientOptions'=>array(
                     'validateOnSubmit'=>true,
                     'validateOnChange'=>false,
                     'validateOnType'=>false,
		),
		
		
               'htmlOptions'=>array('style'=>"margin-left:24px;")
                      )  );*/ ?>
	<div id="fancy_header" >
			<h3>caringtutors.com:New User Registration</h3>
			
       <div id="signup-error-div" class="alert alert-block alert-error" style="display:none;"></div>
      
	<table style = "background-color:#fff;padding:8px;">

        <tr><td>
      
           <div class="span5">
        
                <div id="fb-button" class="alert alert-success">
            <?php      if($fbUser["id"] > 0){
	                   $user =  UserGroupsUser::model()->findByAttributes(array('facebook'=>$fbUser["id"]));     ?>		   
		   <p ><strong>
		   <span><?php echo CHtml::image(Yii::app()->facebook->getProfilePicture('small'));?></span>
	<span> 	 <?php echo $fbUser["first_name"].'.'.$fbUser["last_name"];?> ?php echo CHtml::link('Sign Up', array('/userGroups/user/register','fbUser'=>$fbUser))?> 	</span>
	<span><i class="icon-arrow-right"></i></span>
	</strong>
	</p> 
		   
	<?php	   
               }		   
	      else
	           $this->widget('ext.yii-facebook-opengraph.plugins.LoginButton', array(
                                   'show_faces'=>false,
                                   'skin'=>'light',
                                   'size' => 'large',
                                   'text'=>'Join Us Using facebook account',
                                   'on_login'=>'window.location.reload();')
                             );
       ?>
                
        </div>  
        
        
    </div>
</td></tr>
	
	<tr>	   
         
	 <td style="width:70%;">
    
    <div class="element-radio">
		
		<?php echo CHtml::activeLabelEx($model,'group_id', array('label' => Yii::t('publish_page_v2', 'I am a '),'class'=>'title')); ?>
               <div class="column">
		<?php echo CHtml::activeRadioButtonList($model,'group_id', array('4'=>'Tutor','5'=>'Training Business','6'=>'Tutoring Agency'), array( 'labelOptions'=>array('style'=>'display:inline'),'template'=>'<div style="width:67%;float:left;">{input} {label}</div>','separator'=>'  ','tabindex' => 2)); ?>
               </div>
	       <div style="clear:both;"></div>
    </div>
    <div class="element-input">
		<?php echo CHtml::activeLabelEx($model,'username', array('label' => Yii::t('publish_page', 'User Name'),'class'=>'title'));?>
		
	         <?php echo CHtml::activeTextField($model,'username',array('maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 1)); ?>
            </div>
    <div class="element-input">
		<?php echo CHtml::activeLabelEx($model,'email', array('label' => Yii::t('publish_page', 'Email Id'),'class'=>'title'));?>
		
	         <?php echo CHtml::activeTextField($model,'email',array('maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 1)); ?>
            </div>
	<div class="element-input">
		<?php echo CHtml::activeLabelEx($model,'password', array('label' => Yii::t('publish_page', 'Password'),'class'=>'title'));?>
		
	         <?php echo CHtml::activePasswordField($model,'password',array('maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 1)); ?>
            </div>
      <div class="element-input">
		<?php echo CHtml::activeLabelEx($model,'password_confirm', array('label' => Yii::t('publish_page', 'Repeat Password'),'class'=>'title'));?>
		
	         <?php echo CHtml::activePasswordField($model,'password_confirm',array('maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 1)); ?>
            </div>
      
           
		<?php
		// additional fields of additional profiles supporting registration
		//foreach ($profiles as $p) {
		//	$this->renderPartial('//'.str_replace(array('{','}'), NULL, $p['model']->tableName()).'/'.$p['view'], array('form' => $form, 'model' => $p['model']));
		//}
		?>
	<?php if (UserGroupsConfiguration::findRule('simple_password_reset') === false): ?>
         <div class="element-input">
		<?php echo CHtml::activeLabelEx($model,'question', array('label' => Yii::t('publish_page', 'Security Question'),'class'=>'title'));?>
		
	         <?php echo CHtml::activeTextField($model,'question',array('maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 1)); ?>
            </div>
	 <div class="element-input">
		<?php echo CHtml::activeLabelEx($model,'answer', array('label' => Yii::t('publish_page', 'Answer for Security Question'),'class'=>'title'));?>
		
	         <?php echo CHtml::activeTextField($model,'answer',array('maxlength'=>255, 'class' => 'publish_input', 'style' => 'width:336px;', 'tabindex' => 1)); ?>
            </div>
          
	<?php endif; ?>
   
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
	
	    <div class="form-actions">
		 <?php $this->widget('bootstrap.widgets.TbButton', array(
                                             'buttonType' => 'ajaxSubmit',
					     'type' =>'custom',
                                            'url' => array('/site/login.GetLogin','type'=>1),
                                            // 'icon' => 'ok', 
                                             'label' => 'Sign Up', 
                                              'htmlOptions'=>array("id"=>"register","class" => "btn btn-primary"),
                                             'ajaxOptions' => array(
                                                'beforeSend' => 'function() { 
                                                   $("#signup-error-div").hide();
                           $("#register").attr("disabled",true);
                         
                        }',
                   'complete' => 'function() { 
                          $("#signup-error-div").show();
                         $("#register").attr("disabled",false);
                         
                        }',
                    'success'=>'function(data){  
                     
                                  var obj = jQuery.parseJSON(data); 
                                  var str = "Please correct the following errors and resubmit the form.\n\n"; //alert(obj);
                                  for (var i=0; i<obj.length; i++) {
                                           var j = i+1;
                                           str = str + j + ".) " + obj[i] + "\n";
                                  }
                                  str = "<pre>"+str+"</pre>";
                                  
                                   $("#signup-error-div").html(str);
                                if(obj.signup == "success"){
	    
                             $("#user-groups-registration-form").html("<h4>Signup Successful!</h4>");
	   
          // setTimeout(function(){location.reload(true);},400);
        //  parent.location.href = "/site/login.GetLogin";
	 // parent.location.reload(true);
	 parent.jQuery.fancybox.close();
	   
        }else{
           
        }

        
      
    }'),
)); ?>
	    </div>
	 </td>
       
       <td style="width:30%;">
           <?php   
            echo '<span class="pull-right">';
         echo CHtml::link('Returning User? Sign In',array('/site/login.GetLogin','type'=>2),array('id'=>'user-signin','class' => 'btn btn-info'));
         echo '</span>';?>
	</td>
       
       
       </tr>
       </table>
	    </div><!--  fancybox header -->
     <?php $this->endWidget(); ?>


<?php endif;?>