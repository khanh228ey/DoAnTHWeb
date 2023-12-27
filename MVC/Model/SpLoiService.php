<?php 
require_once("SpLoiClass.php");
require_once("connectdb.php");
class SpLoiService {
    private $dbcollectSpLoi;
    public function __construct(){
        $this->dbcollectSpLoi = Getmongodb("QuanLyBanDienTu","trahang");
    }
    public function getAllSpLoi(){
        $result = $this->dbcollectSpLoi->find([]);
        return $result;
    }
    public function getOneSpLoi(){
        $result = $this->dbcollectSpLoi->findOne([]);
        return $result;
    }
    public function getSpLoiAndDelete($id){
        $result = $this->dbcollectSpLoi->deleteOne(["matrahang"=>(int)$id]);
        return $result;
    }
    public function getIdSpLoi(){
        $result = $this->dbcollectSpLoi->find([]);
        foreach ($result as $document) {
        $id = $document['matrahang'];
        }
        return (int)$id + 1;
    }
    public function findName($name)
    {
        $result_name = $this->dbcollectSpLoi->find(["tensp" => ['$regex' => $name, '$options' => 'i']]);
        return $result_name;
    }
    public function findOneId($id)
    {
        $result = $this->dbcollectSpLoi->findOne(["matrahang" => (int)$id]);
        return $result;
    }
    public function addSpLoi(SpLoi $spLoi){
        try{
            $spLoi = [
                'matrahang'=>(int)$spLoi->getMaTH(),
                'masp'=>(int)$spLoi->getmasp(),
                'tensp'=>$spLoi->gettensp(),
                'madh'=>(int)$spLoi->getMadh(),
                'sldt'=>(int)$spLoi->getSdt(),
                'noidung'=>$spLoi->getNoidung(),
                'tinhtrang'=>$spLoi->getTinhtrang(),
            ];
        $this->dbcollectSpLoi->insertOne($spLoi);
        return true;
        }catch(Exception $e){
            return false;
        }
    }
}
?> 