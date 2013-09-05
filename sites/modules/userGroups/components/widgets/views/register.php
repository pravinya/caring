
<?php
 $this->beginWidget('bootstrap.widgets.TbModal', array(
                                                       'id'=>"signup-modal",'autoOpen'=>$_GET['login']==="modal",
                                                       'options'=>array('backdrop'=>'static','height'=>'auto',
                                                            
                                                               ),
                                                       'events' => array(
                             // 'show'=>'jQuery(document).unbind('mousedown.dialog-overlay')
                            //.unbind('mouseup.dialog-overlay');',    
                             'hide' =>'js:(function(){$("#LoginForm").show();$("#regst_form").hide();})',
                             'hidden'=>'js:(function(){$(this).removeData("modal");})'
                                                       ))); 
 ?>
 <div class="modal-header"><a class="close" data-dismiss="modal">&times;</a><div class="element-text"  title="Please signup"><h2 class="title">New User? Sign Up</h2></div></div>
 <div class="modal-body" id="login_modal_body">
   <div class="row-fluid">
           <div class="span12">
              <?php // $this->controller->renderPartial($this->loginViewFile,array('login_model'=>$login_model,'fbProfile'=>$this->fbProfile)); ?>
              
             
              
             <?php $this->controller->renderPartial($this->regstViewFile,array('model'=>$model,'fbProfile'=>$this->fbProfile)); ?>

          </div>
       </div>
</div>
<?php  $this->endWidget();?>








