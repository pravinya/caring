<?php if(Yii::app()->user->isGuest) : ?>
 
<?php 

   $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
     'id'=>'userloginwidget',
   //  'cssFile'=>'jquery-ui-1.8.7.custom.css',
    //'theme'=>'redmond',
    // 'themeUrl'=>Yii::app()->request->baseUrl.'/css/ui',
     'options'=>array(
         'title'=>'User Login',
         'autoOpen'=>true,
         'modal'=>true,
         'width'=>300,
     ),
   ));

?>

<h2>Login</h2>

<div class="row-fluid">
    <div class="span6">     
        <?php $form=$this->beginWidget('CActiveForm', array(
                                                        'id'    => 'checkout_1',
                                                        'enableAjaxValidation' => false,
                                                        'enableClientValidation' => true,
                                                        'clientOptions'=>array(
                                                                        'validateOnSubmit'=>false,
                                                        ),
                                                        'htmlOptions' => array(
                                                                'class' => 'navbar-form',
                                                        )
                                        ));
        ?>
    
                <div id="incorrect-login" class="error-msg"></div>
                <?php echo $form->textField($model,'username',array('class'=>'span9 bg-light-grey','placeholder'=>'Username*')); ?>
                <?php echo $form->error($model,'email'); ?>
                
                <?php echo $form->passwordField($model,'password',array('class'=>'span9 bg-light-grey','placeholder'=>'password*')); ?>
                <?php echo $form->error($model,'password'); ?>
                
                <div class="row-fluid">
                        <div class="span5">
                                <p><a href="/userGroups/user/passRequest.html" class="grey">Forgot</a> <span class="light-grey">your password?</span></p>
                        </div>
                        <div class="span3 offset1">
                                <?php
                                        echo CHtml::ajaxSubmitButton('Sign In', '', array(
                                                'type' => 'POST',
                                                'update' => '#user_login',
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
                                        ?>

                        </div>

                </div>
        <?php $this->endWidget(); ?>
         </div>         
    <div class="span6">
      
            
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
   
</div>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>
<?php endif; ?>