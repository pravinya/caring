 <!-- Begin of Registration form -->
 <div class="" id="regst_form"  >
      
   
   <ul id="wzd-menu"><li class="wzd-active">    <span>New User?, Sign Up</span></li></ul>
     <?php if(!Yii::app()->user->hasFlash('signup')):?>
  <div id="error-div" class="alert alert-block alert-error" style="display:none;"></div>
    <?php

	$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>"RegstForm",
		'type' =>'horizontal',
	        'method' => 'POST',
                'clientOptions'=>array(
                     'validateOnSubmit'=>true,
                     'validateOnChange'=>true,
                     'validateOnType'=>false,
		),
		
		'htmlOptions'=>array( 'class'=>'span8',
				  //   "style"=>"background-color:#FFFFFF;font-size:14px;font-family:'Open Sans',Arial,Verdana,sans-serif;max-width:100%;min-width:398px;"
				     )
	)); ?>
	           
 
          <?php echo $form->dropDownListRow($model, 'group_id', array('2'=>'Tutor','3'=>'Training Business','4'=>'Tutoring Agency')); ?>
	
       
            <div class="row-fluid" style="margin-bottom:4px;">
	       
	          <div class="span4">
		        <?php echo $form->labelEx($model,'username'); ?>
		        <?php echo $form->textField($model,'username',array('title'=>'user name','class'=>'input-medium')); ?>
		       
	          </div>
		  <div class="span4">
		        <?php echo $form->labelEx($model,'email'); ?>
		        <?php echo $form->textField($model, 'email', array('value'=>$fbProfile["email"],'title'=>'email address','class'=>'input-medium')); ?>
		       
	          </div>
	       
	    </div>
            <div class="row-fluid" style="margin-bottom:4px;">
	       
	          <div class="span4">
		   
		        <?php echo $form->labelEx($model,'password'); ?>
		        <?php echo $form->passwordField($model,'password',array('class'=>'input-medium','title'=>'choose a password')); ?>
		       
	          </div>
             	   <div class="span4">
		        <?php echo $form->labelEx($model,'password_confirm'); ?>
		        <?php echo $form->passwordField($model, 'password_confirm', array('class'=>'input-medium','title'=>'repeat password')); ?>
		       
	          </div>
	   </div>
    	  <div class="row-fluid" style="margin-bottom:4px;">
		
	           <?php echo CHtml::activeLabel($model, 'validacion'); ?>
		  
		<?php $this->widget('application.extensions.recaptcha.EReCaptcha', 
		   array('model'=>$model, 'attribute'=>'validacion',
			 'theme'=>'red', 'language'=>'es_ES', 
			 'publicKey'=>'6LcNWuISAAAAALDLzYUmT7sxXLdf6AKmFsf76FJV')) ?>
		
         </div>	
        
             <div class="row">
		<?php echo CHtml::activeHiddenField($model,'facebook'); ?>
		
	     </div>
	     <div class="row">
		<?php echo CHtml::activeHiddenField($model,'firstname'); ?>
             </div>
	     <div class="row">
		<?php echo CHtml::activeHiddenField($model,'lastname'); ?>
             </div>
	     <div class="row">
		<?php echo CHtml::activeHiddenField($model,'displayname'); ?>
             </div>
	     <div class="row">
		<?php echo CHtml::activeHiddenField($model,'gender'); ?>
             </div>
 	 
     

	<div class="form-actions element-submit">
			
		 <?php $this->widget('bootstrap.widgets.TbButton', array(
                                             'buttonType' => 'ajaxSubmit',
					     'type' =>'custom',
                                            'url' => array('/site/signup.modal'),
                                             'icon' => 'ok', 
                                             'label' => 'Sign Up', 
                                              'htmlOptions'=>array("class" => "btn btn-primary pull-left"),
                                             'ajaxOptions' => array(
                                                                    'success'=>'function(data){
        var obj = $.parseJSON(data);
        if(obj.signup == "success"){
	    $("#user_login_form_div").show();
            $("#RegstForm").html("<h4>Registration Successful.Please visit your registered email for instructions to complete your registration. Thank you.</h4>");
	   
           // setTimeout(function(){location.reload(true);},400);  
        }else{
            $("#error-div").show();
            
            $("#error-div").html("");
            if("UserGroupsUser_username" in obj){
                $("#error-div").html(obj.UserGroupsUser_username[0]+"<br />");
            }
            else if("UserGroupsUser_email" in obj){
                $("#error-div").append(obj.UserGroupsUser_email[0]);
            }
            else if("UserGroupsUser_password" in obj){
                $("#error-div").append(obj.UserGroupsUser_password[0]);
            }
            else if("UserGroupsUser_password_confirm" in obj){
                $("#error-div").html(obj.UserGroupsUser_password_confirm[0]+"<br />");
            }
             else if("UserGroupsUser_captcha" in obj){
                $("#error-div").html(obj.UserGroupsUser_captcha[0]+"<br />");
            }
          $("#login-modal").show("fast");
        // setTimeout(function(){location.reload(true);},400);   //setTimeout("getRandom();", 10000);
        }
    }'),
)); ?>  
	
	    </div>
    
<?php $this->endWidget(); ?>
    
    <?php endif;?>   
    </div>
   <!-- End of Registration form -->

 

 
