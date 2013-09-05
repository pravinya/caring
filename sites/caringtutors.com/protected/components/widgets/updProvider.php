<?php
class updProvider extends CWidget{
    protected $controller; 
    public $modelName ;
    public $model;
    public $category;
    public $attrs;
    public static function actions(){
        return array(
                 //  'GetData'=>'application.components.actions.getUpdate',
        );
    }
    public function getModule(){
        
                
    }
    
     public function init()
    {
         
         
         
     }
    public function run(){
        
     $class = $this->modelName;
     $model = $class::model()->findByAttributes(array( 'ug_id'=>(int)$_GET['id'] ));

   $this->widget( 'zii.widgets.grid.CGridView', array(
    'dataProvider' =>$model->search(),
       'columns' => array(
      'title',
   // 'category',  
    array(
      'class' => 'CButtonColumn',
      'header' => 'Action',
       'updateButtonUrl' => 'Yii::app()->createUrl( 
        "/update/fetch.GetData", 
        array( "id" => Yii::app()->user->id ) )',
        
      'deleteButtonUrl' => 'Yii::app()->createUrl( 
        "/admin/location/delete", 
        array( "id" => $data->primaryKey ) )',
        'updateButtonUrl' => 'Yii::app()->createUrl( 
        "/update/update", 
        array( "id" => Yii::app()->user->id ) )',
        
      'buttons' => array(
        'delete' => array(
          'click' => "function( e ){
            e.preventDefault();
            $( '#update-dialog' ).children( ':eq(0)' ).empty(); // Stop auto POST
            updateDialog( $( this ).attr( 'href' ) );
            $( '#update-dialog' )
              .dialog( { title: 'Delete confirmation' } )
              .dialog( 'open' ); }",
        ),
        'update' => array(
          'click' => "function( e ){
            e.preventDefault();
            $( '#update-dialog' ).children( ':eq(0)' ).empty(); // Stop auto POST
            updateDialog( $( this ).attr( 'href' ) );
            $( '#update-dialog' )
              .dialog( { title: 'Update' } )
              .dialog( 'open' ); }",
        ),
      ),
    ),
  ),
)); 


$this->beginWidget( 'zii.widgets.jui.CJuiDialog', array(
  'id' => 'update-dialog',
  'options' => array(
    'title' => 'Dialog',
    'autoOpen' => false,
    'modal' => true,
    'width' => 550,
    'resizable' => false,
  ),
));
echo '<div class="update-dialog-content"></div>';
 $this->endWidget(); 

     
         }
}

?>