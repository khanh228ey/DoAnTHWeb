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
                        <form method="post" action="adminController.php?controller=indexProducerGET">
                            <div class="card-footer">
                                <button type="submit" id="" class="btn btn-primary">Back</button>
                            </div>
                        </form>
                        <form method="post" action="adminController.php?controller=deleteProducerPOST">
                            <div class="card-body">
                                <div class="form-group" style="display: none;">
                                    <label for="exampleInputEmail1">Mã nhà sản xuất</label> <input type="text" class="form-control" id="manhasx" name="manhasx" value="<?php echo $re['manhasx']; ?>" placeholder="Nhập sản phẩm">
                                </div>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center;">Mã nhà sản xuất</th>
                                        <th style="text-align: center;">Tên nhà sản xuất</th>
                                        <th style="text-align: center;">Số điện thoại</th>
                                        
                                    </tr>
                            </thead>
                             
                                <tbody>
                                    <?php
                                    echo '      <tr align="center"> ';
                                    echo '    <td>';
                                    echo '' . $re["manhasx"] . '</td><br>';
                                    echo '     </td>';
                                    echo '     <td>';
                                    echo '     ' . $re["tennhasx"] . '';
                                    echo '     </td>';
                                    echo '     <td>';
                                    echo '' . $re["sdt"] . '';
                                    echo '     </td>';
                                    echo '   </tr>';

                                    ?>
                                </tbody>
                            </div>
                            <tfoot>
                                <tr>
                                <th style="text-align: center;">Mã nhà sản xuất</th>
                                    <th style="text-align: center;">Tên nhà sản xuất</th>
                                    <th style="text-align: center;">Số điện thoại</th>
                                </tr>
                            </tfoot>
                            
                            </table>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" id="manhasx" class="btn btn-danger">Delete</button>
                            </div>
                        </form>



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