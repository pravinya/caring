<?php if(Yii::app()->user->hasFlash('user')):?>
    <div class="alert">
        <h2><?php echo Yii::app()->user->getFlash('user'); ?></h2>
    </div>
<?php else:?>

<div id="userGroups-container">
	<table><thead><h2></h2></thead>
<tr>
    
    <td>
	
	<div class="form">

	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'user-groups-password-form',
		'enableAjaxValidation'=>true,
		'enableClientValidation'=>true,
	)); ?>
         
            <legend><?php echo 'Dear '.ucfirst($miscModel->username).', Update Security Settings'; ?></legend>
		<p class="alert note">Fields with <span class="required">*</span> are required.</p>

		<?php if (Yii::app()->user->pbac('userGroups.user.admin') && Yii::app()->user->id !== $passModel->id) :?>
			<?php echo $form->hiddenField($passModel,'old_password', array('value'=>'filler'))?>
		<?php else: ?>
		<div class="row-fluid">
			<?php echo $form->labelEx($passModel,'old_password'); ?>
			<?php echo $form->passwordField($passModel,'old_password',array('size'=>60,'maxlength'=>120)); ?>
			<?php echo $form->error($passModel,'old_password'); ?>
		</div>
		<?php endif; ?>
		<div class="row-fluid">
			<?php echo $form->labelEx($passModel,'password'); ?>
			<?php echo $form->passwordField($passModel,'password',array('size'=>60,'maxlength'=>120)); ?>
			<?php echo $form->error($passModel,'password'); ?>
		</div>
		<div class="row-fluid">
			<?php echo $form->labelEx($passModel,'password_confirm'); ?>
			<?php echo $form->passwordField($passModel,'password_confirm',array('size'=>60,'maxlength'=>120)); ?>
			<?php echo $form->error($passModel,'password_confirm'); ?>
		</div>
		<?php if (UserGroupsConfiguration::findRule('simple_password_reset') === false): ?>
		<div class="row-fluid">
			<?php echo $form->labelEx($passModel,'question'); ?>
			<?php echo $form->textField($passModel,'question',array('size'=>60,'maxlength'=>120)); ?>
			<?php echo $form->error($passModel,'question'); ?>
		</div>
		<div class="row-fluid">
			<?php echo $form->labelEx($passModel,'answer'); ?>
			<?php echo $form->passwordField($passModel,'answer',array('size'=>60,'maxlength'=>120)); ?>
			<?php echo $form->error($passModel,'answer'); ?>
		</div>
		<?php endif; ?>
		
                	
        <div class="form-actions">	
             <?php echo CHtml::hiddenField('formID', $form->id) ?>
		 <?php $this->widget('bootstrap.widgets.TbButton', array(
                                             'buttonType' => 'submit',
					     'type' =>'primary',
                                            'url' => array('/dashboard/dash/accountsettings'),
                                            // 'icon' => 'ok', 
                                             'label' => 'Update Settings', 
                                              'htmlOptions'=>array("id"=>"set-pass","class" => "btn btn-info btn-large"),
                                             'ajaxOptions' => array(
                                                'beforeSend' => 'function() { 
                            $("#set-pass").attr("disabled",true);
                         
                        }',
                 ),
)); ?>
       </div> <!--form-actions-->    
           
      
	<?php $this->endWidget(); ?>
	</div><!-- form -->
    </td> 
    
    
    <td style="margin-left:20px;">
	

	<div class="form" style="border-left:1px #CCC solid;padding:8px;">

	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'user-groups-misc-form',
		'enableAjaxValidation'=>true,
		'enableClientValidation'=>true,
	)); ?>
            <legend><?php echo Yii::t('userGroupsModule.general', 'Update Email'); ?></legend>
		<p class="note">Fields with <span class="required">*</span> are required.</p>

		<?php if (UserGroupsConfiguration::findRule('personal_home') || Yii::app()->user->pbac(array('user.admin', 'admin.admin'))): ?>
		<div class="row-fluid">
			<?php echo $form->labelEx($miscModel,'home'); ?>
			<?php
			$home_lists = UserGroupsAccess::homeList();
			array_unshift($home_lists, Yii::t('userGroupsModule.admin','Group Home: {home}', array('{home}'=>$miscModel->relUserGroupsGroup->home)));
			?>
			<?php echo $form->dropDownList($miscModel,'home', $home_lists); ?>
			<?php echo $form->error($miscModel,'home'); ?>
		</div>
		<?php endif; ?>
		<div class="row-fluid">
			<?php echo $form->labelEx($miscModel,'email'); ?>
			<?php echo $form->textField($miscModel,'email',array('size'=>60,'maxlength'=>120)); ?>
			<?php echo $form->error($miscModel,'email'); ?>
                    <div class="alert hint"><i class="icon-lock"></i>&nbsp;Your email is protected with us</div>
		</div>

		<div class="form-actions">
                    <?php echo CHtml::hiddenField('formID', $form->id) ?>
            <?php echo CHtml::submitButton('update email',array('class'=>'btn btn-primary')
                                       ); ?>
		 
       </div> <!--form-actions-->    
           

	<?php $this->endWidget(); ?>
	</div><!-- form -->

	
    </td>

</tr>  </table>
</div>

<?php endif;?>