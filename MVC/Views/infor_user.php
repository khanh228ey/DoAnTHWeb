<?php
include 'header.php';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="../css_admin/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../css_admin/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../css_admin/buttons.bootstrap4.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<main class="mainContent-theme ">

    <div class="layout-info-account">
        <div class="title-infor-account text-center">
            <h1>Tài khoản của bạn </h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-3 sidebar-account">
                    <div class="AccountSidebar">
                        <h3 class="AccountTitle titleSidebar">Tài khoản</h3>
                        <div class="AccountContent">
                            <div class="AccountList">
                                <ul class="list-unstyled">
                                    <li class="current"><a href="userController.php?controller=inforUserGET">Thông tin tài khoản</a></li>
                                    <!-- <li><a href="/account/addresses">Danh sách địa chỉ</a></li> -->
                                    <li class="last"><a href="userController.php?controller=logout">Đăng xuất</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="row">
                        <div class="col-xs-12" id="customer_sidebar">
                            <p class="title-detail">Thông tin tài khoản</p>
                            <?php
                            if (isset($_SESSION['accountuser'])) {
                                $user = $_SESSION['accountuser'];
                                echo '  <h2 class="name_account">' . "Họ và tên: " . $user['lastname'] . " " . $user['firstname'] . '</h2> ';
                                echo '  <p class="email ">Email: ' . $user['email'] . '</p';
                                echo ' <div class="address ">';
                                echo '   <p></p>';
                                echo '   <p></p>';
                                echo '  <p> Địa chỉ: ' . $user['diachi'] . '</p>';
                                echo '  <p></p>';
                            }
                            ?>

                            <!-- <a id="view_address" href="/account/addresses">Xem địa chỉ</a> -->
                        </div>
                    </div>
                    <div class="col-xs-12 customer-table-wrap" id="customer_orders">
                        <div class="customer_order customer-table-bg">

                            <p class="title-detail">
                                Danh sách đơn hàng mới nhất
                            </p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="order_number text-center">Mã đơn hàng</th>
                                            <th class="date text-center">Ngày đặt</th>
                                            <th class="total text-right">Thành tiền</th>
                                            <th class="payment_status text-center">Trạng thái thanh toán</th>
                                            <th class="fulfillment_status text-center">Vận chuyển</th>
                                            <!-- <th class="return_item text-center">Trả hàng</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        if (isset($getbill)) {
                                            foreach ($getbill as $document) {
                                                echo '
                                            <tr class="odd ">
                                                <td class="text-center"><a href="userController.php?controller=billInfor&id=' . $document['_id'] . '" title="">#' . $document['_id'] . '</a></td>
                                                <td class="text-center"><span>' . $document['daybuy'] . '</span></td>
                                                <td class="text-right"><span class="total money">' . number_format($document['tongtien'], 0, '.', '.') . 'đ' . '</span></td>
                                                <td class="text-center"><span class="status_pending">' . $document['note'] . '</span></td>
                                                <td class="text-center"><span class="status_not fulfilled status_pending">
                                                    
                                                ' . $document['trangthai'] . '
                                                    </span>
                                                </td>
                                                <td>
                                                </td>
                                                <td class="text-center"><span class="status_pending"></span></td> 
                                            </tr>';
                                            }
                                        } else {
                                            echo ' <div class="col-xs-12 customer-table-wrap" id="customer_orders">
                        <div class="customer_order customer-table-bg">

                            <p>Bạn chưa đặt mua sản phẩm.</p>

                        </div>
                    </div>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
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