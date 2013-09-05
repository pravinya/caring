<?php
$this->breadcrumbs=array(
	UserGroupsModule::t('Profile Fields')=>array('admin'),
	UserGroupsModule::t('Create'),
);
$this->menu=array(
    array('label'=>UserGroupsModule::t('Manage Profile Field'), 'url'=>array('admin')),
    array('label'=>UserGroupsModule::t('Manage Users'), 'url'=>array('/user/admin')),
);
?>
<h1><?php echo UserGroupsModule::t('Create Profile Field'); ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>