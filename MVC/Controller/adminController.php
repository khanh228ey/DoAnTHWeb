<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/src/SMTP.php';

require_once('../model/productClass.php');
require_once('../model/productService.php');
require_once('../model/billService.php');
require_once('../model/NhasxClass.php');
require_once('../model/NhasxService.php');
require_once('../model/LoaiSPService.php');
require_once('../model/LoaiSPClass.php');
require_once('../Model/SploiClass.php');
require_once('../Model/SpLoiService.php');
require_once('../Model/NvgiaohangClass.php');
require_once('../Model/NvgiaohangService.php');
require_once('../Model/GiaohangClass.php');
require_once('../Model/GiaohangService.php');


class adminController
{

   public $loaispService;
   public $productService;
   public $billService;
   public $nhasxService;
   public $nvghService;
   public $ghService;
   public function __construct()
   {
      $this->productService = new ProductService();
      $this->billService = new billService();
      $this->nhasxService = new NhasxService();
      $this->loaispService = new LoaiSPService();
      $this->nvghService = new NvgiaohangService();
      $this->ghService= new GiaoHangService();
   }
   // Index
   public function LoadIndex()
   {
      $countbilltoday = $this->billService->countBilltoday();
      $countstock = $this->billService->countStock();
      $countbillwait = $this->billService->countBillwait();
      $top5 = $this->billService->bestsellertop5();
      $sumbill = $this->billService->sumBilltoday();
      $get5bill = $this->billService->getBilllimit5();
      $idtemp = 0;
      // foreach ($top5 as $row) {
      //     $_SESSION['topseller' . $idtemp] = $this->productService->findOneId($row['_id'])['ProductName'];
      //     $_SESSION['quantityseller' . $idtemp] = $row['Quantity'];
      //     $idtemp++;
      // }

      for ($id = $idtemp; $id < 5; $id++) {
         //echo $id;
         $_SESSION['topseller' . $id] = "";
         $_SESSION['quantityseller' . $id] = 0;
      }


      include '../View_admin/index_admin.php';
   }
    /////////////////////////////////////////
    //Create Giao Hang GET - POST
    public function CreateGHGet(){
      include '../View_admin/giaohang_index.php';
   }
   public function CreateGHPOST(GiaoHang $e){
      if ($this->ghService->addgh($e)) {
         $url = "adminController.php?controller=indexGiaoHangGET";
         header("Location: " . $url);
      } else {
         echo "<script>alert('Lỗi thêm vui lòng xem lại thông tin !');</script>";
      }
   }
   public function Updategh()
   {
      $p = new GiaoHang();
      $p->setmagiao($_POST['magiao']);
      $p->setmadh($_POST['madh']);
      $p->setmanv($_POST['manv']);
      $p->setngaygiao($_POST['ngaygiao']);
      $p->settinhtrang($_POST['tinhtrang']);

      $this->ghService->updateNvgh($p);
   }
   public function Setgh()
   {
      $tempID = (int)$this->ghService->getIdGH();
      $e = new GiaoHang();
      $e->setmagiao($tempID);
      $e->setmadh($_POST['madh']);
      $e->setmanv($_POST['manv']);
      $e->setngaygiao($_POST['ngaygiao']);
      $e->settinhtrang($_POST['tinhtrang']);
      return $e;
   }
   public function SearchNotFoundgh()
   {
      $re = new GiaoHang();
      $re->setmagiao("Không tìm thấy");
      $re->setmadh("Không tìm thấy");
      $re->setmanv("Không tìm thấy");
      $re->setngaygiao("Không tìm thấy");
      $re->settinhtrang("Không tìm thấy");
      include '../View_admin/giaohang_index.php';
   }
   /////////////////////////////////////////
   //Create Nvgiaohang GET - POST
   public function CreateNvghGet(){
      include '../View_admin/nvgh_index.php';
   }
   public function CreateNvghPOST(Nvgiaohang $e){
      if ($this->nvghService->addNvgh($e)) {
         $url = "adminController.php?controller=indexNvghGET";
         header("Location: " . $url);
      } else {
         echo "<script>alert('Lỗi thêm vui lòng xem lại thông tin !');</script>";
      }
   }
   public function UpdateNvgh()
   {
      $p = new Nvgiaohang();
      $p->setmanv($_POST['manv']);
      $p->settennv($_POST['tennv']);
      $p->setsdt($_POST['sdt']);
      $p->setdiachi($_POST['diachi']);
      $p->setgioitinh($_POST['gioitinh']);

      $this->nvghService->updateNvgh($p);
   }
   public function SetNvgh()
   {
      $tempID = (int)$this->nvghService->getIdNvgh();
      $e = new Nvgiaohang();
      $e->setmanv($tempID);
      $e->settennv($_POST['tennv']);
      $e->setsdt($_POST['sdt']);
      $e->setdiachi($_POST['diachi']);
      $e->setgioitinh($_POST['gioitinh']);
      return $e;
   }
   public function SearchNotFoundNvgh()
   {
      $re = new Nvgiaohang();
      $re->setmanv("Không tìm thấy");
      $re->settennv("Không tìm thấy");
      $re->setsdt("Không tìm thấy");
      $re->setdiachi("Không tìm thấy");
      $re->setgioitinh("Không tìm thấy");
      include '../View_admin/producer_index.php';
   }
   /////////////////////////////////////////
   //CREATE LOAISP GET - POST
   public function CreateLSPGet()
   {
      include '../View_admin/loaisp_index.php';
   }
   public function CreateLSPPOST(LoaiSP $e)
   {
      if ($this->loaispService->addLSP($e)) {
         $url = "adminController.php?controller=indexLSPGET";
         header("Location: " . $url);
      } else {
         echo "<script>alert('Lỗi thêm vui lòng xem lại thông tin !');</script>";
      }
   }
   public function UpdateLSP()
   {
      $p = new LoaiSP();
      $p->setMaloaisp($_POST['maloaisp']);
      $p->setTenloai($_POST['tenloai']);
      $this->loaispService->updateLSP($p);
   }
  
   public function SetLSP()
   {
      $tempID = (int)$this->loaispService->getIdLoaiSP();
      $e = new LoaiSP();
      $e->setMaloaisp($tempID);
      $e->setTenloai($_POST['tenloai']);
      return $e;
   }
   public function SearchNotFoundLSP()
   {
      $re = new LoaiSP();
      $re->setMaloaisp("Không tìm thấy");
      $re->setTenloai("Không tìm thấy");
      include '../View_admin/producer_index.php';
   }
   /////////////////////////////////////////
   //CREATE PRODUCER GET - POST
   public function CreateProducerGet()
   {
      include '../View_admin/producer_create.php';
   }
   public function CreateProducerPOST(Nhasx $e)
   {
      if ($this->nhasxService->addNhasx($e)) {
         $url = "adminController.php?controller=indexProducerGET";
         header("Location: " . $url);
      } else {
         echo "<script>alert('Lỗi thêm vui lòng xem lại thông tin !');</script>";
      }
   }
   public function UpdateProducer()
   {
      $p = new Nhasx();
      $p->SetManhasx($_POST['manhasx']);
      $p->setTennhasx($_POST['tennhasx']);
      $p->setSdt($_POST['sdt']);
      $this->nhasxService->updateNhasx($p);
   }
   public function deleteProducer($e){
      
      $this->nhasxService->getNhasxAndDelete($e);
      }
   public function SetProducer()
   {
      $tempID = (int)$this->nhasxService->getIdNhasx();
      $e = new Nhasx();
      $e->setManhasx($tempID);
      $e->setTennhasx($_POST['tennhasx']);
      $e->setSdt($_POST['sdt']);
      return $e;
   }
   public function SearchNotFoundProducer()
   {
      $re = new Nhasx();
      $re->setTennhasx("Không tìm thấy");
      $re->setSdt("Không tìm thấy");
      include '../View_admin/producer_index.php';
   }
   /////////////////////////////////////////
   //CREATE PRODUCT GET - POST
   public function CreateProductGET()
   {
      
      include '../View_admin/product_create.php';
   }
   public function CreateProductPOST(Product $p, $listimg)
   {
      if ($this->productService->addProduct($p, $listimg)) {
         // $result = $this->productService->getAllProduct();
         // include '../view_admin/product_index.php';
         $url = "adminController.php?controller=indexProductGET";
         header("Location: " . $url);
      } else {
         echo "<script>alert('Lỗi thêm vui lòng xem lại thông tin !');</script>";
      }
   }
   public function UpdateProduct()
   {
      $p = new Product();
      $p->SetProductID($_POST['masp']);
      $p->SetProductName($_POST['tensp']);
      $p->SetSeries($_POST['maloaisp']);
      $p->SetBrand($_POST['manhasx']);
      $p->SetNote($_POST['note']);
      // $p->SetDateRelease($_POST['DateRelease']);
      $p->SetProductStatus($_POST['ttsp']);
      $p->SetPrice((float)$_POST['gia']);
      $p->SetStock((int)$_POST['soluong']);
      //$p->SetInfor($_POST['Infor']);

      $this->productService->updateProduct($p);

      if (!empty($_POST['geturlcloud'])) {
         // call add new 
         $this->productService->UpdateListImage($_POST['masp'], $_POST['geturlcloud']);
      } else {
         if (!empty($_POST['image1'])) {
            $imgs = new ProductImage();
            $imgs->SetProductID($_POST['masp']);
            $imgs->SetIDSort("1");
            $imgs->setImg($_POST['image1']);
            $this->productService->UpdateOneImage($imgs);
         }
         if (!empty($_POST['image2'])) {
            $imgs = new ProductImage();
            $imgs->SetProductID($_POST['masp']);
            $imgs->SetIDSort("2");
            $imgs->setImg($_POST['image2']);
            $this->productService->UpdateOneImage($imgs);
         }
         if (!empty($_POST['image3'])) {
            $imgs = new ProductImage();
            $imgs->SetProductID($_POST['masp']);
            $imgs->SetIDSort("3");
            $imgs->setImg($_POST['image3']);
            $this->productService->UpdateOneImage($imgs);
         }
         if (!empty($_POST['image4'])) {
            $imgs = new ProductImage();
            $imgs->SetProductID($_POST['masp']);
            $imgs->SetIDSort("4");
            $imgs->setImg($_POST['image4']);
            $this->productService->UpdateOneImage($imgs);
         }
      }
   }
   public function SetProduct()
   {
      $tempID = (int)$this->productService->getIdadd();
      $p = new Product();
      $p->SetProductID($tempID);
      $p->SetProductName($_POST['tensp']);
      $p->SetSeries($_POST['maloaisp']);
      $p->SetBrand($_POST['manhasx']);
      $p->SetNote($_POST['note']);
      //$p->SetDateRelease($_POST['DateRelease']);
      $p->SetProductStatus($_POST['ttsp']);
      $p->SetPrice((float)$_POST['gia']);
      $p->SetStock((int)$_POST['soluong']);
      return $p;
   }
   public function SearchNotFound()
   {
      $result = new Product();
      $result->SetProductID("Không tìm thấy");
      $result->SetProductName("Không tìm thấy");
      $result->SetSeries("Không tìm thấy");
      $result->SetBrand("Không tìm thấy");
      $result->SetNote("Không tìm thấy");
      //  $result->SetDateRelease("Không tìm thấy");
      $result->SetProductStatus("Không tìm thấy");
      $result->SetPrice("Không tìm thấy");
      $result->SetStock("Không tìm thấy");
      include '../View_admin/product_index.php';
   }
   public function maildeny($email, $idbill, $totalbill)
   {
      $mail  = new PHPMailer();

      try {
         //Set the SMTP server parameters
         $mail->isSMTP();
         $mail->Host = 'smtp.gmail.com';
         $mail->Port = 465;
         $mail->SMTPAuth = true;
         $mail->Username = 'ntan1695123@gmail.com';
         $mail->Password = 'jqwnvarqphujghxc';
         $mail->SMTPSecure = 'ssl'; //Enable SSL encryption

         //Set recipient(s)
         $mail->setFrom('ntan1695123@gmail.com', 'Tân Thoại');
         $mail->addAddress($email, 'Hi');

         //Set email body
         $mail->Subject = '[Tân Thoại]Thông báo hủy đơn hàng #' . $idbill . ''; // tieu de
         //

         $mail->CharSet = 'UTF-8';
         //
         $bodys = "<div id=':b2' class='a3s aiL '><u></u>

            <div style='margin:0'>
               <table style='border-spacing:0;border-collapse:collapse;height:100%!important;width:100%!important'>
                  <tbody>
                     <tr>
                        <td
                           style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                           <table style='border-spacing:0;border-collapse:collapse;width:100%;margin:40px 0 20px'>
                              <tbody>
                                 <tr>
                                    <td
                                       style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                       <center>
                                          <table
                                             style='border-spacing:0;border-collapse:collapse;width:560px;text-align:left;margin:0 auto'>
                                             <tbody>
                                                <tr>
                                                   <td
                                                      style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                      <table style='border-spacing:0;border-collapse:collapse;width:100%'>
                                                         <tbody>
                                                            <tr>
                                                               <td
                                                                  style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
         
                                                                  <h1
                                                                     style='font-weight:normal;margin:0;font-size:30px;color:#333'>
                                                                     <a href='#'
                                                                        style='font-size:30px;text-decoration:none;color:#333'
                                                                        target='_blank'
                                                                        data-saferedirecturl='https://www.google.com/url?q=#&amp;source=gmail&amp;ust=1679302932953000&amp;usg=AOvVaw2tnb94L781s-iM8TyXhiEg'>Fingure
                                                                        Funny</a>
                                                                  </h1>
         
                                                               </td>
                                                               <td
                                                                  style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-transform:uppercase;font-size:14px;text-align:right;color:#999'>
                                                                  <span style='font-size:16px'>
                                                                     Đơn hàng #" . $idbill . "
                                                                  </span>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </center>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           <table style='border-spacing:0;border-collapse:collapse;width:100%'>
                              <tbody>
                                 <tr>
                                    <td
                                       style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding-bottom:40px'>
                                       <center>
                                          <table
                                             style='border-spacing:0;border-collapse:collapse;width:560px;text-align:left;margin:0 auto'>
                                             <tbody>
                                                <tr>
                                                   <td
                                                      style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                      <h2 style='font-weight:normal;margin:0;font-size:24px;margin-bottom:10px'>
                                                         Đơn hàng của bạn đã hủy</h2>
                                                      <p style='margin:0;color:#777;line-height:150%;font-size:16px'>
                                                         Đơn hàng #" . $idbill . " đã được hủy
         
                                                         bởi vì chúng tôi nghi ngờ đây là gian lận
         
         
                                                         .
                                                      </p>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </center>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           <table style='border-spacing:0;border-collapse:collapse;width:100%;border-top:1px solid #e5e5e5'>
                              <tbody>
                                 <tr>
                                    <td
                                       style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:40px 0'>
                                       <center>
                                          <table
                                             style='border-spacing:0;border-collapse:collapse;width:560px;text-align:left;margin:0 auto'>
                                             <tbody>
                                                <tr>
                                                   <td
                                                      style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                      <h3 style='font-weight:normal;margin:0;font-size:20px;margin-bottom:25px'>
                                                         Các sản phẩm hoàn lại</h3>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <table
                                             style='border-spacing:0;border-collapse:collapse;width:560px;text-align:left;margin:0 auto'>
                                             <tbody>
                                                <tr>
                                                   <td
                                                      style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                      <table style='border-spacing:0;border-collapse:collapse;width:100%'>
        
                                                         <tbody>";

         $getlist = $this->billService->getBillDetail($idbill);
         foreach ($getlist as $p) {
            $bodys .=   "<tr style='width:100%;border-bottom:1px solid #e5e5e5'>
                                                               <td
                                                                  style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:15px 0;padding-top:0!important'>
                                                                  <table style='border-spacing:0;border-collapse:collapse'>
                                                                     <tbody>
                                                                        <tr>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
         
                                                                              <img
                                                                                 src='" . $this->productService->findOneImageIdProduct($p['idproduct']) . "'
                                                                                 align='left' width='60' height='60'
                                                                                 style='margin-right:15px;border:1px solid #e5e5e5;border-radius:8px;object-fit:contain'
                                                                                 class='CToWUd' data-bit='iit'>
         
                                                                           </td>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;width:100%'>
         
         
         
         
                                                                              <span
                                                                                 style='font-size:16px;font-weight:600;line-height:1.4;color:#555'>" . $p['productname'] . " × " . $p['quantity'] . "</span><br>
         
                                                                           </td>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;white-space:nowrap'>
         
                                                                              <p
                                                                                 style='margin:0;color:#555;line-height:150%;font-size:16px;font-weight:600;text-align:right;margin-left:15px'>
                                                                                 " . number_format($p["price"] * $p["quantity"], 0, ',', '.') . " VND" . "</p>
                                                                           </td>
                                                                        </tr>
                                                                     </tbody>
                                                                  </table>
                                                               </td>
                                                            </tr>";
         }





         $bodys .= "   </tbody>
                                                      </table>
                                                      <table
                                                         style='border-spacing:0;border-collapse:collapse;width:100%;margin-top:15px;border-top:1px solid #e5e5e5'>
                                                         <tbody>
                                                            <tr>
                                                               <td
                                                                  style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;width:40%'>
                                                               </td>
                                                               <td
                                                                  style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                                  <table
                                                                     style='border-spacing:0;border-collapse:collapse;width:100%;margin-top:20px'>
                                                                     <tbody>
                                                                        <tr>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:5px 0'>
                                                                              <p
                                                                                 style='margin:0;color:#777;line-height:1.2em;font-size:16px'>
                                                                                 <span style='font-size:16px'>Tổng giá trị sản
                                                                                    phẩm</span>
                                                                              </p>
                                                                           </td>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-align:right;padding:5px 0'>
                                                                              <strong
                                                                                 style='font-size:16px;color:#555'>" . number_format($totalbill, 0, ',', '.') . " VND" . "</strong>
                                                                           </td>
                                                                        </tr>
         
         
                                                                        <tr>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:5px 0'>
                                                                              <p
                                                                                 style='margin:0;color:#777;line-height:1.2em;font-size:16px'>
                                                                                 <span style='font-size:16px'>Khuyến mãi </span>
                                                                              </p>
                                                                           </td>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-align:right;padding:5px 0'>
                                                                              <strong
                                                                                 style='font-size:16px;color:#555'>0₫</strong>
                                                                           </td>
                                                                        </tr>
         
                                                                        <tr>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:5px 0'>
                                                                              <p
                                                                                 style='margin:0;color:#777;line-height:1.2em;font-size:16px'>
                                                                                 <span style='font-size:16px'>Phí vận
                                                                                    chuyển</span>
                                                                              </p>
                                                                           </td>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-align:right;padding:5px 0'>
                                                                              <strong
                                                                                 style='font-size:16px;color:#555'>0₫</strong>
                                                                           </td>
                                                                        </tr>
         
         
                                                                     </tbody>
                                                                  </table>
                                                                  <table
                                                                     style='border-spacing:0;border-collapse:collapse;width:100%;margin-top:20px;border-top:2px solid #e5e5e5'>
                                                                     <tbody>
                                                                        <tr>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:20px 0 0'>
                                                                              <p
                                                                                 style='margin:0;color:#777;line-height:1.2em;font-size:16px'>
                                                                                 <span style='font-size:16px'>Tổng cộng</span>
                                                                              </p>
                                                                           </td>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-align:right;padding:20px 0 0'>
                                                                              <strong style='font-size:24px;color:#555'>" . number_format($totalbill, 0, ',', '.') . " VND" . "</strong>
                                                                           </td>
                                                                        </tr>
                                                                     </tbody>
                                                                  </table>
         
         
         
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </center>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           <table style='border-spacing:0;border-collapse:collapse;width:100%;border-top:1px solid #e5e5e5'>
                              <tbody>
                                 <tr>
                                    <td
                                       style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:35px 0'>
                                       <center>
                                          <table
                                             style='border-spacing:0;border-collapse:collapse;width:560px;text-align:left;margin:0 auto'>
                                             <tbody>
                                                <tr>
                                                   <td
                                                      style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                      <p style='margin:0;color:#999;line-height:150%;font-size:14px'>Nếu bạn có
                                                         bất cứ câu hỏi nào, đừng ngần ngại liên lạc với chúng tôi tại <a
                                                            href='mailto:longan04111@gmail.com'
                                                            style='font-size:14px;text-decoration:none;color:#1666a2'
                                                            target='_blank'>longan04111@gmail.com</a></p>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </center>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           <img
                              src='https://ci4.googleusercontent.com/proxy/AkPYSwbfCTPpa9UY2iemTt-8uuNCxd9wMi-MxiDXCwCclRn4IrvavPQy53Rok8pDmYePvpYw7glbcjctupZqDJjD9WVBMoR1vQ=s0-d-e1-ft#http://hstatic.net/0/0/global/notifications/spacer.png'
                              height='0' style='min-width:600px;height:0' class='CToWUd' data-bit='iit'>
                        </td>
                     </tr>
                  </tbody>
               </table>
               <center>
                  <p style='margin:0;color:#777;line-height:150%;font-size:16px'><a
                        style='font-size:10px;text-decoration:none;color:#999'
                        href='https://www.haravan.com/?utm_campaign=poweredby&amp;utm_medium=haravan&amp;utm_source=email'
                        target='_blank'
                        data-saferedirecturl='https://www.google.com/url?q=https://www.haravan.com/?utm_campaign%3Dpoweredby%26utm_medium%3Dharavan%26utm_source%3Demail&amp;source=gmail&amp;ust=1679302932954000&amp;usg=AOvVaw1eGgtDWuNJ-SjWDGbasF7-'>powered
                        by Haravan</a></p><a style='font-size:10px;text-decoration:none;color:#999'
                     href='https://www.haravan.com/?utm_campaign=poweredby&amp;utm_medium=haravan&amp;utm_source=email'
                     target='_blank'
                     data-saferedirecturl='https://www.google.com/url?q=https://www.haravan.com/?utm_campaign%3Dpoweredby%26utm_medium%3Dharavan%26utm_source%3Demail&amp;source=gmail&amp;ust=1679302932954000&amp;usg=AOvVaw1eGgtDWuNJ-SjWDGbasF7-'>
                  </a>
               </center><a style='font-size:10px;text-decoration:none;color:#999'
                  href='https://www.haravan.com/?utm_campaign=poweredby&amp;utm_medium=haravan&amp;utm_source=email'
                  target='_blank'
                  data-saferedirecturl='https://www.google.com/url?q=https://www.haravan.com/?utm_campaign%3Dpoweredby%26utm_medium%3Dharavan%26utm_source%3Demail&amp;source=gmail&amp;ust=1679302932954000&amp;usg=AOvVaw1eGgtDWuNJ-SjWDGbasF7-'>
         
               </a>
            </div>
         </div>";
         $mail->Body = $bodys;
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
   public function mailaccept($email, $idbill, $totalbill)
   {
      $mail  = new PHPMailer();

      try {
         //Set the SMTP server parameters
         $mail->isSMTP();
         $mail->Host = 'smtp.gmail.com';
         $mail->Port = 465;
         $mail->SMTPAuth = true;
         $mail->Username = 'tiennguyen558.tn@gmail.com';
         $mail->Password = 'jqwnvarqphujghxc';
         $mail->SMTPSecure = 'ssl'; //Enable SSL encryption

         //Set recipient(s)
         $mail->setFrom('tiennguyen558.tn@gmail.com', 'FigureFunnyStore');
         $mail->addAddress($email, 'Hi');

         //Set email body
         $mail->Subject = '[Figure Funny]Thông báo đơn hàng đã được phê duyệt #' . $idbill . ''; // tieu de
         //

         $mail->CharSet = 'UTF-8';
         //
         $bodys = "<div id=':b2' class='a3s aiL '><u></u>

            <div style='margin:0'>
               <table style='border-spacing:0;border-collapse:collapse;height:100%!important;width:100%!important'>
                  <tbody>
                     <tr>
                        <td
                           style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                           <table style='border-spacing:0;border-collapse:collapse;width:100%;margin:40px 0 20px'>
                              <tbody>
                                 <tr>
                                    <td
                                       style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                       <center>
                                          <table
                                             style='border-spacing:0;border-collapse:collapse;width:560px;text-align:left;margin:0 auto'>
                                             <tbody>
                                                <tr>
                                                   <td
                                                      style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                      <table style='border-spacing:0;border-collapse:collapse;width:100%'>
                                                         <tbody>
                                                            <tr>
                                                               <td
                                                                  style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
         
                                                                  <h1
                                                                     style='font-weight:normal;margin:0;font-size:30px;color:#333'>
                                                                     <a href='#'
                                                                        style='font-size:30px;text-decoration:none;color:#333'
                                                                        target='_blank'
                                                                        data-saferedirecturl='https://www.google.com/url?q=#&amp;source=gmail&amp;ust=1679302932953000&amp;usg=AOvVaw2tnb94L781s-iM8TyXhiEg'>Fingure
                                                                        Funny</a>
                                                                  </h1>
         
                                                               </td>
                                                               <td
                                                                  style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-transform:uppercase;font-size:14px;text-align:right;color:#999'>
                                                                  <span style='font-size:16px'>
                                                                     Đơn hàng #" . $idbill . "
                                                                  </span>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </center>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           <table style='border-spacing:0;border-collapse:collapse;width:100%'>
                              <tbody>
                                 <tr>
                                    <td
                                       style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding-bottom:40px'>
                                       <center>
                                          <table
                                             style='border-spacing:0;border-collapse:collapse;width:560px;text-align:left;margin:0 auto'>
                                             <tbody>
                                                <tr>
                                                   <td
                                                      style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                      <h2 style='font-weight:normal;margin:0;font-size:24px;margin-bottom:10px'>
                                                         Đơn hàng của bạn đã được duyệt </h2>
                                                      <p style='margin:0;color:#777;line-height:150%;font-size:16px'>
                                                         Đơn hàng #" . $idbill . " đã được xác nhận là hợp lệ.
         
         
                                                         .
                                                      </p>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </center>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           <table style='border-spacing:0;border-collapse:collapse;width:100%;border-top:1px solid #e5e5e5'>
                              <tbody>
                                 <tr>
                                    <td
                                       style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:40px 0'>
                                       <center>
                                          <table
                                             style='border-spacing:0;border-collapse:collapse;width:560px;text-align:left;margin:0 auto'>
                                             <tbody>
                                                <tr>
                                                   <td
                                                      style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                      <h3 style='font-weight:normal;margin:0;font-size:20px;margin-bottom:25px'>
                                                         Các sản phẩm đã đặt</h3>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                          <table
                                             style='border-spacing:0;border-collapse:collapse;width:560px;text-align:left;margin:0 auto'>
                                             <tbody>
                                                <tr>
                                                   <td
                                                      style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                      <table style='border-spacing:0;border-collapse:collapse;width:100%'>
        
                                                         <tbody>";

         $getlist = $this->billService->getBillDetail($idbill);
         foreach ($getlist as $p) {
            $bodys .=   "<tr style='width:100%;border-bottom:1px solid #e5e5e5'>
                                                               <td
                                                                  style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:15px 0;padding-top:0!important'>
                                                                  <table style='border-spacing:0;border-collapse:collapse'>
                                                                     <tbody>
                                                                        <tr>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
         
                                                                              <img
                                                                                 src='" . $this->productService->findOneImageIdProduct($p['idproduct']) . "'
                                                                                 align='left' width='60' height='60'
                                                                                 style='margin-right:15px;border:1px solid #e5e5e5;border-radius:8px;object-fit:contain'
                                                                                 class='CToWUd' data-bit='iit'>
         
                                                                           </td>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;width:100%'>
         
         
         
         
                                                                              <span
                                                                                 style='font-size:16px;font-weight:600;line-height:1.4;color:#555'>" . $p['productname'] . " × " . $p['quantity'] . "</span><br>
         
                                                                           </td>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;white-space:nowrap'>
         
                                                                              <p
                                                                                 style='margin:0;color:#555;line-height:150%;font-size:16px;font-weight:600;text-align:right;margin-left:15px'>
                                                                                 " . number_format($p["price"] * $p["quantity"], 0, ',', '.') . " VND" . "</p>
                                                                           </td>
                                                                        </tr>
                                                                     </tbody>
                                                                  </table>
                                                               </td>
                                                            </tr>";
         }





         $bodys .= "   </tbody>
                                                      </table>
                                                      <table
                                                         style='border-spacing:0;border-collapse:collapse;width:100%;margin-top:15px;border-top:1px solid #e5e5e5'>
                                                         <tbody>
                                                            <tr>
                                                               <td
                                                                  style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;width:40%'>
                                                               </td>
                                                               <td
                                                                  style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                                  <table
                                                                     style='border-spacing:0;border-collapse:collapse;width:100%;margin-top:20px'>
                                                                     <tbody>
                                                                        <tr>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:5px 0'>
                                                                              <p
                                                                                 style='margin:0;color:#777;line-height:1.2em;font-size:16px'>
                                                                                 <span style='font-size:16px'>Tổng giá trị sản
                                                                                    phẩm</span>
                                                                              </p>
                                                                           </td>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-align:right;padding:5px 0'>
                                                                              <strong
                                                                                 style='font-size:16px;color:#555'>" . number_format($totalbill, 0, ',', '.') . " VND" . "</strong>
                                                                           </td>
                                                                        </tr>
         
         
                                                                        <tr>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:5px 0'>
                                                                              <p
                                                                                 style='margin:0;color:#777;line-height:1.2em;font-size:16px'>
                                                                                 <span style='font-size:16px'>Khuyến mãi </span>
                                                                              </p>
                                                                           </td>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-align:right;padding:5px 0'>
                                                                              <strong
                                                                                 style='font-size:16px;color:#555'>0₫</strong>
                                                                           </td>
                                                                        </tr>
         
                                                                        <tr>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:5px 0'>
                                                                              <p
                                                                                 style='margin:0;color:#777;line-height:1.2em;font-size:16px'>
                                                                                 <span style='font-size:16px'>Phí vận
                                                                                    chuyển</span>
                                                                              </p>
                                                                           </td>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-align:right;padding:5px 0'>
                                                                              <strong
                                                                                 style='font-size:16px;color:#555'>0₫</strong>
                                                                           </td>
                                                                        </tr>
         
         
                                                                     </tbody>
                                                                  </table>
                                                                  <table
                                                                     style='border-spacing:0;border-collapse:collapse;width:100%;margin-top:20px;border-top:2px solid #e5e5e5'>
                                                                     <tbody>
                                                                        <tr>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:20px 0 0'>
                                                                              <p
                                                                                 style='margin:0;color:#777;line-height:1.2em;font-size:16px'>
                                                                                 <span style='font-size:16px'>Tổng cộng</span>
                                                                              </p>
                                                                           </td>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-align:right;padding:20px 0 0'>
                                                                              <strong style='font-size:24px;color:#555'>" . number_format($totalbill, 0, ',', '.') . " VND" . "</strong>
                                                                           </td>
                                                                        </tr>
                                                                     </tbody>
                                                                  </table>
         
         
         
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </center>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           <table style='border-spacing:0;border-collapse:collapse;width:100%;border-top:1px solid #e5e5e5'>
                              <tbody>
                                 <tr>
                                    <td
                                       style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:35px 0'>
                                       <center>
                                          <table
                                             style='border-spacing:0;border-collapse:collapse;width:560px;text-align:left;margin:0 auto'>
                                             <tbody>
                                                <tr>
                                                   <td
                                                      style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                      <p style='margin:0;color:#999;line-height:150%;font-size:14px'>Nếu bạn có
                                                         bất cứ câu hỏi nào, đừng ngần ngại liên lạc với chúng tôi tại <a
                                                            href='mailto:longan04111@gmail.com'
                                                            style='font-size:14px;text-decoration:none;color:#1666a2'
                                                            target='_blank'>longan04111@gmail.com</a></p>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </center>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           <img
                              src='https://ci4.googleusercontent.com/proxy/AkPYSwbfCTPpa9UY2iemTt-8uuNCxd9wMi-MxiDXCwCclRn4IrvavPQy53Rok8pDmYePvpYw7glbcjctupZqDJjD9WVBMoR1vQ=s0-d-e1-ft#http://hstatic.net/0/0/global/notifications/spacer.png'
                              height='0' style='min-width:600px;height:0' class='CToWUd' data-bit='iit'>
                        </td>
                     </tr>
                  </tbody>
               </table>
               <center>
                  <p style='margin:0;color:#777;line-height:150%;font-size:16px'><a
                        style='font-size:10px;text-decoration:none;color:#999'
                        href='https://www.haravan.com/?utm_campaign=poweredby&amp;utm_medium=haravan&amp;utm_source=email'
                        target='_blank'
                        data-saferedirecturl='https://www.google.com/url?q=https://www.haravan.com/?utm_campaign%3Dpoweredby%26utm_medium%3Dharavan%26utm_source%3Demail&amp;source=gmail&amp;ust=1679302932954000&amp;usg=AOvVaw1eGgtDWuNJ-SjWDGbasF7-'>powered
                        by Haravan</a></p><a style='font-size:10px;text-decoration:none;color:#999'
                     href='https://www.haravan.com/?utm_campaign=poweredby&amp;utm_medium=haravan&amp;utm_source=email'
                     target='_blank'
                     data-saferedirecturl='https://www.google.com/url?q=https://www.haravan.com/?utm_campaign%3Dpoweredby%26utm_medium%3Dharavan%26utm_source%3Demail&amp;source=gmail&amp;ust=1679302932954000&amp;usg=AOvVaw1eGgtDWuNJ-SjWDGbasF7-'>
                  </a>
               </center><a style='font-size:10px;text-decoration:none;color:#999'
                  href='https://www.haravan.com/?utm_campaign=poweredby&amp;utm_medium=haravan&amp;utm_source=email'
                  target='_blank'
                  data-saferedirecturl='https://www.google.com/url?q=https://www.haravan.com/?utm_campaign%3Dpoweredby%26utm_medium%3Dharavan%26utm_source%3Demail&amp;source=gmail&amp;ust=1679302932954000&amp;usg=AOvVaw1eGgtDWuNJ-SjWDGbasF7-'>
         
               </a>
            </div>
         </div>";
         $mail->Body = $bodys;
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
   // Bill
   public function BillIndex()
   {

      if (!isset($_POST['searchname'])) {
         $search = "";
      } else
         $search = $_POST['searchname'];
      $result = $this->billService->searchBillwithIDorEmail($search);

      include '../view_admin/bill_index.php';
   }
   public function ghIndex()
   {

      if (!isset($_POST['searchname'])) {
         $search = "";
      } else
         $search = $_POST['searchname'];
      $re = $this->ghService->getAllGH();
      include '../view_admin/giaohang_index.php';
   }
   // Bill Infor 
   public function BillInfor()
   {
      $inforbill = $this->billService->getBill($_GET['id']);
      $inforbilldetail = $this->billService->getBillDetail($_GET['id']);
      // foreach ($inforbilldetail as $i) {
      //     echo $i['idproduct'];
      // }
      include '../view_admin/bill_invoice.php';
   }
   public function GiaoHangInfor(){
      $inforbill = $this->billService->getBill($_GET['id1']);
      $infornv = $this->nvghService->findOneId($_GET['id1']);
      $inforgh = $this->ghService->findOneId($_GET['id']);
      include '../view_admin/giaohang_invoice.php';
   }
   public function BillWait()
   {
      if (!isset($_POST['searchname'])) {
         $search = "";
      } else
         $search = $_POST['searchname'];
      $result = $this->billService->searchBillwithIDorEmailWait($search);

      include '../view_admin/bill_wait.php';
   }

   // Bill not accept

   public function denyBill()
   {
      $inforbill = $this->billService->getBill($_GET['id']);
      $bill = new Bill();
      $bill->setBillID($inforbill['madh']);
      $bill->SetNote($inforbill['note']);
      $bill->setDaybuy($inforbill['daybuy']);
      $bill->SetEmailcustomer($inforbill['email']);
      $bill->setphonenumber($inforbill['phonenumber']);
      $bill->SetTotal($inforbill['tongtien']);
      $bill->SetStatus('Huỷ');
      $this->billService->updateBill($bill);
      $this->maildeny($inforbill['email'], $inforbill['madh'], $inforbill['tongtien']);
      $url = "adminController.php?controller=billindex";
      header("Location: " . $url);
   }
   //Bill accept
   public function AcceptBill()
   {
      $inforbill = $this->billService->getBill($_GET['id']);
      $bill = new Bill();
      $bill->setBillID($inforbill['madh']);
      $bill->SetNote($inforbill['note']);
      $bill->setDaybuy($inforbill['daybuy']);
      $bill->SetEmailcustomer($inforbill['email']);
      $bill->setphonenumber($inforbill['phonenumber']);
      $bill->SetTotal($inforbill['tongtien']);
      $bill->SetStatus('Đã xử lý');
      $this->billService->updateBill($bill);
      $this->mailaccept($inforbill['email'], $inforbill['madh'], $inforbill['tongtien']);
      $url = "adminController.php?controller=billindex";
      header("Location: " . $url);
   }
   //Giao hang accept
   public function AcceptGH()
   {
      $inforgh = $this->ghService->getGH($_GET['id']);
      $gh = new GiaoHang();
      $gh->setMagiao($inforgh['magiao']);
      $gh->setmadh($inforgh['madh']);
      $gh->setManv($inforgh['manv']);
      $gh->setNgaygiao($inforgh['ngaygiao']);
      $gh->settinhtrang('Giao Hàng Thành Công');
      $this->ghService->updateNvgh($gh);
      //$this->mailaccept($inforbill['email'], $inforbill['madh'], $inforbill['tongtien']);
      $url = "adminController.php?controller=giaohang_index";
      header("Location: " . $url);
   }
   //Giao hang not accept
   public function denyGH()
   {
      $inforgh = $this->ghService->getGH($_GET['id']);
      $gh = new GiaoHang();
      $gh->setMagiao($inforgh['magiao']);
      $gh->setmadh($inforgh['madh']);
      $gh->setManv($inforgh['manv']);
      $gh->setNgaygiao($inforgh['ngaygiao']);
      $gh->settinhtrang('Giao Hàng Không Thành Công');
      $this->ghService->updateNvgh($gh);
      //$this->mailaccept($inforbill['email'], $inforbill['madh'], $inforbill['tongtien']);
      $url = "adminController.php?controller=giaohang_index";
      header("Location: " . $url);
   }
}
$adminc = new adminController();

if (isset($_GET['controller'])) {
   $controller = $_GET['controller'];
   /////////////////////////////////////////
   // Nvgh Create GET - POST
   if ($controller == 'indexNvghPOST') {
      if (
         !empty($_POST['tennv']) || !empty($_POST['sdt']) ||
         !empty($_POST['diachi']) || !empty($_POST['gioitinh'])
      ) {
         $adminc->CreateNvghPOST($adminc->setnvgh());
      }
   }
   if ($controller == "indexNvghGET") {
      $re = $adminc->nvghService->getAllNvgh();
      include '../View_admin/nvgh_index.php';
   }
   if ($controller == "indexNvghPOST") {
      if (!empty($_POST['searchname'])) {
         $re = $adminc->nvghService->findName($_POST['searchname']);
         include '../view_admin/nvgh_index.php';
      } else {
         if ($_POST['searchname'] != "") {
            $adminc->SearchNotFoundLSP();
         } else {
            $re = $adminc->nvghService->getAllNvgh();
            include '../view_admin/nvgh_index.php';
         }
      }
   }
   if ($controller == "deleteNvghGET") {
      $id = $_GET['id'];
      if (!empty($id)) {
         $re = $adminc->nvghService->findOneId($id);
         include '../view_admin/nvgh_delete.php';
      }
   } 
   if ($controller == "deleteNvghPOST") {
      
      if (
         !empty($_POST['manv'])){
         $re = $_POST['manv'];
         $e=$adminc->nvghService->getNVAndDelete($re);
         if($e){
            $re = $adminc->nvghService->getAllNvgh();
            include '../view_admin/nvgh_index.php';
         }
      }
   }
   if ($controller == "updateNvghGET") {
      print_r($_GET);      
      $id = $_GET['id'];
      if (!empty($id)) {
         $re = $adminc->nvghService->findOneId($id);
         include '../view_admin/nvgh_update.php';
      }
   }
   if ($controller == "updateNvghPOST") {
      if (
         !empty($_POST['tennv']) || !empty($_POST['sdt'])
      ) {

         $adminc->UpdateNvgh();
         $re = $adminc->nvghService->getAllNvgh();
         include '../view_admin/nvgh_index.php.php';
      } else {
         $re = $adminc->nvghService->findOneId($_POST('manv'));
         include '../view_admin/nvgh_update.php';
      }
   }
   /////////////////////////////////////////
   // Product Create GET - POST
   if ($controller == "createProductGET") {
      $result = $adminc->loaispService->getAllLoaiSP();
      $re = $adminc->nhasxService->getAllNhasx();
      // $adminc->CreateProductGET();
      include '../View_admin/product_create.php';
   }
   if ($controller == "createProductPOST") {
      if (
         !empty($_POST['tensp']) || !empty($_POST['gia']) ||
         !empty($_POST['maloaisp']) || !empty($_POST['soluong'])
      ) {

         $adminc->CreateProductPOST($adminc->SetProduct(), $_POST['geturlcloud']);
      }
   }
   if ($controller == "indexProductGET") {
      $result = $adminc->productService->getAllProduct();
      include '../View_admin/product_index.php';
   }
   if ($controller == "indexProductPOST") {

      if (!empty($_POST['searchname'])) {
         $result = $adminc->productService->findName($_POST['searchname']);
         include '../view_admin/product_index.php';
      } else {
         if ($_POST['searchname'] != "") {
            $adminc->SearchNotFound();
         } else {
            $result = $adminc->productService->getAllProduct();
            include '../view_admin/product_index.php';
         }
      }
   }
   if ($controller == "deleteProductGET") {
      $id = $_GET['id'];
      if (!empty($id)) {
         $result = $adminc->productService->findOneId($id);
         include '../view_admin/product_delete.php';
      }
   } 
   if ($controller == "deleteProductPOST") {
      
      if(!empty($_POST['masp'])){
         $e = $_POST['masp'];
         $t = $adminc->productService->deleteImg($e);
         $re= $adminc->productService->getProductAndDelete($e);
         if($re){
            $result = $adminc->productService->getAllProduct();
            include '../view_admin/product_index.php';
         }
         
      }
   }
   if ($controller == "updateProductGET") {
      $re1 = $adminc->loaispService->getAllLoaiSP();
      $re = $adminc->nhasxService->getAllNhasx();
      $id = $_GET['id'];
      if (!empty($id)) {
         $result = $adminc->productService->findOneId($id);
         include '../view_admin/product_update.php';
      }
   }
   if ($controller == "updateProductPOST") {
      if (
         !empty($_POST['tensp']) || !empty($_POST['gia']) ||
         !empty($_POST['maloaisp']) || !empty($_POST['soluong'])
      ) {

         $adminc->updateProduct();

         $result = $adminc->productService->getAllProduct();
         include '../view_admin/product_index.php';
      } else {

         $result = $adminc->productService->findOneId($_POST['masp']);
         //$adminc->updateProduct();
         include '../view_admin/product_update.php';
      }
   }
   /////////////////////////////////////////
   //Producer GET - POST
   if ($controller == 'indexProducerPOST') {
      if (
         !empty($_POST['tennhasx']) || !empty($_POST['sdt'])
      ) {
         $adminc->CreateProducerPOST($adminc->SetProducer());
      }
   }
   if ($controller == "indexProducerGET") {
      $re = $adminc->nhasxService->getAllNhasx();
      include '../View_admin/producer_index.php';
   }
   if ($controller == "indexProducerPOST") {
      if (!empty($_POST['searchname'])) {
         $re = $adminc->nhasxService->findName($_POST['searchname']);
         include '../view_admin/producer_index.php';
      } else {
         if ($_POST['searchname'] != "") {
            $adminc->SearchNotFoundProducer();
         } else {
            $re = $adminc->nhasxService->getAllNhasx();
            include '../view_admin/producer_index.php';
         }
      }
   }
   if ($controller == "deleteProducerGET") {
      $id = $_GET['id'];
      if (!empty($id)) {
         $re = $adminc->nhasxService->findOneId($id);
         include '../view_admin/producer_delete.php';
         
      }
   } 
   if ($controller == "deleteProducerPOST") {
         
      if (
         !empty($_POST['manhasx'])){
         $re = $_POST['manhasx'];
         $e=$adminc->nhasxService->getNhasxAndDelete($re);
         if($e){
            $re = $adminc->nhasxService->getAllNhasx();
            include '../view_admin/producer_index.php';
         }
      }
   }
   if ($controller == "updateProducerGET") {
      print_r($_GET);      
      $id = $_GET['id'];
      if (!empty($id)) {
         $re = $adminc->nhasxService->findOneId($id);
         include '../view_admin/producer_update.php';
      }
   }
   if ($controller == "updateProducerPOST") {
      if (
         !empty($_POST['tennhasx']) || !empty($_POST['sdt'])
      ) {

         $adminc->UpdateProducer();
         $re = $adminc->nhasxService->getAllNhasx();
         include '../view_admin/producer_index.php';
      } else {
         $re = $adminc->nhasxService->findOneId($_POST('manhasx'));
         include '../view_admin/producer_update.php';
      }
   }
   /////////////////////////////////////////
   //CREATE LSP GET-POST
   // if($controller == 'createLSPPOST'){
   //    $adminc->CreateLSPGet();
   // }
   if ($controller == 'indexLoaiSPPOST') {
      if (
         !empty($_POST['tenloai'])
      ) {
         $adminc->CreateLSPPOST($adminc->setLSP());
      }
   }
   if ($controller == "indexLSPGET") {
      $re = $adminc->loaispService->getAllLoaiSP();
      include '../View_admin/loaisp_index.php';
   }
   if ($controller == "indexLSPPOST") {
      if (!empty($_POST['searchname'])) {
         $re = $adminc->loaispService->findName($_POST['searchname']);
         include '../view_admin/loaisp_index.php';
      } else {
         if ($_POST['searchname'] != "") {
            $adminc->SearchNotFoundLSP();
         } else {
            $re = $adminc->loaispService->getAllLoaiSP();
            include '../view_admin/loaisp_index.php';
         }
      }
   }
   if ($controller == "deleteLSPGET") {
      $id = $_GET['id'];
      if (!empty($id)) {
         $re = $adminc->loaispService->findOneId($id);
         include '../view_admin/LoaiSP_delete.php';
      }
   } 
   if ($controller == "deleteLSPPOST") {
      
      if (
         !empty($_POST['maloaisp'])){
         $re = $_POST['maloaisp'];
         $e=$adminc->loaispService->getLSPAndDelete($re);
         if($e){
            $re = $adminc->loaispService->getAllLoaiSP();
            include '../view_admin/loaiSP_index.php';
         }
      }
   }
   ///////////////////////////
   //Giao hang GET - POST 
   if ($controller == 'indexGiaoHangPOST') {
      print_r($GET);
      if (
         !empty($_POST['madh'])
      ) {
         $adminc->CreateGHPOST($adminc->Setgh());
      }
   }
   if ($controller == "indexGiaoHangGET") {
      
      $re = $adminc->ghService->getAllGH();
      $result = $adminc->billService->getAllBill();
      $e1 = $adminc->nvghService->getAllnvgh();
      include '../View_admin/giaohang_index.php';
   }
   if ($controller == "indexGiaoHangPOST") {
      if (!empty($_POST['searchname'])) {
         // $te = $adminc->billService->getAllBill();
         // $e1 = $adminc->nvghService->getAllnvgh();
         $re = $adminc->ghService->findName($_POST['searchname']);
         include '../view_admin/giaohang_index.php';
      } else {
         if ($_POST['searchname'] != "") {
            $adminc->SearchNotFoundLSP();
         } else {
            $re = $adminc->ghService->getAllGH();
            include '../view_admin/giaohang_index.php';
         }
      }
   }
   if ($controller == "updateGiaoHangGET") {
      print_r($_GET);      
      $id = $_GET['id'];
      if (!empty($id)) {
         $re = $adminc->ghService->findOneId($id);
         include '../view_admin/giaohang_update.php';
      }
   }
   if ($controller == "updateGiaoHangPOST") {
      if (
         !empty($_POST['magiao']) || !empty($_POST['manv'])||
         !empty($_POST['madh']) || !empty($_POST['ngaygiao'])|| !empty($_POST['tinhtrang'])
      ) {

         $adminc->Updategh();
         $re = $adminc->ghService->getAllGH();
         include '../view_admin/giaohang_index.php';
      } else {
         $re = $adminc->ghService->findOneId($_POST('magiao'));
         include '../view_admin/giaohang_update.php';
      }
   }
   ///////////////////////////
   if ($controller == "billindex") {
      $adminc->BillIndex();
   }
   if($controller == "ghIndex"){
      $adminc->ghIndex();
   }
   if ($controller == "BillInfor") {
      $adminc->BillInfor();
   }
   if($controller == "GiaoHangInfor"){
      $adminc->GiaoHangInfor();
   }
   if ($controller == "denyBill") {
      $adminc->denyBill();
   }
   if ($controller == "acceptBill") {
      $adminc->AcceptBill();
   }
   if ($controller == "billwait") {
      $adminc->BillWait();
   }
   if ($controller == "acceptGiaoHang") {
      $adminc->AcceptGH();
   }
   if ($controller == "denyGiaoHang") {
      $adminc->denyGH();
   }
} else   $adminc->LoadIndex();
