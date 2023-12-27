<?php
include 'header_admin.php';
require_once('../model/NhasxService.php');
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
                    <h1>Quản lý danh sách nhà sản xuất</h1>
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
                            <h3 class="card-title">Thông tin nhà sản xuất</h3>
                        </div>
                        <form method="post" action="adminController.php?controller=indexProductGET">
                            <div class="card-footer">
                                <button type="submit" id="" class="btn btn-primary">Back</button>
                            </div>
                        </form>
                        <!-- /.card-header -->
                        <form method="post" action="adminController.php?controller=deleteProductPOST">
                        <div class="card-body">
                                <div class="form-group" style="display: none;">
                                    <label for="exampleInputEmail1">Mã nhà sản xuất</label> <input type="text" class="form-control" id="masp" name="masp" value="<?php echo $result['masp']; ?>" placeholder="Nhập sản phẩm">
                                </div>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Mã sản phẩm</th>
                                        <th style="text-align: center;">Hình ảnh</th>
                                        <th style="text-align: center;">Tên sản phẩm</th>
                                        <th style="text-align: center;">Giá</th>
                                        <th style="text-align: center;">Số lượng còn</th>
                                        <th style="text-align: center;">Series</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        echo '      <tr align="center"> ';
                                        echo '    <td>';
                                        echo '' . $result["masp"] . '';
                                        echo '     </td>';
                                        echo '     <td><img style="width: 20vw; height: 20vh;" src="' . $adminc->productService->findOneImageId($result['masp']) . '" alt=""';
                                        echo '         class="img-fluid w-100"></td>';
                                        echo '     <td>';
                                        echo '     ' . $result["tensp"] . '';
                                        echo '     </td>';
                                        echo '    <td><span>';
                                        echo  number_format($result["gia"], 0, ',', '.') . " VND";
                                        echo '          </span></td>';
                                        echo '     <td>';
                                        echo '         ' . $result["soluong"] . '';
                                        echo '     </td>';
                                        echo '     <td>' . $result["maloaisp"] . ' </td>';
                                        echo '      <td>';
                                        echo '   </tr>';
                                    ?>
                                </tbody>
                        </div>
                        <tfoot>
                            <tr>
                                        <th style="text-align: center;">Mã sản phẩm</th>
                                        <th style="text-align: center;">Hình ảnh</th>
                                        <th style="text-align: center;">Tên sản phẩm</th>
                                        <th style="text-align: center;">Giá</th>
                                        <th style="text-align: center;">Số lượng còn</th>
                                        <th style="text-align: center;">Series</th>
                            </tr>
                        </tfoot>

                        </table>
                        <div class="card-footer" style=display:flex>
                            <div>
                                
                                    <button type="submit" id="masp" class="btn btn-danger">Delete</button>
                          
                            </div>
                        </div>
                        </form>
                    </div>




                    <!-- /.card-body -->


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

</style>
<!-- <script src="../css_admin/jquery.dataTables.min.js"></script> -->
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