<?

class CategoryHomeBlocksWidget extends CWidget 
{
    public function run()
    {
		$categoryModel = Category::model();
		$categoryData = $categoryModel->getCategoryList();
		$categoryModel->getCategoryHomeBlocks( $container , $categoryData );
		echo $container;
		
    }
}