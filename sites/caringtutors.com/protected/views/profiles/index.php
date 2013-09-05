<span class="DirLoctn">
    <span class="label label-info" style="float:right;">
       <?php echo $data->location;?>
    </span>
</span>
	
<strong>
    <?php echo CHtml::link($data->cname,$data->getAbsoluteUrl(array('id'=>$data->id,'title'=>$data->cname)));?>
</strong>

<div class="DirDescription" style="font-size:0.95em;font-style:bold;padding:2px;">
<?php $p = new CHtmlPurifier();
    $p->options = array('URI.AllowedSchemes'=>array(
        'http' => true,
        'https' => true,
     ));

    $text = $p->purify(substr($data->about,0,140));?>
   <?php echo $text;?>
</div>

<div class="moreLink"><a href="">More...</a></div>
