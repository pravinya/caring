 <?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'login-modal')); ?>
 
<div class="modal-header">
    <a class="close" data-dismiss="modal"></a>
    <h4>Returning User? Log In</h4>
</div>
 
<div class="modal-body" id="user_login_body">  
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

    <div class="span-12">
	
      <div class="row-fluid">
    <div class="span-6">     
        <?php 
          $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id'    => 'LoginForm',
            //   'action' => array('/site/login.GetLogin'),
          //  'enableAjaxValidation' => false,
          //  'enableClientValidation' => true,
         //   'clientOptions'=>array(
         //             'validateOnSubmit'=>false,
          //                       ),
            'htmlOptions' => array( 'class' => 'navbar-form'
            )  )   );
        ?>
      
    
                <div id="incorrect-login" class="error-msg"></div>
                <div id="error-div" class="alert alert-block alert-error" style="display:none;">
    </div>
                
                <?php echo $form->textFieldRow($model, 'username', array(
                            'class' => 'span9 bg-light-grey', 'placeholder'=>'Username*'
                            )
                      ); ?>
    <?php echo $form->passwordFieldRow($model, 'password', array(
                             'class' => 'span9 bg-light-grey','placeholder'=>'Password*'
                             )
                      ); ?>
                
                <div class="row-fluid">
                        <div class="span5">
                                <p><a href="/userGroups/user/passRequest.html" class="grey">Forgot</a> <span class="light-grey">your password?</span></p>
                        </div>
                        <div class="span3 offset1">
                            <?php $this->widget('bootstrap.widgets.TbButton', array(
                                             'buttonType' => 'ajaxSubmit',
                                            'url' => array('/site/login.GetLogin'),
                                             'icon' => 'ok', 
                                             'label' => 'Sign In', 
                                             'ajaxOptions' => array(
                                                'success' => 
'function(data){
        var obj = $.parseJSON(data);
        if(obj.login=="success"){
            $("#login-modal").modal("hide");
            setTimeout(function(){location.reload(true);},400);
        }else{
            $("#error-div").show();
            $("#error-div").html("");
            if("UserGroupsUser_password" in obj){
                $("#error-div").html(obj.UserGroupsUser_password[0]+"<br />");
            }
            if("UserGroupsUser_username" in obj){
                $("#error-div").append(obj.UserGroupsUser_username[0]);
            }
        }
    }'),
));
    ?>
                                <?php
                                /*        echo CHtml::ajaxSubmitButton('Sign In', array('/site/login.GetLogin'), array(
                                                'type' => 'POST',
                                                'update' => '#user_login_body',
                                                'beforeSend' => 'function(){
                                                                        $("#incorrect-login").text("Processing...");
                                                                }',
                                                'success'=>'function(data){
        var obj = $.parseJSON(data);
        if(obj.login=="success"){
            
            setTimeout(function(){location.reload(true);},400);
        }else{
            $("#error-div").hide();
            $("#incorrect-login").addClass("alert alert-block alert-error").text("Invalid username or password");
            if("UserGroupsUser_password" in obj){
                $("#error-div").html(obj.UserGroupsUser_password[0]+"<br />");
            }
            if("UserGroupsUser_username" in obj){
                $("#error-div").append(obj.UserGroupsUser_username[0]);
            }
        }
    }',
                                                
                                                ),
                                                        array("class" => "btn btn-primary pull-right")
                                        );
                                    */    ?>

                        </div>

                </div>
        <?php $this->endWidget(); ?>
         </div>         
    <div class="span-6">
      
            
            <h4>Already a member of facebook ?</h4>
       
    <?php    
         if(Yii::app()->user->isGuest) {
                
                $this->widget('ext.hoauth.HOAuthWidget', array('controllerId' => 'site')); 
                
                
            }?>
            
     	<?php if (UserGroupsConfiguration::findRule('registration')): ?>
		<div class="clearfix">
			<?php echo CHtml::link(Yii::t('userGroupsModule.general', 'register using your email'), array('/userGroups/user/register'))?>
		</div>
		<?php endif; ?>
    </div>       
   
             <?php ;?>
	</div><!-- form -->
        
    
    
      </div>
   
 </div>        
 <?php $this->endWidget(); ?>