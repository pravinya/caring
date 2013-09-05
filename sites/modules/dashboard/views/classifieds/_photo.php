

<?php
if(isset($event)){

echo '<p class="fl">';
$this->widget('bootstrap.widgets.TbBadge', array(
    'type'=>'success', 
    'label'=>'Step '.$event->sender->currentStep,
));

echo ' of '.$event->sender->stepCount;
echo '</p/>';

echo $event->sender->menu->run();

}

?>
<div class="publish_section_header" ><h1><?=Yii::t('publish_page_v2', 'Add Image to your Ad')?></h1></div>
<div class="publish_right_row">
<?=Yii::t('publish_page_v2', 'Select an image in connection with your ad. The allowed formats are only gif, jpg or png and maximum size is 200kb.', array('{num_pics}' => NUM_PICS_UPLOAD, '{bytes}' => floor(MAX_PIC_UPLOAD_SIZE/1024)))?>			
</div>	
<div class="classified_list_pic" style="width: 120px;margin: 5px 0px 0px 10px;padding: 5px;background-color: #fff;border-radius:5px;">
    <a href="#">
        <?php 
           $this->widget('ext.imageSelect.ImageSelect',  array(
                                 'path'=>Yii::app()->baseUrl.'/sites/caringtutors.com/uf/classifieds/small-'.$model->pics[0]->ad_pic_path,
                                 'alt'=>'alt text',
                                 'uploadUrl'=>$this->createUrl('classifieds/ad/uploadImages',array('ad_id'=>$model->ad_id) ),
                                 'htmlOptions'=>array('id'=>'ad-image-form')
   ));
   
   ?>
    
    </a></div>

 