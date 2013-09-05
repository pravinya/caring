<?php
$this->breadcrumbs=array(
	UserGroupsModule::t('Profile Fields')=>array('admin'),
	UserGroupsModule::t($model->title),
);
$this->menu=array(
    array('label'=>UserGroupsModule::t('Create Profile Field'), 'url'=>array('create')),
    array('label'=>UserGroupsModule::t('Update Profile Field'), 'url'=>array('update','id'=>$model->id)),
    array('label'=>UserGroupsModule::t('Delete Profile Field'), 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>UserGroupsModule::t('Are you sure to delete this item?'))),
    array('label'=>UserGroupsModule::t('Manage Profile Field'), 'url'=>array('admin')),
    array('label'=>UserGroupsModule::t('Manage Users'), 'url'=>array('/user/admin')),
);
?>
<h1><?php echo UserGroupsModule::t('View Profile Field #').$model->varname; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'varname',
		'title',
		'field_type',
		'field_size',
		'field_size_min',
		'required',
		'match',
		'range',
		'error_message',
		'other_validator',
		'widget',
		'widgetparams',
		'default',
		'position',
		'visible',
	),
)); ?>
