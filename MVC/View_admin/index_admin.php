<?php include 'header_admin.php'; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Trang chủ</h1>
        </div>

      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php
                  echo $countbilltoday;
                  ?><!-- <sup style="font-size: 20px">
										đơn</sup> -->
              </h3>

              <p>Đơn hàng mới hôm nay</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/MVC/controller/adminController.php?controller=billindex" class="small-box-footer">Xem thêm <i class="bi bi-arrow-right-circle"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>
                <?php
                echo $countbillwait;
                ?><!-- <sup style="font-size: 20px">
										tài khoản</sup> -->
              </h3>

              <p>Đơn hàng chờ xử lý</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/MVC/controller/adminController.php?controller=billwait" class="small-box-footer">Xem thêm <i class="bi bi-arrow-right-circle"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>
                <?php
                echo $countstock;
                ?><!-- <sup style="font-size: 20px"> Sản phẩm</sup> -->
              </h3>

              <p>Số lượng sản phẩm còn dưới 10 cái</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/MVC/controller/adminController.php?controller=indexProductGET" class="small-box-footer">Xem thêm <i class="bi bi-arrow-right-circle"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo number_format($sumbill, 0, ',', '.') . " VND" ?><!-- <sup
										style="font-size: 20px"> đơn</sup> -->
              </h3>

              <p>Tổng số doanh thu trong ngày</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="bi bi-basket2"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <!-- DONUT CHART -->
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Thống kê sản phẩm bán chạy</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="bi bi-award-fill"></i>
                </button>
                <!-- <button type="button" class="btn btn-tool"
										data-card-widget="remove">
										<i class="fas fa-times"></i>
									</button> -->
              </div>
            </div>
            <div class="card-body">
              <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
          <!-- Calendar -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Đơn hàng chờ xử lý</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Email</th>
                    <th>Số tiền</th>
                    <th style="width: 40px"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($get5bill as $p) {
                    echo ' 
                    <tr>
                    <td>'.$p['madh'].'</td>
                    <td>'.$p['email'].'</td>
                    <td>
                     '.number_format($p['tongtien'], 0, ',', '.') . " VND".'
                    </td>
                    <td>       <a style="margin-left:5px;" id=flowerid href="/MVC/controller/adminController.php?controller=BillInfor&id=' . $p['madh'] . '" class="btn btn-outline-info">i</a></td>
                  </tr>';
                  }
                  ?>


                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
      </div>
      <!-- /.card -->
  </section>
  <!-- right col -->
</div>

<!-- /.content-wrapper -->
<?php include 'footer_admin.php'; ?>
<?php
echo '<script>
var donutChartCanvas = $("#donutChart").get(0).getContext("2d")

var donutData = {
  labels: ["' . $_SESSION['topseller0'] . '", "' . $_SESSION['topseller1'] . '",
    "' . $_SESSION['topseller2'] . '", "' . $_SESSION['topseller3'] . '", "' . $_SESSION['topseller4'] . '"
  ],
  datasets: [{
    data: [' . $_SESSION['quantityseller0'] . ', ' . $_SESSION['quantityseller1'] . ', ' . $_SESSION['quantityseller2'] . ', 
    ' . $_SESSION['quantityseller3'] . ', ' . $_SESSION['quantityseller4'] . '],
    backgroundColor: ["#f56954", "#00a65a", "#f39c12", "#00c0ef", "#3c8dbc", "#d2d6de"],
  }]
}
var donutOptions = {
  maintainAspectRatio: false,
  responsive: true,
}
//Create pie or douhnut chart
// You can switch between pie and douhnut using the method below.
new Chart(donutChartCanvas, {
  type: "doughnut",
  data: donutData,
  options: donutOptions
})
</script>';
?>
