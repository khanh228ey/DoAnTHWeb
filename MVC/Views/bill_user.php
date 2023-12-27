<?php
include 'header.php';
?>
<main class="mainContent-theme ">
    <div class="layout-info-account account-order">
        <div class="title-infor-account text-center">
            <h1>Chi tiết đơn hàng </h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-3 sidebar-account">
                    <div class="AccountSidebar">
                        <h3 class="AccountTitle titleSidebar">Tài khoản</h3>
                        <div class="AccountContent">
                            <div class="AccountList">
                                <ul class="list-unstyled">
                                    <li class="current"><a href="/MVC/controller/userController.php?controller=inforUserGET">Thông tin tài khoản</a></li>

                                    <li class="last"><a href="/MVC/controller/userController.php?controller=logout">Đăng xuất</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="header-page">
                        <h4 class="name-order">Đơn hàng: #<?php echo $id ?>, <span class="order_date">Đặt lúc —  <?php echo $getinforbill['daybuy']?></span></h4>

                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="/MVC/controller/userController.php?controller=inforUserGET" id="return_to_store">Quay lại trang tài khoản </a>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 content-page customer-table-wrap detail-table-order">
                            <div class="customer-table-bg">
                                <p class="title-detail">Chi tiết đơn hàng </p>
                                <div class="table-responsive">
                                    <table id="order_details" class="table tableOrder">
                                        <tbody>
                                            <tr>
                                                <th class=""></th>
                                                <th class="">Sản phẩm</th>
                                                <th class="text-center">Mã sản phẩm</th>
                                                <th class="text-center">Đơn giá</th>
                                                <th class="text-center">Số lượng</th>
                                                <th class="total text-right">Thành tiền</th>
                                            </tr>
                                            <?php
                                            if (isset($_SESSION['inforbill']) && is_array($_SESSION['inforbill'])) {
                                                foreach ($_SESSION['inforbill'] as $itemcart) {
                                                    echo ' <tr id="'.$itemcart['masp'].'" class="odd">
                                                    <td class="order-image">
                                                        <a href="/MVC/controller/productController.php?controller=productDetailId&value='.$itemcart['masp'].'" aria-label="'.$itemcart['tensp'].'">
                                                            <img src="'.$itemcart['Image'].'" alt="'.$itemcart['tensp'].'">
                                                        </a>
                                                    </td>
                                                    <td class="" style="max-width:300px">
                                                        <a href="/MVC/controller/productController.php?controller=productDetailId&value='.$itemcart['masp'].'" title="">'.$itemcart['tensp'].'</a> <br>
                                                        <span class="variant_acc">
    
                                                        </span>
    
                                                    </td>
                                                    <td class="sku text-center"></td>
                                                    <td class="money text-center">' . number_format($itemcart['gia'], 0, '.', '.') . 'đ' . ' </td>
                                                    <td class="quantity center text-center">'.$itemcart['Quantity'].'</td>
                                                    <td class="total money text-right">' . number_format($itemcart['Quantity'] * $itemcart['gia'], 0, '.', '.') . 'đ' . ' </td>
                                                </tr>';
                                                }
                                            }
                                            ?>
                                          <?php
                                                    if (isset($_SESSION['inforbill']) && count($_SESSION['inforbill']) > 0) {
                                                        $totalmoney = 0;
                                                        foreach ($_SESSION['inforbill'] as $item) {
                                                            $totalmoney += $item['gia'] * $item['Quantity'];
                                                        }
                                                        echo '  <tr class="order_summary order_border">
                                                        <td class="text-right" colspan="5"><b>Giá sản phẩm</b></td>
                                                        <td class="total money text-right"><b>'.number_format($totalmoney, 0, '.', '.') . 'đ'.'</b></td>
                                                    </tr>';
                                                     
                                                    } else echo '0đ';
                                                    ?>

                                          


                                            <tr class="order_summary ">
                                                <td class="text-right" colspan="5"><b>Miễn phí vận chuyển</b></td>
                                                <td class="total money text-right"><b>0₫</b></td>
                                            </tr>

                                            <?php
                                                    if (isset($_SESSION['inforbill']) && count($_SESSION['inforbill']) > 0) {
                                                        $totalmoney = 0;
                                                        foreach ($_SESSION['inforbill'] as $item) {
                                                            $totalmoney += $item['gia'] * $item['Quantity'];
                                                        }
                                                        echo '   <tr class="order_summary order_total">
                                                        <td class="text-right" colspan="5"><b>Tổng tiền</b></td>
                                                        <td class="total money text-right"><b>'.number_format($totalmoney, 0, '.', '.') . 'đ'.' </b></td>
                                                    </tr>';
                                                    
                                                    } else echo '0đ';
                                                    ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 content-page">
                            <div class="row">
                                <div id="order_payment" class="col-md-6 col-sm-6">
                                    <h3 class="order_section_title">Địa chỉ nhận thanh toán</h3>
                                    <div class="alert alert-info">
                                        <span class="text_status">Tình trạng thanh toán:</span> <span class="status_pending">     <?php echo $getinforbill['trangthai']; ?></span>
                                    </div>
                                    <div class="address">
                                        <p class="adressName "><?php echo $getinforbill['note']; ?></p>
                                        <p></p>
                                        <p></p>
                                        <p></p>
                                        <p> <?php echo $getinforbill['addressdelivery']; ?></p>
                                        <p><?php echo $getinforbill['phonenumber']; ?></p>
                                    </div>
                                </div>

                                <div id="order_shipping" class="col-md-6 col-sm-6">
                                    <h3 class="order_section_title">Địa chỉ gửi hàng</h3>
                                    <div class="alert alert-info">
                                        <span class="text_status">Vận chuyển:</span>
                                        <span class="status_not fulfilled shipment_pending">

                                        <?php echo $getinforbill['trangthai']; ?>
                                        </span>
                                    </div>
                                    <div class="address">
                                        <p class="adressName "><?php echo $getinforbill['note']; ?></p>
                                        <p></p>
                                        <p></p>
                                        <p></p>
                                        <p> <?php echo $getinforbill['addressdelivery']; ?></p>
                                        <p> </p>
                                        <p><?php echo $getinforbill['phonenumber']; ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php //fotter page here --
include 'footer.php';
?>
<?php //js page here --
include 'sctript_indexjs.php';
?>
