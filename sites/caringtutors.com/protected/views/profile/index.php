<div class = "view">
<?php
        
         $id = $_GET['id']; 
        // $prof = Profile::model()->findByAttributes(array('ug_id' => $id ));
         $user = UserGroupsUser::model()->findByPk($id);
         echo $model->owner->email;
        ?>
   	
	
	<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        array('name'=>'title', 'label'=>'title'),
        array(               // related city displayed as a link
            'label'=>'Address',
            //'type'=>'raw',
            'value'=> $model->addr1   //.', '.$model->addr2.', '.$model-location,
        ),
       
        array('name'=>'cat_id', 'label'=>'Category'),
        array('name'=>'contact_name', 'label'=>'Contact Person'),
        array('name'=>'mobile', 'label'=>'Contact Number'),
    ),
)); ?>
	</div>