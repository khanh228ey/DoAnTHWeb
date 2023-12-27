<?php
require_once('UserClass.php');
require_once('connectdb.php');
class UserService{
    private $db;
    //Goi database
    public function __construct(){
        $this->db = Getmongodb("QuanLyBanDienTu","user");
    }
    public function getAllUser(){
        $result = $this->db->find([]);
        return $result;
    }
    public function getIdadd()
    {

        $result = $this->db->find([]);
        foreach ($result as $document) {
        $id = $document['id'];
        }
        return (int)$id + 1;
    }
    //Find user
    public function findUserWithEmailAndPassword($email, $password){
        $user = $this->db->findOne([
            "email" => $email,
            "password" => md5($password)
        ]);
        if (!is_null($user)) {

            return $user;
        } else {

            return false;
        }
    }
    //Find user with email
    public function findEmail($email)
    {
        $findEmail = $this->db->findOne([
            "email" => $email
        ]);
        
        if ($findEmail['email'] != null) {
            return $findEmail;
        } else {
            return  false;
        }
    }
    //Them user 
    public function addUser(User $u)
    {
        $userCount = $this->db->countDocuments([
            "email" => $u->GetEmail()
        ]);

        if ($userCount > 0) {
            return false;
        } else {
            $newUser = [
                "id" => (int)$u->getCustomerID(),
                "email" => $u->GetEmail(),
                "password" => md5($u->GetPassword()),
                "chucvu" => "Customer",
                "phonenumber" => $u->getPhonenumber(),
                "diachi" => $u->GetAddress(),
                "firstname" => $u->GetFirstName(),
                "lastname" => $u->GetLastName()
            ];
            $insertResult = $this->db->insertOne($newUser);

            // check if the insertion was successful
            if ($insertResult->getInsertedCount() == 1) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function updateUserByEmail(User $u)
    {
        $filter = ["Email" => $u->GetEmail()];
        $update = [
            '$set' => [
                "id" => (int)$u->getCustomerID(),
                "email" => $u->GetEmail(),
                "password" => md5($u->GetPassword()),
                "chucvu" => "Customer",
                "phonenumber" => $u->GetPhonenumber(),
                "diachi" => $u->GetAddress(),
                "FirstName" => $u->GetFirstName(),
                "LastName" => $u->GetLastName()
            ]
        ];
        $updateResult = $this->db->updateOne($filter, $update);

        if ($updateResult->getModifiedCount() == 1) {
            return true;
        } else {
            return false;
        }
    }
}
?>