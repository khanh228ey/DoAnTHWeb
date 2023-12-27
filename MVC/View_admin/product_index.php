<?php
include 'header_admin.php';

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="../css_admin/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../css_admin/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../css_admin/buttons.bootstrap4.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý danh sách sản phẩm</h1>
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
                            <h3 class="card-title">Thông tin sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="/MVC/controller/adminController.php?controller=indexProductPOST">
                                <table id="example2" class="table table-bordered table-hover">

                                    <label style="padding-left: 25%; display: flex; align-items: center">Search:<input style="width: 50%;" id="searchname" name="searchname" type="search" class="form-control form-control-sm" placeholder="search with name product">
                                        <button class=" btn btn-navbar" type="submit">
                                        <i class="bi bi-search"></i>
                                        </button>
                                        
                                    </label>
                            </form>
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Mã sản phẩm</th>
                                    <th style="text-align: center;">Hình ảnh</th>
                                    <th style="text-align: center;">Tên sản phẩm</th>
                                    <th style="text-align: center;">Giá</th>
                                    <th style="text-align: center;">Số lượng còn</th>
                                    <th style="text-align: center;">Series</th>
                                    <th style="text-align: center;"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($result as $p) {
                                    echo '      <tr align="center"> ';
                                    echo '    <td>';
                                    echo '' . $p["masp"] . '';
                                    echo '     </td>';
                                    echo '     <td><img style="width: 20vw; height: 20vh;" src="' . $adminc->productService->findOneImageId($p['masp']) . '" alt=""';
                                    echo '         class="img-fluid w-100"></td>';
                                    echo '     <td>';
                                    echo '     ' . $p["tensp"] . '';
                                    echo '     </td>';
                                    echo '    <td><span>';
                                    echo  number_format($p["gia"], 0, ',', '.') . " VND";
                                    echo '          </span></td>';
                                    echo '     <td>';
                                    echo '         ' . $p["soluong"] . '';
                                    echo '     </td>';
                                    echo '     <td>' . $p["maloaisp"] . ' </td>';
                                    echo '      <td>';
                                    echo '        <a id=flowerid href="/MVC/controller/adminController.php?controller=updateProductGET&id=' . $p['masp'] . '" class="btn btn-warning">Update</a> |';
                                    echo '          <a id=flowerid href="/MVC/controller/adminController.php?controller=deleteProductGET&id=' . $p['masp'] . '" class="btn btn-danger">Delete</a>';
                                    echo '   </tr>';
                                }
                                ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="text-align: center;">Mã sản phẩm</th>
                                    <th style="text-align: center;">Hình ảnh</th>
                                    <th style="text-align: center;">Tên sản phẩm</th>
                                    <th style="text-align: center;">Giá</th>
                                    <th style="text-align: center;">Số lượng còn</th>
                                    <th style="text-align: center;">Series</th>
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