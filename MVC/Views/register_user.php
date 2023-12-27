<?php
include 'header.php';
?>
<main class="mainContent-theme ">
    <div class="layout-account">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-xs-12 wrapbox-heading-account">
                    <div class="header-page clearfix">
                        <h1>Tạo tài khoản</h1>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 wrapbox-content-account ">
                    <div class="userbox">
                        <form accept-charset="UTF-8"
                            action="/MVC/controller/userController.php?controller=registerUserPOST" id="create_customer"
                            method="post">
                            <input name="form_type" type="hidden" value="create_customer">
                            <input name="utf8" type="hidden" value="✓">
                            <?php 
                            if (isset($_SESSION['error_message'])) {
                                // Display the error message
                                echo '<div class="errors"><ul><li style=" color: red;">' . $_SESSION['error_message'] . '</li></ul></div>';
                                // Unset the error message
                                unset($_SESSION['error_message']);
                            }
                            ?>
                            <div id="form-last_name" class="clearfix large_form">
                                <label for="last_name" class="label icon-field"><i
                                        class="icon-login icon-user "></i></label>
                                <input required="" type="text" value="" name="lastname" placeholder="Họ" id="lastname"
                                    class="text" size="30">
                            </div>
                            <div id="form-first_name" class="clearfix large_form">
                                <label for="first_name" class="label icon-field"><i
                                        class="icon-login icon-user "></i></label>
                                <input required="" type="text" value="" name="firstname" placeholder="Tên"
                                    id="firstname" class="text" size="30">
                            </div>
                            <!-- <div id="form-gender" class="clearfix large_form">
                                <input id="radio1" type="radio" value="0" name="gender">
                                <label for="radio1">Nữ</label>
                                <input id="radio2" type="radio" value="1" name="gender">
                                <label for="radio2">Nam</label>
                            </div> -->
                            <div id="form-first_name" class="clearfix large_form">
                                <label for="address" class="label icon-field"><i
                                        class="icon-login icon-address "></i></label>
                                <input required="" type="text" value="" name="diachi" placeholder="Địa chỉ"
                                    id="diachi" class="text" size="30">
                            </div>
                            <div id="form-first_name" class="clearfix large_form">
                                <label for="phonenumber" class="label icon-field"><i
                                        class="icon-login icon-address "></i></label>
                                <input required="" type="text" value="" name="phonenumber" placeholder="Số điện thoại"
                                    id="phonenumber" class="text" size="30">
                            </div>
                            <div id="form-email" class="clearfix large_form">
                                <label for="email" class="label icon-field"><i
                                        class="icon-login icon-envelope "></i></label>
                                <input required="" type="email" value="" placeholder="Email" name="email" id="email"
                                    class="text" size="30">
                            </div>
                            <div id="form-password" class="clearfix large_form large_form-mr10">
                                <label for="password" class="label icon-field"><i
                                        class="icon-login icon-shield "></i></label>
                                <input required="" type="password" value="" placeholder="Mật khẩu" name="password"
                                    id="password" class="password text" size="30">
                            </div>
                            <!-- <div class="clearfix large_form sitebox-recaptcha">
                                This site is protected by reCAPTCHA and the Google
                                <a href="https://policies.google.com/privacy" target="_blank" rel="noreferrer">Privacy Policy</a>
                                and <a href="https://policies.google.com/terms" target="_blank" rel="noreferrer">Terms of Service</a> apply.
                            </div> -->
                            <div class="clearfix action_account_custommer">
                                <div class="action_bottom button dark">
                                    <input class="btn" type="submit" value="Đăng ký">
                                </div>
                            </div>
                            <div class="clearfix req_pass">
                                <a class="come-back" href="/MVC/controller/productController.php"><i
                                        class="fa fa-long-arrow-left"></i> Quay lại trang chủ</a>
                            </div>

                        </form>
                    </div>

                </div><!-- #register -->
                <!-- #customer-register -->
            </div>
        </div>
    </div>
</main>
<?php
include 'footer.php';
include 'sctript_indexjs.php';
?>