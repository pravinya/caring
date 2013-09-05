<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
 <b><?php echo 'group'; ?>:</b>
	<?php echo CHtml::encode($user->relUserGroupsGroup->groupname); 
	?>
	<br />

	<b><?php echo CHtml::encode($user->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($user->email); ?>
	<br />
	

	<b><?php echo CHtml::encode($model->getAttributeLabel('home')); ?>:</b>
	<?php //echo $model->readable_home; 
	?>
	<br />
