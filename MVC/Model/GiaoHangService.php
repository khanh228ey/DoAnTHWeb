<?php 
require_once("GiaoHangClass.php");
require_once("connectdb.php");
class GiaoHangService{
    private $dbcollectGH;
    public function __construct(){
        $this->dbcollectGH = Getmongodb("QuanLyBanDienTu","giaohang");
    }
    public function getAllGH(){
        $result = $this->dbcollectGH->find([]);
        return $result;
    }
    public function getOneGH(){
        $result = $this->dbcollectGH->findOne([]);
        return $result;
    }
    public function getDHAndDelete($id){
        $result = $this->dbcollectGH->deleteOne(["magiao"=>(int)$id]);
        return $result;
    }
    public function getIdGH(){
        $result = $this->dbcollectGH->find([]);
        foreach ($result as $document) {
        $id = $document['magiao'];
        }
        return (int)$id + 1;
    }
    public function findName($name)
    {
        $result_name = $this->dbcollectGH->find(["madh" => ['$regex' => $name, '$options' => 'i']]);
        return $result_name;
    }
    public function getGH($idGHObject)
    {

        $result = $this->dbcollectGH->findOne(["magiao" => (int) $idGHObject]);

        return $result;
    }
    public function findOneId($id)
    {
        $result = $this->dbcollectGH->findOne(["magiao" => (int)$id]);
        return $result;
    }
    public function addgh(GiaoHang $gh){
        try{
            $gh = [
                'magiao'=>(int)$gh->getMagiao(),
                'madh'=>$gh->getMadh(),
                'manv'=>$gh->getManv(),
                'ngaygiao'=>$gh->getNgaygiao(),
                'tinhtrang'=>$gh->getTinhtrang(),
            ];
        $this->dbcollectGH->insertOne($gh);
        return true;
        }catch(Exception $e){
            return false;
        }
    }
    public function updateNvgh(GiaoHang $gh){
        try{
            $result = $this->dbcollectGH->updateOne(
                ['magiao' => (int)$gh->getMagiao()],
                ['$set'=>[
                    'madh'=>$gh->getMadh(),
                    'manv'=>$gh->getManv(),
                    'ngaygiao'=>$gh->getNgaygiao(),
                    'tinhtrang'=>$gh->getTinhtrang(),
                ]]
            );
            return true;
        }
        catch(Exception $e){
            return false;
        }
    }
    public function searchBillwithIDorEmail($email)
    {
        // if (!isset($email)) {
        //     $email = "";
        // }
        // if (!isset($idbill)) {
        //     $idbill = "";
        // }
        $temp = $this->dbcollectGH->find(
            [
                '$or' => [
                    ["email" => ['$regex' => $email, '$options' => 'i']],
                    ["madh" => (int)$email]
                ]
            ],
            ['sort' => ['madh' => -1]]
        );
        return $temp;
    }
}
?>