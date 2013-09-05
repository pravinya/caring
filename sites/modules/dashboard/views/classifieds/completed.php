<?php if(Yii::app()->user->hasFlash('posted')): ?>

<div id="fancy_header" style="width:412px;">	
<div class="publish_section_header"><h2><?=$lblStr.Yii::t('publish_page_v2', 'Success: Your Ad posted Successfully!')?></h2>
	
<table>
<thead>

<div class="alert">
	<h3><?php echo Yii::app()->user->getFlash('posted'); ?></h3>
	
</div>
</thead>
<tbody>
    <tr><td>
            <h3>Add an Image to your Ad</h3>
<?=Yii::t('publish_page_v2', 'Select an image in connection with your ad. The allowed formats are only gif, jpg or png and maximum size is 200kb.', array('{num_pics}' => NUM_PICS_UPLOAD, '{bytes}' => floor(MAX_PIC_UPLOAD_SIZE/1024)))?>			
        </td>
        <td>
<div class="classified_list_pic" style="width: 240px;margin: 5px 0px 0px 10px;padding: 5px;background-color: #fff;border-radius:5px;">
<?php   $form=$this->beginWidget('CActiveForm', array(
    'id'=>'locSearchForm',
    //'method' => 'get',
     'action'=>Yii::app()->createUrl('/dashboard/classifieds/uploadImages',array('ad_id'=>$model->ad_id)),
     'htmlOptions'=>array('enctype'=>'multipart/form-data')
    
)); 
     
         
   ?>
    <?php 
		$this->widget('CMultiFileUpload', array(
                'model'		=> $model,
                'attribute'	=> 'images',
                'accept' 	=> 'gif|jpg|png', 
                'max'		=> NUM_PICS_UPLOAD,
                'duplicate' => 'Duplicate file!', 
                'denied' 	=> 'Invalid file type',
                'htmlOptions' => array('tabindex' => 17)
            ));
			?>
			<?php $this->widget('bootstrap.widgets.TbButton', array(
                              'buttonType' => 'submit',
			      'type' =>'custom',
                              
                                            // 'icon' => 'ok', 
                              'label' => 'Submit',
			      'htmlOptions'=>array("id"=>"search","class" => "btn btn-primary"),
			      ));?>
			<?php $this->endWidget();?>
   </div>

<?php //print_r($model->attributes)  ;?>
        </td>
    </tr>
</tbody>
</table>
</div>
<?php endif; ?>
 