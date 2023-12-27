<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/src/SMTP.php';

require_once('../Model/UserClass.php');
require_once('../Model/UserService.php');
require_once('../Model/BillService.php');
require_once('../Model/ProductService.php');
require_once('../Model/SploiClass.php');
require_once('../Model/SpLoiService.php');

class userController
{
    public $userService;
    public $billService;
    public $productService;
    public $SpLoiService;
    public function __construct()
    {
        $this->userService = new UserService();
        $this->billService = new BillService();
        $this->productService = new ProductService();
        $this->SpLoiService = new SpLoiService();
    }
    public function SetUser()
    {
        $newu = new User();
        $newu->setCustomerID(1);
        $newu->SetEmail($_POST['email']);
        $newu->SetPassword($_POST['password']);
        $newu->SetRoles('customer');
        $newu->setPhonenumber($_POST['phonenumber']);
        $newu->SetAddress($_POST['diachi']);
        $newu->SetFirstName($_POST['firstname']);
        $newu->SetLastName($_POST['lastname']);
        return $newu;
    }
    // LOGOUT GET
    public function LogOut()
    {
        unset($_SESSION['accountuser']);
        $url = "/MVC/controller/productController.php";
        header("Location: " . $url);
    }
    public function loginUserGET()
    {
        include '../Views/login_user.php';
    }
    public function loginUserPOST()
    {
        $result_loginUserPOST = $this->userService->findUserWithEmailandPassword($_POST['email'], $_POST['password']);
        unset($_SESSION['accountuser']);
        if ($result_loginUserPOST == false) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            $_SESSION['error_message'] = "Sai mật khẩu hoặc tài khoản không tồn tại trong hệ thống.";
        } else {

            $_SESSION['accountuser'] = $result_loginUserPOST;
            if ($result_loginUserPOST['chucvu'] == 'admin') {
                $url = "/MVC/controller/adminController.php";
                header("Location: " . $url);
            } else {
                $url = "/MVC/controller/productController.php";
                header("Location: " . $url);
            }
        }
    }
    public function registerUserGET()
    {
        include '../views/register_user.php';
    }
    public function registerUserPOST()
    {
        $result_registeruser = $this->userService->addUser($this->SetUser());
        if ($result_registeruser) {
            $url = "/MVC/controller/userController.php?controller=loginUserGET";
            header("Location: " . $url);
        } else {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            $_SESSION['error_message'] = "Kiểm tra lại thông tin đăng ký hoặc Email đã tồn tại trong hệ thống.";
        }
    }
    //Random Password
    function generateRandomPassword($length = 10)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';
        // Create a randomly generated password
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $password;
    }
    // SMTP 
    public function sendmail($ps, $email)
    {

        $mail  = new PHPMailer();

        try {
            //Set the SMTP server parameters
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->Username = 'ntan1695123@gmail.com';
            $mail->Password = '19001560Aa';
            $mail->SMTPSecure = 'ssl'; //Enable SSL encryption

            //Set recipient(s)
            $mail->setFrom('ntan1695123@gmail.com', 'FigureFunnyStore');
            $mail->addAddress($email, 'Hi');

            //Set email body
            $mail->Subject = '[FigureFunny] Khôi phục mật khẩu của bạn'; // tieu de
            //

            $mail->CharSet = 'UTF-8';
            //
            $mail->Body = "<div id=':33' class='ii gt' jslog='20277; u014N:xr6bB; 4:W251bGwsbnVsbCxbXV0.'>"
                . "<div id=':32' class='a3s aiL '>"
                . "<u>" . "</u>" . "<div>"
                . "<div style='width:800px;text-align:center;margin:0 auto'>"
                . "<table align='center' width='800' height='1000' cellpadding='0' cellspacing='0' border='0' style='background:#A77979'>"
                . "<tbody>"
                . "<tr>"
                . "<td align='center' valign='top' style='background:url(https://wallpapercave.com/uwp/uwp2052576.jpeg)'>"
                . "<table width='576' cellpadding='0' cellspacing='0' border='0'>"
                . "<tbody>"
                . "<tr>"
                . "<td height='250'>"
                . "</td>"
                . "</tr>"
                . "<tr>"
                . "<td align='left' valign='top' style='color:#fff'>"
                . "<font color='#e35b5b' style='font-size:26px'>"
                . "<strong>"
                . "Gửi khách hàng:"
                . "<br>"
                . "Đây đây là mật khẩu của bạn, vui lòng nhập vào:"
                . "</strong>"
                . "</font>"
                . "</td>"
                . "</tr>"
                . "<tr>"
                . "<td height='40' valign='top'>"
                . "</td>"
                . "</tr>"
                . "<tr>"
                . "<td align='center' height='54' style='background:#202121;letter-spacing:15px;color:#ffffff'>"
                . "<font size='6' color='#FFFFFF'>"
                // code here
                . $ps
                . "</font>"
                . "</td>"
                . "</tr>"
                . "<tr>"
                . "<td height='40' valign='top'>"
                . "</td>"
                . "</tr>"
                . "<tr>"
                . "<td valign='top' style='color:#e35b5b'>"
                . "<font size='4' color='#e35b5b'>"
                . "Mọi thắc mắc vui lòng gửi email "
                . "<a href='mailto:longan04111@gmail.com ' target='_blank'>"
                . "longan04111@gmail.com"
                . "</a>"
                . "để biết thêm thông tin."
                . "Nếu bạn không có thắc mắc nào, vui lòng đừng gửi thư rác!"
                . "</font>"
                . "</td>"
                . "</tr>"
                . "<tr>"
                . "<td height='40' valign='top'>"
                . "</td>"
                . "</tr>"
                . "<tr>"
                . "<td height='60' valign='top' style='color:#e35b5b'>"
                . "<font size='4' color='#e35b5b'>Một ngày tốt lành！</font>"
                . "</td>"
                . "</tr>"
                . "<tr>"
                . "<td height='50' valign='top' style='color:#e35b5b'>"
                . "<font size='5' color='#e35b5b'><strong>TN<strong></font>"
                . "</td>"
                . "</tr>"
                . "<tr>"
                . "<td height='100%'>"
                . "</td>"
                . "</tr>"
                . "</tbody>"
                . "</table>"
                . "</td>"
                . "</tr>"
                . "</tbody>"
                . "</table>"
                . "</div>"
                . "</div>"
                . "</div>"
                . "<div class='yj6qo'></div>"
                . "</div>"; //body
            $mail->isHTML(true);

            //Send the message, check for errors
            if (!$mail->send()) {
                // $_SESSION['error_message'] = "123";
            } else {
                // $_SESSION['error_message'] = "Kiểm tra lại thông tin đăng ký hoặc Email đã tồn tại trong hệ thống.";
            }
        } catch (Exception $e) {

            echo "Error encountered: " . $mail->ErrorInfo;
        }
    }
    public function ForgotPassWordPOST()
    {
        $result_findemail = $this->userService->findEmail($_POST['email']);
        if ($result_findemail != false) {
            $randomPassword = $this->generateRandomPassword();
            $this->sendmail($randomPassword, $_POST['email']);
            $newu = new User();
            $newu->SetEmail($_POST['email']);
            $newu->SetPassword($randomPassword);
            $newu->SetRoles('customer');
            $newu->setPhonenumber($result_findemail['phonenumber']);
            $newu->SetAddress($result_findemail['diachi']);
            $newu->SetCustomerID("1");
            $newu->SetFirstName($result_findemail['firstname']);
            $newu->SetLastName($result_findemail['lastname']);
            $this->userService->updateUserByEmail($newu);

            $url = "/MVC/controller/userController.php";
            header("Location: " . $url);
        } else {
            $url = "/MVC/controller/productController.php";
            header("Location: " . $url);
            echo '<script>alert("Không tồn tại Email hoặc sai Email!");</script>';
        }
    }
    //GET BILL USER BUY
    public function indexUser()
    {
        $getbill = $this->billService->getBillEmaill($_SESSION['accountuser']['email']);
        //   foreach ($getbill as $document) {
        //     echo $id = $document['idbill'];
        //  }
        include '../views/infor_user.php';
    }
    
    //INFOR BILL
    public function billInfor()
    {
        $id = $_GET['id'];

        if (empty($_SESSION['inforbill']) || !isset($_SESSION['inforbill'])) {
            $_SESSION['inforbill'] = array();
        } else unset($_SESSION['inforbill']);
        $getlistdetailbill = $this->billService->getBillDetail($id);
        $getinforbill = $this->billService->getBill($id);

        foreach ($getlistdetailbill as $document) {
            $new_item = array(

                'masanp' => $document['masp'],
                'ten' => $document['tensp'],
                'gia' => $document['gia'],
                'image' => $this->productService->findOneImageIdProduct($document['masp']),
                'Quantity' => $document['Quantity']


            );   //echo $document['idproduct'];
            $_SESSION['inforbill'][] = $new_item;
        }
        include '../views/bill_user.php';
    }
    //Trả Hàng GET-POST
    public function CreateTrahang(SpLoi $e)
    {
        
        if ($this->SpLoiService->addSpLoi($e)) {
            print_r($_POST);
            //$url = "userController.php?controller=inforUserGET";
            //header("Location: " . $url);
        } else {
            echo "<script>alert('Lỗi thêm vui lòng xem lại thông tin !');</script>";
        }
    }
    public function SetSpLoi()
    {
        $tempID = (int)$this->SpLoiService->getIdSpLoi();
        $e = new SpLoi();
        $e->setMaTH($tempID);
        $e->setmasp((int)$_POST['masp']);
        $e->gettensp($_POST['tensp']);
        $e->getMadh((int)$_POST['madh']);
        $e->getSdt((int)$_POST['sldt']);
        $e->getNoidung($_POST['noidung']);
        $e->getTinhtrang($_POST['tinhtrang']);
        return $e;
    }
}
$classuser = new userController();
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    // REGISTER USER GET - POST
    if ($controller == "registerUserGET") {
        $classuser->registerUserGET();
    }
    if ($controller == "registerUserPOST") {
        $classuser->registerUserPOST();
    }
    // LOGIN USER GET - POST
    if ($controller == "loginUserGET") {
        $classuser->loginUserGET();
    }
    if ($controller == "loginUserPOST") {
        $classuser->loginUserPOST();
    }
    //LOGOUT
    if ($controller == "logout") {
        $classuser->LogOut();
    }
    //FORGOT PASSWORD
    if ($controller == "ForgotPassWordPOST") {
        $classuser->ForgotPassWordPOST();
    }

    //INFOR USER GET
    if ($controller == "inforUserGET") {
        $getbills = $classuser->indexUser();
        $getBillD = $classuser->$billService->getBillDetail();
    }
    if ($controller == 'createTHPOST') {
        print_r($_POST);
        if (
            !empty($_POST['noidung'])
        ) {
            $classuser->CreateTrahang($classuser->SetSpLoi());
        }
        // else {
        //     $getbills = $classuser->indexUser();
        // }
    }
    // BIL INFOR
    if ($controller == "billInfor") {
        $getbills = $classuser->billInfor();
    }
} else       $classuser->loginUserGET();
