<div class="row-fluid" style ="border:2px background solid; " >
    <?php echo $this->layout;  ?>
<?php   $lgid = !empty($model2->imageId) ? $model2->imageId : 1;
                   
		  $this->widget('dashboard.extensions.imageSelect.ImageSelect',  array(
                                 'path'=>'/image/default/create/id/'.$lgid.'&version=medium',
                                 'alt'=>'alt text',
                                 'uploadUrl'=>$this->createUrl('/dashboard/tutor/uploadAvatar',array('imid'=>$model2->imageId)),
                                 'htmlOptions'=>array()
               ));  ?>

</div>