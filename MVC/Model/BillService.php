<?php
require_once('BillClass.php');
require_once('BillDetailClass.php');
require_once('connectdb.php');
Class   BillService{
    private  $dbcollectionproduct;
    private  $dbcollectionbill;
    private  $dbcollectionbilldetail;
    public function __construct()
    {
        $this->dbcollectionbill  = Getmongodb("QuanLyBanDienTu", "donhang");
        $this->dbcollectionbilldetail  = Getmongodb("QuanLyBanDienTu", "chitietdonhang");
        $this->dbcollectionproduct  = Getmongodb("QuanLyBanDienTu", "sanpham");
    }
    public function getAllBill(){
        $result = $this->dbcollectionbill->find([]);
        return $result;
    }
    public function getIdaddBill()
    {

        $result = $this->dbcollectionbill->find([]);
        foreach ($result as $document) {
            $id = $document['madh'];
        }
        return (int)$id + 1;
    }
    public function getBillDetail($idbillObject)
    {

        $result = $this->dbcollectionbilldetail->find(["Iddetail" => (int)$idbillObject]);

        return $result;
    }
    public function getBill($idbillObject)
    {

        $result = $this->dbcollectionbill->findOne(["madh" => (int) $idbillObject]);

        return $result;
    }
    public function getBillEmaill($email)
    {

        $result = $this->dbcollectionbill->find(
            ["email" => $email],
            ['sort' => ['madh' => -1], 'limit' => 5]
        );

        return $result;
    }
    //Add bill
    public function addBill(Bill $b)
    {
        try {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('d/m/Y H:i:s');
            $bill = [
                'madh' => (int)$b->getBillID(),
                'note' => $b->GetNote(),
                'daybuy' => (string)$date,
                'email' => $b->GetEmailcustomer(),
                'phonenumber' =>  $b->getphonenumber(),
                'tongtien' => (float)$b->GetTotal(),
                'trangthai' => 'Chờ xử lý'
            ];

            $this->dbcollectionbill->insertOne($bill);
            return $bill;
        } catch (Exception $e) {
            // handle the exception
            return false;
        }
    }
    public function addBillDetail(BillDetailClass $bd)
    {
        try {
            $billd = [
                'Iddetail' =>  (int)$bd->getBillDetailID(),
                'masanp' =>  (int)$bd->getProductID(),
                'ten' => $bd->getProductName(),
                'gia' => (float)$bd->GetPrice(),
                'Quantity' =>  (int) $bd->GetQuantity()
            ];
            $this->dbcollectionbilldetail->insertOne($billd);
        } catch (Exception $e) {
            // handle the exception
            return false;
        }
    }
    //Update bill
    public function updateBill(Bill $b)
    {
        $this->dbcollectionbill->updateOne(
            ['madh' => (int)$b->getBillID()],
            ['$set' => [
                'note' => $b->GetNote(),
                'DayBuy' => (string)$b->getDaybuy(),
                'email' => $b->GetEmailcustomer(),
                'phonenumber' =>  $b->getphonenumber(),
                'tongtien' => (float)$b->GetTotal(),
                'trangthai' => $b->GetStatus()
            ]]
        );
    }
    //Admin
    public function countBilltoday()
    {
        $current_date = date("d/m/Y");
        $temp = $this->dbcollectionbill->find(["DayBuy" => ['$regex' => $current_date, '$options' => 'i']]);

        $count = 0;

        foreach ($temp as $document) {
            $count++;
        }
        return $count;
    }
    public function countStock()
    {
        $result = $this->dbcollectionproduct->find(["soluong" => ['$lt' => 10]]);
        $count = 0;

        foreach ($result as $document) {
            $count++;
        }
        return $count;
    }
    public function countBillwait()
    {
        $temp = $this->dbcollectionbill->find(["trangthai" => ['$regex' => 'Chờ xử lý', '$options' => 'i']]);
        $count = 0;

        foreach ($temp as $document) {
            $count++;
        }
        return $count;
    }
    public function bestsellertop5()
    {
        $result = $this->dbcollectionbilldetail->aggregate([
            [
                '$group' => [
                    '_id' => '$masanp',
                    'Quantity' => ['$sum' => '$Quantity']
                ]
            ], ['$sort' => ['_id' => -1]],
            ['$limit' => 5]
        ]);

        return $result;
    }
    public function sumBilltoday()
    {
        $current_date = date("d/m/Y");
        $temp = $this->dbcollectionbill->find(["DayBuy" => ['$regex' => $current_date, '$options' => 'i']]);

        $count = 0;

        foreach ($temp as $document) {
            $count+=(float)$document['tongtien'];
        }
        return $count;
    }
    public function searchBillwithIDorEmailWait($email)
    {
        $temp = $this->dbcollectionbill->find(
            [
                'trangthai' => 'Chờ xử lý', //filter for status field
                '$or' => [
                    ["email" => ['$regex' => $email, '$options' => 'i']],
                    ["madh" => (int)$email]
                ]
            ],
            ['sort' => ['madh' => -1]]
        );
        return $temp;
    }
    public function searchBillwithIDorEmail($email)
    {
        // if (!isset($email)) {
        //     $email = "";
        // }
        // if (!isset($idbill)) {
        //     $idbill = "";
        // }
        $temp = $this->dbcollectionbill->find(
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
    public function getBilllimit5()
    {
        $result = $this->dbcollectionbill->find(
            ["trangthai" => "Chờ xử lý"],//Chờ Xử lý
            ['sort' => ['madh' => -1], 'limit' => 5]
        );

        return $result;
    }
}
?>
