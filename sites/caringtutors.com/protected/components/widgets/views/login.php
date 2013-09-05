
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
     
          
   
	<div >

  
	   <div id="error-div" class="alert alert-dismissable alert-info" style="display:none;"></div>    
	      
     
        
   <?php if(Yii::app()->user->isGuest):?>
    
      <?php
        $form=$this->beginWidget('CActiveForm', array(
		'id'=>'user_login_form',
		'enableAjaxValidation'=>false,
		'enableClientValidation'=>true,
                'method' => 'POST',
                'clientOptions'=>array(
                     'validateOnSubmit'=>true,
                     'validateOnChange'=>true,
                     'validateOnType'=>false,
		),
		
		'htmlOptions'=>array('class'=>'formoid-default','style'=>'background-color:#fff;font-size:14px;font-family:"Open Sans",Arial,Verdana,sans-serif;width:880px;max-width:100%;min-width:304px;')
	)); ?>
	
      <div id="fancy_header" style="width:50%;float:left;"><h3>Sign in to caringtutors.com</h3>
	<table style = "background-color:#fff;">
		<tr><td><div id="login-error-div" class="alert" style="display:none;">
		             </div>
		</div></td></tr>
		<tr>	   
         
	 <td>
	
	<!--<div class="element-text"  title="Please Login"><h4 class="title">Returning User? Login</h4></div>-->
	<div class="element-input">
		<?php echo CHtml::activeLabelEx($login_model,'username', array('label' => Yii::t('publish_page', 'User Name'),'class'=>'title'));?>
		
	         <?php echo CHtml::activeTextField($login_model,'username',array('maxlength'=>165, 'class' => 'publish_input', 'style' => 'width:176px;', 'tabindex' => 1)); ?>
            </div>
	<div class="element-input">
		<?php echo CHtml::activeLabelEx($login_model,'password', array('label' => Yii::t('publish_page', 'Password'),'class'=>'title'));?>
		
	         <?php echo CHtml::activePasswordField($login_model,'password',array('maxlength'=>165, 'class' => 'publish_input', 'style' => 'width:176px;', 'tabindex' => 1)); ?>
            </div>
	
       <div class="row-fluid checkbox">
			<?php echo $form->checkBox($login_model,'rememberMe'); ?>
			<?php echo $form->label($login_model,'rememberMe'); ?>
			<?php echo $form->error($login_model,'rememberMe'); ?>
		</div>
		
        <div class="form-actions">			
		 <?php $this->widget('bootstrap.widgets.TbButton', array(
                                             'buttonType' => 'ajaxSubmit',
					     'type' =>'custom',
                                            'url' => array('/site/login.GetLogin','type'=>2),
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
	    
            $("#user_login_form").html("<h4>Login Successful! Please Wait...</h4>");
	   
          // setTimeout(function(){location.reload(true);},400);
          parent.location.href = "/dashboard/dash.html";
	 // parent.location.reload(true);
	   parent.jQuery.fancybox.close();
	   
        }else{
            $("#login-error-div").show();
            
            $("#login-error-div").html("Login failed! Try again.");$("#login-error-div").append("<br>");
            $("#login-error-div").append("<a href=\"/userGroups/user/passRequest.html\">Forgot Password?</a>");
        
        }
    }'),
)); ?>
        
       
         
       </div> <!--form-actions-->    
        </td>
	
	<td>
           <?php   
            echo '<span class="pull-right">';
         echo CHtml::link('New User? Register',array('/site/login.GetLogin','type'=>1),array('id'=>'user-signup','class' => 'btn btn-info'));
         echo '</span>';?>
	</td>
	</tr>
	</table>   
     </div><!-- fancbox header -->                      			   
               <?php $this->endWidget();?> 
                  
                         
  
                      
                       <?endif;?>
  	</div>        