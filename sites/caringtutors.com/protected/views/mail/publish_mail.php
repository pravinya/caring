
<?=Yii::t('publish_page', 'Your Classified ad is published in')?> <?php echo $data['{website}'];?> . <br />
<?=Yii::t('publish_page', 'You can view your classified ad here')?> : <br /><?php echo $data['{adUrl}']; ?><br /><br />

<h1><?=Yii::t('publish_page', 'Important!')?></h1>
<?=Yii::t('publish_page', 'You can delete your classified ad by clicking on the following link')?> :
<?php echo $data['{deleteUrl}']; ?><br />
<?=Yii::t('publish_page', 'and enter this code')?> : <b><?php echo $data['{code}'];?></b>