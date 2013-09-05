   <div class="span4">
                   <span class="pull-right" id="signup_link">
			  
			  <?php
			  if($fbProfile["id"] > 0){
                               echo "Welcome, ".$fbProfile["username"];
			       echo CHtml::image(Yii::app()->facebook->getProfilePicture('large'));
			       
			  }
                           else if(Yii::app()->user->isGuest)         
                             $this->widget('ext.yii-facebook-opengraph.plugins.LoginButton', array(
                             'show_faces'=>false,'skin'=>'light','text'=>'connect with facebook','on_login'=>'window.location.reload();$("#LoginForm").hide();'));
                            
			  
			  $user =  UserGroupsUser::model()->findByAttributes(array('facebook' => $fbProfile["id"]));
			
                         if(empty($user) )
    echo  CHtml::link(Yii::t('userGroupsModule.general', 'signup to caringtutors.com'), '',array('class'=>'btn btn-success', 
                                   'onclick' => '$("#LoginForm").hide();$("#regst_form").show();$("#signup_link").hide();$("#error-div").hide();$("#UserGroupsUser_username").focus();', 
                              )); 
                          			   
                        ?>
                   </span>
   </div>
   
    <div class="span8">
		

		 <div id="incorrect-login" class="error-msg">
		    <?php if(Yii::app()->user->hasFlash('error'))
		       echo 'Login Failed. Try again!';  ?>
		 
		 </div>
        <div id="error-div" class="alert" style="display:none;"> </div>
     <?php if(Yii::app()->user->isGuest):?>
    <?php   $login_form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id'    => 'LoginForm',
            'htmlOptions' => array( 'class' => 'navbar-form well'
            )  )   );  ?>
             
        <fieldset>
             <?php echo $login_form->textFieldRow($login_model, 'username', array(
                            'class' => 'span9 bg-light-grey', 'placeholder'=>'Username*'
                            )
                      );
    echo $login_form->passwordFieldRow($login_model, 'password', array(
                             'class' => 'span9 bg-light-grey','placeholder'=>'Password*','prepend'=>'<i class="icon-key icon-large"></i>'
                             )
                      );?>
              
                      </fieldset>   
               
     <div class="row-fluid" style="margin-top:12px;padding-right:3px;">
             <?php $this->widget('bootstrap.widgets.TbButton', array(
                          'buttonType' => 'ajaxSubmit',
                          'url' => array('/site/login.GetLogin'),
                          'icon' => 'ok', 
                          'label' => 'Sign In', 
                          'htmlOptions'=>array("class" => "btn btn-primary pull-left"),
                          'ajaxOptions' => array(
			               
                                                              
                                                'success' => 
                                                      'function(data){
                                                            var obj = $.parseJSON(data);
                                                            if(obj.login =="success"){
                                                                 // $("#login-modal").modal("hide");
                                                                 // setTimeout(function(){location.reload(true);},400);
                                                            }else{
                                                                   $("#login-error-div").show();
                                                                   $("#login-error-div").html("");
                                                                   if("UserGroupsUser_password" in obj){
                                                                       $("#login-error-div").append("Login Failed. Please try again!");
                                                                  }
                                                             else if("UserGroupsUser_username" in obj){
                                                                        $("#login-error-div").append("Login Failed. Please try again!");
                                                                 }
	                                                     else $("#login-error-div").append("Login Failed. Please try again!");
                                                    }
                                   }'),
                                 ));  ?>

  <p class="pull-right"><small><a href="/userGroups/user/passRequest.html" class="grey">Forgot</a> <span class="light-grey">your password?</span></small></p>
     
     </div>
      
     <?php $this->endWidget();  ?>
   <?php else: ?>
     <h5>Login Successful</h5>
    
   <?php endif;?>
     </div>
		