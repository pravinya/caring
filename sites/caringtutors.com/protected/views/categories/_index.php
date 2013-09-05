
                                
          <?php  echo CHtml::link($data->name, Yii::app()->createUrl('/ad/index', array('cattxt' => DCUtil::getSeoTitle($data->name), 'cid' => $data->id)));?>
      
            <?php //echo $data->name;?>                   