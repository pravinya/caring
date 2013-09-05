<div class="row-fluid">
    
 
	 <div class = "span2">
		<?php /*if(($data->relProfile->imageId == 0) && !empty($data->facebook))
		          echo CHtml::image(Yii::app()->facebook->getProfilePictureById($data->facebook));  */?>
		
		
		<?php //echo CHtml::encode(UserGroupsLookup::resolve('status', $data->status)); ?>
		<?php /*$this->widget('bootstrap.widgets.TbDetailView', array(
                        'data'=>$data,
                        'attributes'=>array(
                                        array('name'=>'firstname', 'label'=>'First name'),
                                        array('name'=>'lastname', 'label'=>'Last name'),
                                        array('name'=>'gender', 'label'=>'Gender'),
					array('value'=>$data->relUserGroupsGroup->groupname, 'label'=>'Account Type'),
					array('name'=>'email', 'label'=>'Email'),
					//array('value'=>UserGroupsLookup::resolve('status', $data->status), 'label'=>'Status'),
                         ),
                )); */ ?>
	 </div>
	 <div class = "span8">
		<?php  $this->widget( 'ext.EUpdateDialog.EUpdateDialog'); ?>
		<?php  $idx = 0; 
                       // render the profile extensions
                       foreach ($profiles as $p) {
			     $idx = $idx + 1;;
                 	     $this->renderPartial(str_replace(array('{','}'), NULL, $p['model']->tableName()).'/'.$p['view'], array('model'.$idx => $p['model']));
	               }
		?>
		
	
	 </div>
    
    
    
</div>	


