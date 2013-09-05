 
		        <div class="classified_list_pic">
			  <?php echo CHtml::link(CHtml::image( '/image/default/create/id/'.$data->imageId.'&version=small',$data->cname.'-'.$data->location,array('style'=> "")),$data->link);?>
			</div>
		        <div class="classified_list_description">
		            <?php echo CHtml::link($data->cname,$data->link);?>
		            <p><?php echo  $data->addr1.', '.$data->addr2.'</br/>';?><?php echo $data->location.', '.$data->pcode;?>
			    <?//=DCUtil::getShortDescription( stripslashes($k->ad_description) )?></p>
		            <p class="info"><?=Yii::t('common', 'Location')?> : <b><?php echo $data->location;?></b> | 
			    <?=Yii::t('common', 'Published:')?><b><?php echo date('F j, Y',$data->modified)?></b></p>
		        </div>
		       
  