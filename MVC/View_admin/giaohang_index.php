<?php
include 'header_admin.php';
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="../css_admin/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../css_admin/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../css_admin/buttons.bootstrap4.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý tất cả hóa đơn</h1>
                </div>

            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin hóa đơn</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="/MVC/controller/adminController.php?controller=indexGiaoHangPOST">
                                <table id="example2" class="table table-bordered table-hover">

                                    <label style="padding-left: 25%; display: flex; align-items: center">Search:<input style="width: 50%;" id="searchname" name="searchname" type="search" class="form-control form-control-sm" placeholder="Tìm kiếm với email hoặc mã hóa đơn">
                                        <button class=" btn btn-navbar" type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                        <label style="padding-left: 20%">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                                Thêm đơn giao giao hàng
                                            </button>
                                            <section class="content" id="myForm">
                                                <!-- The Modal -->
                                                <div class="modal" id="myModal">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Đơn giao </h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <form method="post" action="adminController.php?controller=createGiaoHangPOST">
                                                                <!-- Modal body -->
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                    <label for="exampleInputPassword1">Mã đơn hàng</label> 
                                                                        <select class="form-control" id="madh" name="madh">
                                                                            <?php
                                                                            foreach ($result as $p) {
                                                                                echo '<option value="' . $p['madh'] . '">' . $p['madh'] . '</option>';
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">Nhân viên giao hàng</label> 
                                                                        <select class="form-control" id="manv" name="manv">
                                                                            <?php
                                                                            foreach ($e1 as $p) {
                                                                                echo '<option value="' . $p['manv'] . '">' . $p['tennv'] . '</option>';
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPassword1">Ngày phát hành</label> <input type="datetime-local" class="form-control" id="ngaygiao" name="ngaygiao" placeholder="Nhập mô tả ngày phát hành">
                                                                    </div>
                                                                    <div class="form-group" style="display: none;">
                                                                        <label for="exampleInputPassword1">Tình trạng</label> <input type="text" class="form-control" id="tinhtrang" name="tinhtrang" value="Chờ xử lý">
                                                                    </div>
                                                                </div>

                                                                <!-- Modal footer -->
                                                                <div class="card-footer">
                                                                    <button type="submit" id="myButton" class="btn btn-primary" >Thêm</button>
                                                                </div>
                                                            </from>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </label>
                                    </label>

                            </form>
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Mã giao hàng</th>
                                    <th style="text-align: center;">Mã đơn hàng</th>
                                    <th style="text-align: center;">Mã nhân viên</th>
                                    <th style="text-align: center;">Ngày giao</th>
                                    <th style="text-align: center;">Trạng thái</th>
                                    <th style="text-align: center;"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($re as $p) {
                                    echo '      <tr align="center"> ';
                                    echo '    <td>';
                                    echo '' . $p["magiao"] . '';
                                    echo '     </td>';
                                    echo '     <td>' . $p["madh"] . '';
                                    echo '        </td>';
                                    echo '     <td>';
                                    echo '     ' . $p["manv"] . '';
                                    echo '     </td>';
                                    echo '<td>' . $p["ngaygiao"] . '</td>';
                                    echo '     <td>' . $p["tinhtrang"] . ' </td>';
                                    echo '      <td>';
                                    if ($p["tinhtrang"] == 'Chờ xử lý')
                                        echo '        <a id=flowerid href="/MVC/controller/adminController.php?controller=GiaoHangInfor&id=' . $p['magiao'] . '&id1='.$p['madh'].'" class="btn btn-outline-warning">Duyệt đơn hàng</a>';
                                    else
                                        echo '<a style="margin-left:5px;" id=flowerid href="/MVC/controller/adminController.php?controller=GiaoHangInfor&id=' . $p['magiao'] . '&id1='.$p['madh'].'" class="btn btn-outline-info">Thông tin đơn hàng</a>';
                                    echo '   </tr>';
                                }
                                ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="text-align: center;">Mã giao hàng</th>
                                    <th style="text-align: center;">Mã đơn hàng</th>
                                    <th style="text-align: center;">Mã nhân viên</th>
                                    <th style="text-align: center;">Ngày giao</th>
                                    <th style="text-align: center;">Trạng thái</th>
                                    <th style="text-align: center;"></th>
                                </tr>
                            </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>
<!-- Bootstrap 4 -->


<!-- /.content -->


<?php
include 'footer_admin.php';
?>
<script src="../css_admin/jquery.dataTables.min.js"></script>
<script src="../css_admin/dataTables.bootstrap4.min.js"></script>
<script src="../css_admin/dataTables.responsive.min.js"></script>
<script src="../css_admin/responsive.bootstrap4.min.js"></script>
<script src="../css_admin/dataTables.buttons.min.js"></script>
<script src="../css_admin/buttons.bootstrap4.min.js"></script>
<script src="../css_admin/jszip.min.js"></script>
<script src="../css_admin/pdfmake.min.js"></script>
<script src="../css_admin/vfs_fonts.js"></script>
<script src="../css_adminbuttons.html5.min.js"></script>
<script src="../css_admin/buttons.print.min.js"></script>
<script src="../css_admin/buttons.colVis.min.js"></script>
<script>
    $(function() {

        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>