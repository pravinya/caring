
<div id="userGroups-container">
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
     <div id="xfancy_header" class="alert alert-success"><h3>Returning User?</h3><br/>
       Please provide your login credentials</div>
    
          
    <div class="row-fluid" >
	<div class="span5">

  
	   <div id="error-div" class="alert alert-block alert-error" style="display:none;"></div>    
	      
     
        
   <?php if(Yii::app()->user->isGuest):?>
      
      <?php

	$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>"user_login_form",
		'type' =>'horizontal',
	        'method' => 'POST',
		'enableAjaxValidation' => true,
		'enableClientValidation' => true,
                'clientOptions'=>array(
                     'validateOnSubmit'=>true,
                     'validateOnChange'=>true,
                     'validateOnType'=>false,
		),
		
		'htmlOptions'=>array( 
				     "style"=>"margin-left:29px;border-right:1px solid #e5e5e5;background-color:#FFFFFF;font-size:12px;color:#666666;margin-right:8px;"
				     )
	)); ?>
	
    
		   
                 
	<div id="login-error-div" class="alert alert-block alert-error" style="display:none;"> </div>
	<!--<div class="element-text"  title="Please Login"><h4 class="title">Returning User? Login</h4></div>-->
	   
	<?php echo $form->textFieldRow($login_model, 'username', array('title'=>'user name','class'=>'input-medium')); ?>
	<?php echo $form->passwordFieldRow($login_model, 'password', array('title'=>'password','class'=>'input-medium')); ?>
       <div class="row-fluid checkbox">
			<?php echo $form->checkBox($login_model,'rememberMe'); ?>
			<?php echo $form->label($login_model,'rememberMe'); ?>
			<?php echo $form->error($login_model,'rememberMe'); ?>
		</div>
		
        <div class="form-actions">			
		 <?php $this->widget('bootstrap.widgets.TbButton', array(
                                             'buttonType' => 'ajaxSubmit',
					     'type' =>'custom',
                                            'url' => array('/site/login.GetLogin'),
                                            // 'icon' => 'ok', 
                                             'label' => 'Sign In', 
                                              'htmlOptions'=>array("id"=>"login","class" => "btn btn-primary"),
                                             'ajaxOptions' => array(
                                                'beforeSend' => 'function() { 
                            $("#login").attr("disabled",true);
                         
                        }',
                   'complete' => 'function() { 
                       $("#user_login_form").each(function(){
                          this.reset();   
                        });
                            $("#login").attr("disabled",false);
                         
                        }',                                'success'=>'function(data){  
        var obj = jQuery.parseJSON(data); 
        
        if(obj.login == "success"){
	    
            $("#user_login_form").html("<h4>Login Successful!</h4>");
	   
          // setTimeout(function(){location.reload(true);},400);
	  parent.location.reload(true);
	   parent.jQuery.fancybox.close();
	   
        }else{
            $("#login-error-div").show();
            
            $("#login-error-div").html("Login failed! Try again.");
            $("#login-error-div").append("<a href=\"/userGroups/user/passRequest.html\">Password Recovery</a>");
        
        }
    }'),
)); ?>
       </div> <!--form-actions-->    
           
                          			   
               <?php $this->endWidget();?> 
                  
                         
                       
                      
                       <?endif;?>
   
    </div><!-- form -->
    
    
    <div class="span5">
        
         <div id="fb-button" class="alert alert-success">
            <?php      if($fbUser["id"] > 0){
	                   $user =  UserGroupsUser::model()->findByAttributes(array('facebook'=>$fbUser["id"]));
            ?>		   
		   <p ><strong>
		   <span><?php echo CHtml::image(Yii::app()->facebook->getProfilePicture('small'));?></span>
	<span>
	 <?php echo (empty($user))? $fbUser["username"]: 'New User?';?>
           
			<?php echo CHtml::link('Sign Up', array('/userGroups/user/register','fbUser'=>$fbUser))?>
		
         
	
	
	</span><span><i class="icon-arrow-right"></i></span>
	</strong>
	</p> 
		   
	<?php	   
               }		   
	      else
	           $this->widget('ext.yii-facebook-opengraph.plugins.LoginButton', array(
                             'show_faces'=>false,'skin'=>'light','text'=>'connect with facebook','on_login'=>'window.location.reload();$("#LoginForm").hide();'));
       ?>
                
        </div>  
        
        
    </div>
    
   </div> <!--row-->
     </div>        