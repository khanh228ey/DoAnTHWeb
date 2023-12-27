<?php
include 'header_admin.php';
require_once('../model/LoaiSPService.php');
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="../css_admin/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../css_admin/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../css_admin/buttons.bootstrap4.min.css">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý danh sách loại sản phẩm</h1>
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
                            <h3 class="card-title">Thông tin loại sản phẩm</h3>

                            <div class="modal" tabindex="-1">

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form method="post" action="/MVC/controller/adminController.php?controller=indexLoaiSPPOST">

                                    <table id="example2" class="table table-bordered table-hover">

                                        <label style="padding-left: 25%; display: flex; align-items: center">Search:<input style="width: 50%;" id="searchname" name="searchname" type="search" class="form-control form-control-sm" placeholder="search with name product">

                                            <button class=" btn btn-navbar" type="submit">
                                                <i class="bi bi-search"></i>
                                            </button>
                                            <label style="padding-left: 20%">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                                    Thêm loại sản phẩm
                                                </button>
                                                <section class="content" id="myForm">
                                                    <!-- The Modal -->
                                                    <div class="modal" id="myModal">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">

                                                                <!-- Modal Header -->
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Loại sản phẩm</h4>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <form method="post" action="adminController.php?controller=createLoaiSPPOST">
                                                                    <!-- Modal body -->
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Tên loại sản xuất</label> <input type="text" class="form-control" id="tenloai" name="tenloai" placeholder="Nhập tên loại sản phẩm">
                                                                        </div>
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="card-footer">
                                                                        <button type="submit" id="myButton" class="btn btn-primary" disabled>Thêm</button>
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
                                        <th style="text-align: center;">Mã loại sản phẩm</th>
                                        <th style="text-align: center;">Tên loại sản xuất</th>
                                        <th style="text-align: center;"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($re as $e) {
                                        echo '      <tr align="center"> ';
                                        echo '    <td>';
                                        echo '' . $e["maloaisp"] . '';
                                        echo '     </td>';
                                        echo '     <td>';
                                        echo '     ' . $e["tenloai"] . '';
                                        echo '     </td>';
                                        echo '      <td>';
                                        echo '        <a id=flowerid href="/MVC/controller/adminController.php?controller=updateLSPGET&id=' . $e['maloaisp'] . '" class="btn btn-warning">Update</a> |';
                                        echo '        <a id=flowerid href="/MVC/controller/adminController.php?controller=deleteLSPGET&id=' . $e['maloaisp'] . '" class="btn btn-danger">Delete</a>';
                                        echo '   </tr>';
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="text-align: center;">Mã loại sản phẩm</th>
                                        <th style="text-align: center;">Tên loại sản xuất</th>
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

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('myForm');
        const inputField1 = document.getElementById('tenloai');
        const submitButton = document.getElementById('myButton');

        // Kiểm tra trạng thái của các trường khi người dùng nhập dữ liệu
        form.addEventListener('input', function() {
            if (inputField1.value.trim() !== '') {
                submitButton.removeAttribute('disabled'); // Nếu có dữ liệu, kích hoạt button
            } else {
                submitButton.setAttribute('disabled', 'disabled'); // Nếu không có dữ liệu, vô hiệu hóa button
            }
        });
    });
</script>
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
    document.getElementById('openPopup').addEventListener('click', function() {
        var myModal = new bootstrap.Modal(document.getElementById('myModal'));
        myModal.show();
    });
</script>