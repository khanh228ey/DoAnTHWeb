<?php include 'header_admin.php'; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Bảng nhà sản xuất</h1>
				</div>

			</div>
		</div>
		<!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content" id="myForm">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-20" style="width: 100%;">
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Nhập nhà sản xuất mới</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form method="post" action="adminController.php?controller=createProducerPOST">
							<div class="card-body">
								<div class="form-group">
									<label for="exampleInputEmail1">Tên nhà sản xuất</label> <input type="text" class="form-control" id="tennhasx" name="tennhasx" placeholder="Nhập nhà sản xuất">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Số điện thoại</label> <input type="text" class="form-control" id="sdt" name="sdt" placeholder="Nhập số điện thoại">
								</div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="submit" id="myButton" class="btn btn-primary" disabled>Thêm sản phẩm</button>
							</div>
						</form>
					</div>
					<!-- /.card -->

				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('myForm');
        const inputField1 = document.getElementById('tennhasx');
        const inputField2 = document.getElementById('sdt');
        const submitButton = document.getElementById('myButton');

        // Kiểm tra trạng thái của các trường khi người dùng nhập dữ liệu
        form.addEventListener('input', function() {
            if (inputField1.value.trim() !== '' && inputField2.value.trim() !== '') {
                submitButton.removeAttribute('disabled'); // Nếu có dữ liệu, kích hoạt button
            } else {
                submitButton.setAttribute('disabled', 'disabled'); // Nếu không có dữ liệu, vô hiệu hóa button
            }
        });
    });
</script>
<?php include 'footer_admin.php'; ?>
