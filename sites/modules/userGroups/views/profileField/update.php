<?php
$this->breadcrumbs=array(
	UserGroupsModule::t('Profile Fields')=>array('admin'),
	$model->title=>array('view','id'=>$model->id),
	UserGroupsModule::t('Update'),
);
$this->menu=array(
    array('label'=>UserGroupsModule::t('Create Profile Field'), 'url'=>array('create')),
    array('label'=>UserGroupsModule::t('View Profile Field'), 'url'=>array('view','id'=>$model->id)),
    array('label'=>UserGroupsModule::t('Manage Profile Field'), 'url'=>array('admin')),
    array('label'=>UserGroupsModule::t('Manage Users'), 'url'=>array('/user/admin')),
);
?>

<h1><?php echo UserGroupsModule::t('Update Profile Field ').$model->id; ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>