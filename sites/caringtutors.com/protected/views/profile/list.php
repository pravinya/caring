<?php
$this->pageTitle = "tutors in Hyderabad and Secunderabad";
    $this->metaKeywords = 'Mathematics tutor, online trainer, SAP trainer, science tutor';
    $this->metaDescription = 'hyderabad secunderabad tutor profile & tutoring skill listing';
   // $this->addMetaProperty('fb:app_id',Yii::app()->params['fbAppId']);
   // $this->canonical = $model->getAbsoluteUrl(); // canonical URLs should always be absolute
?>


<?php
$title="";

if(!empty($_GET["cattxt"])){
          $cat =  Subsubject::model()->findByPk($_GET['cat_id']);
        //!  $subsubjects = Subsubject::model()->findAllByAttributes(array('id'=>'1'));
         // $subsubjects =  Subsubject::model()->findAllByAttributes(array('id'=>$_GET['cat_id']));
         //!    foreach($subsubjects as $scat) $scat->name;
          //    echo CHtml::listData($subsubjects, CHtml::encode('id'), 'name');
         // foreach($scat as $i => $sc) echo $sc[$i]->name;
         
                   $title=$title.$cat->name." tutors";
        }          
        else $title = "Tutors ";
      if(!empty($_GET["location"]))
              
                     $title=$title." in ".CHtml::encode($_GET["location"]);
              else $title = $title." in Hyderabad / Secunderabad";
                  

$this->pageTitle=$title;
//print_r($dataProvider);
?>
<!--<h4><?php echo $this->pageTitle;?></h4> -->
<?php
$lnt = strlen($_GET_['cat_id']);
if ($lnt == 1) $atch = 'SC0'.$_GET['cat_id'];
else $atch = $atch.$_GET['cat_id'];
/*

$url = "http://tutorials.caringtutors.com/prawiki/index.php?n=SubjectCategories.SC0".$atch;
$hqp = htmlqp($url);//,'div.InnerContent');
     $child = $hqp->find('#wikitext > p'); 
echo $child->html();*/
          //  $dom_document = new DOMDocument();

         //   $dom_document->loadHTML($child->html());
         //   $dom_xpath = new DOMXpath($dom_document);

            
        //    $elements = $dom_xpath->query("//div[@id='wikitext']");

         //   if (!is_null($elements)) { echo 'ddkdkkkd';
//}

?>


<span style="float:right;">
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
</span>

<?php Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
        $('.search-form').toggle();
        return false;
});
$('.search-form form').submit(function(){
        $.fn.yiiGridView.update('main-category-grid', {
                data: $(this).serialize()
        });
        return false;
});
");

?>


<?php $this->widget('zii.widgets.CListView', array(
	'id'=>'main-category-grid',
	'dataProvider'=>$dataProvider,
	'itemView' => '_tutors',
              'ajaxUpdate' => true,
       'template'=>"{pager}{summary}{items}{pager}{summary}",
       'tagName' => 'p',
       'itemsCssClass'=> 'DirList',
      // 'pagerCssClass' => 'pagination pagination-large pagination-centered',
       'ajaxUpdate'=>true,
       //'htmlOptions'=>array('class'=>'striped bordered condensed'),
        'pager'=>array(
'class'=>'SimplePager',

 // 'prevPageLabel'=>'&lt;',
 // 'nextPageLabel'=>'&gt;',      
)

)); ?>

