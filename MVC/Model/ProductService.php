<?php
require_once('ProductClass.php');
require_once('ProductImage.php');
require_once('connectdb.php');

class ProductService{
    private $dbcollectProduct;
    private $dbcollectImage;

    public function __construct(){
        $this->dbcollectProduct = Getmongodb("QuanLyBanDienTu","sanpham");
        $this->dbcollectImage = Getmongodb("QuanLyBanDienTu","hinh");
    }
    public function getAllProduct()
    {
    $result = $this->dbcollectProduct->find([]);
    return $result;
    }
      // IMAGE  GET
    public function getImagewithID($id)
    {
    $result = $this->dbcollectImage->find(['masp' => (int)$id]);
    //echo $result['Image'];
    return $result;
    }
    public function getProductAndDelete($id){
        $result = $this->dbcollectProduct->deleteOne(['masp'=>(int)$id]);
        return $result;
    }
    public function deleteImg($id){
        $result = $this->dbcollectImage->deleteMany(['masp'=>(int)$id]);
        return $result;
    }
    public function findOneImageIdProduct($id)
    {
    $result_image = $this->dbcollectImage->findOne(
        ["masp" => (int)$id],
        ['sort' => ['_id' => -1]]
    );
    if (!empty($result_image))
        return $result_image['Image'];
    else return "https://artsmidnorthcoast.com/wp-content/uploads/2014/05/no-image-available-icon-6.png";
    }
    public function findOneImageIdProductIdSort($id)
    {
    $result_images = $this->dbcollectImage->find(["masp" => (int)$id]);
      // return the images array
    return $result_images;
    }
    public function findOneImageId($id)
    {
    $result_image = $this->dbcollectImage->findOne(["masp" => (int)$id]);
    if (!empty($result_image))
    return $result_image['Image'];
    else return "https://artsmidnorthcoast.com/wp-content/uploads/2014/05/no-image-available-icon-6.png";
    }
     // add one image
    public function UpdateOneImage(ProductImage $im)
    {
    try {

        // xu ly hinh anh nhieu tam
        $this->dbcollectImage->updateOne(
        ['masp' => $im->getProductID()],
        ['$set' => [
            'mahinh' => $im->getIDSort(),
            'Img' => $im->GetImg()
        ]]
        );

        // insert the document in the collection
        return true;
        } catch (Exception $e) {
            // handle the exception
            return false;
        }
    }   
    public function UpdateListImage($idProduct, $listimg)
    {
        try {
        $deleteall = $this->dbcollectImage->deleteMany(["masp" => (int)$idProduct]);
        // xu ly hinh anh nhieu tam
        $imgall = explode("@", $listimg); // ~ split
        $i = 1;
        foreach ($imgall as $img) {
            if (!empty($img)) {
            $addimg = [
                'masp' => (int)$idProduct,
                'mahinh' => (int)$i,
                'Img' => $img
            ];
            $this->dbcollectImage->insertOne($addimg);
            (int)$i++;
            }
        }
        return true;
        } catch (Exception $e) {
        // handle the exception
        return false;
        }
    }
    public function getIdadd()
    {

        $result = $this->dbcollectProduct->find([]);
        foreach ($result as $document) {
        $id = $document['masp'];
        }
        return (int)$id + 1;
    }
    public function findNameSearch($name, $start, $limit)
    {
        $filter = ["tensp" => ['$regex' => $name, '$options' => 'i']];

        // set options for sorting and limiting
        $options = [
        'skip' => $start,
        'limit' => $limit
        ];
        $result_name = $this->dbcollectProduct->find($filter, $options);
        return $result_name;
    }
   
    

    public function findName($name)
    {
        $result_name = $this->dbcollectProduct->find(["tensp" => ['$regex' => $name, '$options' => 'i']]);
        return $result_name;
    }
    public function findMinPrice(){
        $result_MinPrice = $this->dbcollectProduct->find([],['sort'=>['gia'=>1],'limit'=>1]);
        return $result_MinPrice;
    }
    public function findOneId($id)
    {
        $result = $this->dbcollectProduct->findOne(["masp" => (int)$id]);
        return $result;
    }
    public function updateProduct(Product $p)
    {
    try {
    $result = $this->dbcollectProduct->updateOne(
        ['masp' => (int)$p->getProductID()],
        ['$set' => [
        'tensp' => $p->getProductName(),
        'maloaisp' => $p->GetSeries(),
        'manhasx' => $p->GetBrand(),
        'note' =>  $p->GetNote(),
        'ttsp' => $p->GetProductStatus(),
        'gia' => (float)$p->GetPrice(),
        'soluong' => (int)$p->GetStock(),
        ]]
    );
    return true;
    } catch (Exception $e) {
    // handle the exception
    return false;
    }
    }
    public function addProduct(Product $p, $list_image)
    {
        try {
        $product = [
            'masp' => (int)$p->getProductID(),
            'tensp' => $p->getProductName(),
            'maloaisp' => $p->GetSeries(),
            'manhasx' => $p->GetBrand(),
            'note' =>  $p->GetNote(),
            'ttsp' => $p->GetProductStatus(),
            'gia' => (float)$p->GetPrice(),
            'soluong' => (int)$p->GetStock(),
        ];
        // xu ly hinh anh nhieu tam
        $imgall = explode("@", $list_image); // ~ split
        $i = 1;
        foreach ($imgall as $img) {
            if (!empty($img)) {
            $addimg = [
                'masp' => (int)$p->getProductID(),
                'mahinh' => (int)$i,
                'Image' => $img
            ];
            $this->dbcollectImage->insertOne($addimg);
            (int)$i++;
                }
            }
        // insert the document in the collection
        $this->dbcollectProduct->insertOne($product);
        return true;
        } catch (Exception $e) {
        // handle the exception
        return false;
    }
        // printf(" Success Inserted %d document(s)\n", $insertOneResult->getInsertedCount());
    }
    // GET LIST WITH SERIES 
    public function findSeries($name, $start, $limit)
    {
        $filter = ['maloaisp' => ['$regex' => $name, '$options' => 'i']];

        // set options for sorting and limiting
        $options = [
        'skip' => $start,
        'limit' => $limit
        ];
        $result_name = $this->dbcollectProduct->find($filter, $options);
        return $result_name;
    }
    public function countSeri($name)
    {

        $result_name = $this->dbcollectProduct->find(['maloaisp' => ['$regex' => $name, '$options' => 'i']]);
        return $result_name;
    }
    //GET LIST PRODUCT WITH Series
    public function GetSeries($Seri)
    {
        $result_SeriresList = $this->dbcollectProduct->find(['maloaisp' => $Seri]);
        return $result_SeriresList;
    }

}
?>
