<h1>View subject #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
'name'	),
)); ?>

<?php
$url = "http://tutorials.caringtutors.com/prawiki/index.php?n=SubjectCategories.SC01";
$hqp = htmlqp($url);//,'div.InnerContent');
     $child = $hqp->find('#wikitext'); 
echo $child->html();
          //  $dom_document = new DOMDocument();

         //   $dom_document->loadHTML($child->html());
         //   $dom_xpath = new DOMXpath($dom_document);

            
        //    $elements = $dom_xpath->query("//div[@id='wikitext']");

         //   if (!is_null($elements)) { echo 'ddkdkkkd';
//}

?>
<?php $this->beginWidget('bootstrap.widgets.BootModal', array('id'=>'myModal')); ?>
 
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Please Login</h3>
</div>
 
<div class="modal-body">
    <?php 

  $url = "http://tutorials.caringtutors.com/prawiki/index.php?n=Login.Login";  //?action=edit";
  $hqp = htmlqp($url);//,'div.InnerContent');
  $child = $hqp->find('#wikitext'); 
  $desc = $child->html();
  echo $desc;
   ?>
</div>
 
<div class="modal-footer">
    <!--php $this->widget('bootstrap.widgets.BootButton', array(
        'type'=>'primary',
        'label'=>'Save changes',
        'url'=>array(''),
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); -->
    <?php $this->widget('bootstrap.widgets.BootButton', array(
        'label'=>'Cancel',
        'url'=>array(''),
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
</div>
 
<?php $this->endWidget(); ?>

<?php $this->widget('bootstrap.widgets.BootButton', array(
    'label'=>'Click me',
    'url'=>'#myModal',
    'type'=>'primary',
    'htmlOptions'=>array('data-toggle'=>'modal'),
)); ?>