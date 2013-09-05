
<div class="DirDescription" style="font-size:0.95em;font-style:bold;padding:2px;">

<?php $p = new CHtmlPurifier();
$p->options = array('URI.AllowedSchemes'=>array(
  'http' => true,
  'https' => true,
));

//$text = $p->purify(substr($data->about,0,140));?>
<?php //echo $text;?>

</div>
<!--<div class="moreLink"><a href="">More...</a></div>-->
<div><!--php echo $model->getCatUrl($model->category);--></div>

<div><?php 
//echo '<strong>Skills:&nbsp;</strong>';//echo Skills::getSkillNames($data->cv_id);
 $tags = Skills::getSkillNames($data->cv_id);
 $result = array_slice($tags,0,2);
foreach($result as $tag){ if ($tag !=="")

$this->widget('bootstrap.widgets.TbLabel', array(
    'type'=>'info', // '', 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>substr($tag,0,20)
));
echo '&nbsp;';
}
?>
</div>
<!--php
$this->widget('application.extensions.addThis', array(
    'id'=>'addThis',
    'username'=>'purnachandra',
    'htmlOptions'=>array(
        'class'=>'addthis_default_style',
             ),
    
    'showServices'=>array(
        'tweet',
        'google_plusone'=>array(
            'g:plusone:size'=>'medium',
            'g:plusone:annotation'=>'bubble',
        ),
        'facebook_like',
    ),
    
    'config'=>array(),
    'share'=>array(),
));
--> 
