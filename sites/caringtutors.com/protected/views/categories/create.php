<?php
$this->breadcrumbs=array(
	'Subjects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Subjects', 'url'=>array('index')),
	array('label'=>'Manage Subjects', 'url'=>array('admin')),
);
?>

<h1>Create Subjects</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>