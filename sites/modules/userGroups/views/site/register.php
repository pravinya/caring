
  <!--php print_r($uinfo)  ;-->
  <?php //echo $uinfo->email;
  ?>
<?php //$imageUrl = Yii::app()->facebook->getProfilePictureById($unifo['id']);
      //echo CHtml::image($imageUrl);
?>
  
   <div class="row">
  <div class ="span12">
     
      <h5 class="tab">Trainer/Tutor?
      
      <?php $this->widget('zii.widgets.jui.CJuiButton', array(
                           'name'=>'post_resume',
                            'buttonType' => 'link',
                          'caption'=>'Post Resume',
                           'url'=>array('/profile/postcv'),
                          'htmlOptions'=>array(
                               'class'=>'pull-right',
                                'data-title'=>'Post your resume free on caringtutors.com', 
                                 'data-content'=>'',
                                 'rel'=>'popover','target'=>'_blank'
                             )
                   )); ?>     
      </h5>
      
     
          
          <p>Post your resume on caringtutors.com</p>
      <ul><li>Reach exactly the training seekers you are looking for.</li>

        <li>Show your resume at the top of search results</li>
        <li>Append your resume with specific keywords</li>
        <li>Quickly reach students</li>
      </ul>
          
      </div>
 
  <div class ="span12">
      <h5 class="tab">Training Business?
       <?php $this->widget('zii.widgets.jui.CJuiButton', array(
                           'name'=>'post_ad',
                            'buttonType' => 'link',
                          'caption'=>'Post Ad',
                           'url'=>array('/profiles/postad'),
                          'htmlOptions'=>array(
                                'class'=>'pull-right',
                                'data-title'=>'Post your free ad on caringtutors.com', 
                                 'data-content'=>'',
                                 'rel'=>'popover','target'=>'_blank'
                             )
                   )); ?>  
      
      </h5>
      
    
          
         <ul><li>Reach exactly the job seekers you are looking for.</li>
          <li>Post your job ad on caringtutors.com</li>
        <li>Show your job at the top of search results</li>
        <li>Append your job with specific keywords</li>
        <li>Quickly reach job seekers</li>
      </ul>
             
      </div>
  </div>    
  
  <div class="row">
  <div class ="span12">
      <h5 class="tab">Tutoring Agency?
      
      <?php $this->widget('zii.widgets.jui.CJuiButton', array(
                           'name'=>'post_job',
                            'buttonType' => 'link',
                          'caption'=>'Join Us',
                           'url'=>array('/site/contact'),
                          'htmlOptions'=>array(
                                'class'=>'pull-right',
                                'data-title'=>'Employer? Post free Job ad', 
                                 'data-content'=>'',
                                 'rel'=>'popover','target'=>'_blank'
                             )
                   )); ?>   
      
      </h5>
      
     
          
          <p>Post your agency ad on caringtutors.com</p>
          <ul><li>Publish your job requirements that attract job seekers</li>
        <li>Quickly search for tutor profiles by location and training category</li>
        <li>Meet your recruitment needs by browsing through up-to-date tutor profiles</li>
      </ul>
             
      </div>
  </div>    
 