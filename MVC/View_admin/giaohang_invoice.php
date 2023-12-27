<?php
include 'header_admin.php';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Giao hàng</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">



                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">

                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            Tân Thoại
                            <address>
                                <strong></strong><br>
                                <br>
                                <br>
                                <br>

                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            Khách hàng
                            <address>
                                <strong>Email: <?php echo $inforbill['email'] ?></strong><br>
                               <!-- // <?php echo $inforbill['addressdelivery'] ?><br> -->

                                Số điện thoại: <?php echo $inforbill['phonenumber'] ?><br>

                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Hóa đơn #<?php echo $_GET['id'] ?></b><br>

                            <!-- <b>Mã hóa đơn: </b> <?php echo $_GET['mahd'] ?><br> -->
                            <b>Ngày đặt hàng: </b> <?php echo $inforbill['daybuy'] ?><br>

                            <b>Tổng tiền: </b><?php echo number_format($inforbill["tongtien"], 0, ',', '.') . " VND"; ?><br>
                            <b>Trạng thái: </b><?php echo $inforbill['trangthai'] ?>
                            <!-- <b>Account:</b> 968-34567 -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên nhân viên giao hàng</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                        echo '  <tr>';
                                        echo '<td>' . $inforbill['madh'] . '</td>';
                                        echo '<td>' . $infornv['tennv'] . '</td>';
                                        echo '<td>' . $inforgh['tinhtrang'] . '</td>';
                                    // foreach ($inforbilldetail as $i) {
                                    //     echo '  <tr>
                                    //             <td>' . $i['masanp'] . '</td>
                                    //             <td>' . $i['ten'] . '</td>';
                                    //     $callproductSer = new productService();
                                    //     echo ' <td><image style=" height: 12vw;width: 30vh;" src="' . $callproductSer->findOneImageId($i['masanp']) . '"></image></td>';

                                    //     echo ' <td>' . $i['Quantity'] . '</td>
                                    //             <td>' . number_format($i["gia"], 0, ',', '.') . " VND" . '</td>
                                    //             <td>' . number_format($i["gia"] * $i['Quantity'], 0, ',', '.') . " VND" . '</td>
                                    //             </tr>';
                                    // }
                                    ?>


                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                            <p class="lead"></p>


                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ
                                ㅤㅤㅤ
                                ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ
                            </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">


                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Tổng tiền:</th>
                                        <td><?php echo number_format($inforbill["tongtien"], 0, ',', '.') . " VND"; ?></td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <?php
                            if ($inforgh['tinhtrang'] == 'Chờ xử lý') {
                                echo ' <a href="/MVC/controller/adminController.php?controller=acceptGiaoHang&id=' . $_GET['id'] . '&id1='. $_GET['id1'].'">
                                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Xác nhận đơn hàng
                                </button></a>';
                                echo ' <a href="/MVC/controller/adminController.php?controller=denyGiaoHang&id=' . $_GET['id'] . '&id1='. $_GET['id1'].'">
                                <button type="button" class="btn btn-warning float-right" style="margin-right: 5px;">
                                    <i class="fas fa-destroy"></i> Hủy đơn hàng
                                </button>
                                </a>';
                            }
                            else {
                                echo ' <a href="adminController.php?controller=ghIndex">
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-infor"></i> Trở về
                                </button>
                                </a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<?php
include 'footer_admin.php';
?>
