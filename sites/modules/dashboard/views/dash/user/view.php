<?php //echo Yii::app()->user->id;?>
<?php if(empty($profiles)):?>	 
<?php else:?>   
<h4><?php echo ucfirst($model->firstname).''.ucfirst($model->lastname).' - '.Yii::app()->user->groupName.' ('.$model->email.')'; ?></h4>
<p class="pull-right"><a rel="popover" data-content="active"><i class="icon-check-sign icon-2x"></i></a></p>
  <?php  $this->renderPartial('user/_view', array('data' => $model, 'profiles' => $profiles))?>

<?php endif;?>