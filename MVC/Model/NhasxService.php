<?php 
require_once("NhasxClass.php");
require_once("connectdb.php");
class NhasxService{
    private $dbcollectNhasx;
    public function __construct(){
        $this->dbcollectNhasx = Getmongodb("QuanLyBanDienTu","nhasanxuat");
    }
    public function getAllNhasx(){
        $result = $this->dbcollectNhasx->find([]);
        return $result;
    }
    public function getOneNhasx(){
        $result = $this->dbcollectNhasx->findOne([]);
        return $result;
    }
    public function getNhasxAndDelete($id){
        $result = $this->dbcollectNhasx->deleteOne(["manhasx"=>(int)$id]);
        return $result;
    }
    public function getIdNhasx(){
        $result = $this->dbcollectNhasx->find([]);
        foreach ($result as $document) {
        $id = $document['manhasx'];
        }
        return (int)$id + 1;
    }
    public function findName($name)
    {
        $result_name = $this->dbcollectNhasx->find(["tennhasx" => ['$regex' => $name, '$options' => 'i']]);
        return $result_name;
    }
    public function findOneId($id)
    {
        $result = $this->dbcollectNhasx->findOne(["manhasx" => (int)$id]);
        return $result;
    }
    public function addNhasx(Nhasx $nhasx){
        try{
            $nhasx = [
                'manhasx'=>(int)$nhasx->getManhasx(),
                'tennhasx'=>$nhasx->getTennhasx(),
                'sdt'=>$nhasx->getSdt(),
            ];
        $this->dbcollectNhasx->insertOne($nhasx);
        return true;
        }catch(Exception $e){
            return false;
        }
    }
    public function updateNhasx(Nhasx $nhasx){
        try{
            $result = $this->dbcollectNhasx->updateOne(
                ['manhasx' => (int)$nhasx->getManhasx()],
                ['$set'=>[
                'tennhasx'=>$nhasx->getTennhasx(),
                'sdt'=>$nhasx->getSdt(),
                ]]
            );
            return true;
        }
        catch(Exception $e){
            return false;
        }
    }
    public function deleteNhasx(Nhasx $nhasx){
        try{
            $result = $this->dbcollectNhasx->deleteOne(
                ['manhasx'=>(int)$nhasx->getManhasx()]
            );
            return true;
        }
        catch(Exception $e){
            return false;
        }
    }
}
?>
