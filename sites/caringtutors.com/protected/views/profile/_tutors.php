<div class="span10" style="padding:4px;">
<div class="span2 DirImage">
    <?php 
//$pic = (!empty($data->owner->relImageLocation->image_path))? $data->owner->relImageLocation->image_path:'no_image.jpg';
//echo CHtml::image( $data->owner->relImageLocation->image_path,$data->title.'-'.$data->location);

$imageId = ($data->imageId == 0)?  89 : $data->imageId ;
  echo CHtml::link(CHtml::image( '/image/default/create/id/'.$imageId.'&version=small',$data->title.'-'.$data->location,array('style'=> "")),$data->link);
?>
</div>

 <p><span><strong>
     <?php //echo CHtml::link($data->title,$data->getAbsoluteUrl(array('cv_id'=>$data->cv_id,'title'=>$data->title)));?>
       <?php echo CHtml::link($data->title,'/profile/id/'.$data->cv_id);?>
    </strong>
	  <span class="label label-success" style="float:right;" >
	  <?php echo $data->location;?>
	  </span>
	 </span></p>   




<?php

echo $this->renderPartial('xindex',array('data'=>$data),true);
?>

</div>