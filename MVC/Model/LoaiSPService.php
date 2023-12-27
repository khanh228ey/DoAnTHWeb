<?php
require_once("LoaiSPClass.php");
require_once("connectdb.php");
class LoaiSPService{
    private $dbcollectLSP;
    public function __construct() {
        $this->dbcollectLSP =  Getmongodb("QuanLyBanDienTu","loaisanpham");
    }
    public function getAllLoaiSP(){
        $result = $this->dbcollectLSP->find([]);
        return $result;
    }
    public function getIdLoaiSP(){
        $result = $this->dbcollectLSP->find([]);
        foreach($result as $document){
            $id = $document['maloaisp'];
        }
        return (int)$id +1;
    }
    public function findName($name){
        $result_name = $this->dbcollectLSP->find(["tenloai" => ['$regex' => $name, '$options' => 'i']]);
        return $result_name;
    }
    public function findOneId($id)
    {
        $result = $this->dbcollectLSP->findOne(["maloaisp" => (int)$id]);
        return $result;
    }
    public function getLSPAndDelete($id){
        $result = $this->dbcollectLSP->deleteOne(["maloaisp" => (int)$id]);
        return $result;
    }
    public function addLSP(LoaiSP $sp){
        try{
            $sp =[
                'maloaisp' => (int)$sp->getMaloaisp(),
                'tenloai'=>$sp->getTenloai(),
            ];
        $this -> dbcollectLSP->insertOne($sp);
        return true;
        }
        catch (Exception $e){
            return false;
        }
    }
    public function updateLSP(LoaiSP $sp){
        try{
            $result = $this->dbcollectLSP->updateOne(
                ['maloaisp' => (int)$sp->getMaloaisp()],
                ['$set'=>[
                'tenloai'=>$sp->getTenloai(),
                ]]
            );
            return true;
        }
        catch(Exception $e){
            return false;
        }
    }
}
?>