<?php 
require_once("NvgiaohangClass.php");
require_once("connectdb.php");
class NvgiaohangService{
    private $dbcollectNvgh;
    public function __construct(){
        $this->dbcollectNvgh = Getmongodb("QuanLyBanDienTu","nhanviengiaohang");
    }
    public function getAllNvgh(){
        $result = $this->dbcollectNvgh->find([]);
        return $result;
    }
    public function getOneNvgh(){
        $result = $this->dbcollectNvgh->findOne([]);
        return $result;
    }
    public function getNVAndDelete($id){
        $result = $this->dbcollectNvgh->deleteOne(["manv"=>(int)$id]);
        return $result;
    }
    public function getIdNvgh(){
        $result = $this->dbcollectNvgh->find([]);
        foreach ($result as $document) {
        $id = $document['manv'];
        }
        return (int)$id + 1;
    }
    public function findName($name)
    {
        $result_name = $this->dbcollectNvgh->find(["tennv" => ['$regex' => $name, '$options' => 'i']]);
        return $result_name;
    }
    public function findOneId($id)
    {
        $result = $this->dbcollectNvgh->findOne(["manv" => (int)$id]);
        return $result;
    }
    public function addNvgh(Nvgiaohang $nvgh){
        try{
            $nvgh = [
                'manv'=>(int)$nvgh->getmanv(),
                'tennv'=>$nvgh->getTennv(),
                'sdt'=>$nvgh->getSdt(),
                'diachi'=>$nvgh->getdiachi(),
                'gioitinh'=>$nvgh->getgioitinh(),
            ];
        $this->dbcollectNvgh->insertOne($nvgh);
        return true;
        }catch(Exception $e){
            return false;
        }
    }
    public function updateNvgh(Nvgiaohang $nvgh){
        try{
            $result = $this->dbcollectNvgh->updateOne(
                ['manv' => (int)$nvgh->getmanv()],
                ['$set'=>[
                'tennv'=>$nvgh->getTennv(),
                'sdt'=>$nvgh->getSdt(),
                'diachi'=>$nvgh->getdiachi(),
                'gioitinh'=>$nvgh->getgioitinh(),
                ]]
            );
            return true;
        }
        catch(Exception $e){
            return false;
        }
    }
    public function deleteNhasx(Nvgiaohang $nvgh){
        try{
            $result = $this->dbcollectNvgh->deleteOne(
                ['manv'=>(int)$nvgh->getmanv()]
            );
            return true;
        }
        catch(Exception $e){
            return false;
        }
    }
}
?>