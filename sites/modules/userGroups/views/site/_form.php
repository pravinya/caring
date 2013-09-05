<?php
$this->widget( 'ext.EUpdateDialog.EUpdateDialog' );
?>

<?php

 //$controller = $this->getController();
 //$model_class = ucfirst($controller->getId());
           echo '<div class="form-stacked">';
	
        
         $model = new Message();
         $receiverName = "pravinya"; 
         //$receiver_id = 1;
         $form=$this->beginWidget('CActiveForm', array(
		'id'=>'message-form',
                'action'=>array('/site/quick.job'),
		'enableClientValidation'=>true,
		'errorMessageCssClass'=>'alert alert-error',
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); 

	echo '<p class="note">';
        echo 'Fields with <span class="required">*</span> are required.'; 
        echo '</p>';

	echo $form->errorSummary($model);

	echo '<div class="row-fluid">';
        echo '<div class="clearfix">';
	//echo CHtml::textField('receiver', $receiverName);
	echo $form->hiddenField($model,'receiver_id');
		
	echo '</div> 	</div>';


	echo '<div class="row">';
          echo '<div class="clearfix">';
              echo 'Your Mobile Number'; 
            
	    echo $form->textField($model,'subject');
	    echo $form->error($model,'subject');
	echo '</div>   </div>';
	echo '<div class="row"><div class="clearfix">';
	  echo 'Job Description';
	echo $form->textArea($model,'body');
	echo $form->error($model,'body');
	echo '</div>	</div>';

        if(CCaptcha::checkRequirements()):
                  echo '<div class="row">';
                 echo '<div class="clearfix">';
		echo $form->labelEx($model,'verifyCode');
			echo '<div>';
		$this->widget('CCaptcha',array(
                               // 'showRefreshButton' => false,
                                'clickableImage' => true));
			echo $form->textField($model,'verifyCode');
			echo '</div>';
			echo '<div class="hint">Please enter the letters as they are shown in the image above.
			<br/>Letters are not case-sensitive.</div>';
			echo $form->error($model,'verifyCode');
                      echo '</div>      </div>';
	   endif;
	echo '<div class="actions" style="padding: 14px 19px;">';
		echo CHtml::submitButton('Send Job', array('class'=>'btn btn-primary'));
	echo '</div>';

	$this->endWidget();

        echo '</div>';
       
?>
