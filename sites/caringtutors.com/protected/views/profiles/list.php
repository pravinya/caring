<?php
 
  $this->pageTitle = "training institutes in Hyderabad and Secunderabad";
  $this->metaKeywords = 'IT Training, Management training, languages training, competitive exams training';
  $this->metaDescription = 'IT, management & languate training institutes in Hyderabad and Secunderabad, skilled online home tutors, trainer jobs';
  
  $is_cadd = $this->getId() == "ad" ;
 
	    $title = $is_cadd ? $_GET["cattxt"] : $_GET["catitl"];
	    $tmp_str = $is_cadd ? "training Classified Ads" : "training";
	    $loc = "near ".(!empty($_GET["location"])? $_GET["location"]: "Hyderabad Secunderabad");
	     
	    $this->pageTitle = $title." ".$tmp_str." ".$loc;
?>



  
<div class="box_title" style="font-weight:normal;">
			<h4 style="margin-bottom:0px;"><?php //echo $this->pageTitle;?></h4>
</div>
<div class="row">
<?php
/*
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
   // 'tagName' => 'div',
    //'type'=>'striped bordered condensed',
    'template' =>"{summary}{pager}{items}{summary}{pager}", 
    'hideHeader' => true,
    'itemsCssClass'=> '',
    'rowCssClassExpression' => 'classified_list_container',
         'pagerCssClass' => 'pagination',
         'ajaxUpdate'=>true, 
         'pager'=>array('class'=>'SimplePager' ,'maxButtonCount' => '5'),
    'columns'=>array(
        array('type'=>'raw',
            'value'=>'$this->grid->getOwner()->renderPartial(\'/profiles/_directory\',array(\'data\'=>$data),true)'),
 
    )
)); */ ?>



      <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'main-category-grid',
	'dataProvider'=>$dataProvider,
	
         'template' =>"{summary}{pager}{items}{summary}{pager}",  //'type'=>'striped bordered condensed',
         'tagName' => 'p',
         'itemsCssClass'=> 'DirList',
         'pagerCssClass' => 'pagination pagination-centered',
         'ajaxUpdate'=>false, 
         'columns'=>array(
        array('type'=>'raw',
            'value'=>'$this->grid->getOwner()->renderPartial(\'/profiles/_directory\',array(\'data\'=>$data),true)'),
 
         ),
       //   'htmlOptions'=>array('class'=>' striped bordered condensed'),
       'pager'=>array('class'=>'SimplePager' ,
		      'maxButtonCount' => '3', )
       )); ?>   
         
</div>
<?php Layout::addBlock('sidebar.left', array(
    'id'=>'left_sidebar',
    'content'=>'the content you want to add to your layout', // eg the result of a partial or widget
        /*
$this->renderPartial('/partial/aspect_index_right', array(
        'aspects'=>$user->aspects,
        'controller'=>$this,
    ), true)
*/
)); ?>