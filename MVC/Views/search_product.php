<?php include 'header.php'; ?>
<main class="mainContent-theme ">
    <div class="searchPage" id="layout-search">
        <div class="container-fluid">
            <div class="row pd-page">
                <div class="col-md-12 col-xs-12">
                    <div class="heading-page">
                        <h1>Tìm kiếm</h1>
                        <!-- <p class="subtxt">Có <span><?php echo $count ?> sản phẩm</span> cho tìm kiếm</p> -->
                    </div>
                    <div class="wrapbox-content-page">
                        <div class="content-page" id="search">
                            <p class="subtext-result"> Kết quả tìm kiếm cho <strong>"<?php echo $searchcontent ?>"</strong>. </p>

                            <div class="results content-product-list ">
                                <div class=" search-list-results row">
                                    <!-- Begin results -->

                                    <?php
                                    // print_r($searchcontent);
                                    if (isset($result_search)) {
                                        foreach ($result_search  as $itemcart) {
                                            echo ' <div class="col-md-3 col-sm-6 col-xs-6 pro-loop">

                                            <div class="product-block product-resize fixheight" id="searchpr_loop_1" style="height: 436px;">
                                                <div class="product-img">';
                                            if ((int)$itemcart['soluong'] == (int)0) {
                                                echo '   <div class="product-order">Pre-Order</div>';
                                            } else echo '   <div class="product-order">Order</div>';
                                            $callproductService = new productService();
                                            $result_images  = $callproductService->findOneImageIdProductIdSort($itemcart['masp']);
                                            echo '<a href="/MVC/controller/productController.php?controller=productDetailId&value=' . $itemcart['masp'] . '" title="' . $itemcart['tensp'] . '" data-expand="-1" style="height: 313px;">';

                                            $callproductService = new productService();
                                            $result_images  = $callproductService->findOneImageIdProductIdSort($itemcart['masp']);
                                            foreach ($result_images as $item) {
                                                if (!empty($item))
                                                    if ($item['mahinh'] == "1") {
                                                        echo ' 
                                                        <picture>
                                                            <img class="img-loop lazyautosizes lazyloaded" data-sizes="auto" data-src="' . $item['Image'] . '" data-lowsrc="' . $item['Image'] . '" src="' . $item['Image'] . '" alt=" ' . $itemcart['tensp'] . ' " sizes="196px">
                                                        </picture>  ';
                                                    }
                                                if ($item['mahinh'] == "2") {
                                                    echo '   <picture>
                                                            <img class="img-loop img-hover ls-is-cached lazyloaded" data-src="' . $item['Image'] . '" src="' . $item['Image'] . '" alt="' . $itemcart['tensp'] . '">
                                                        </picture> ';
                                                }
                                            }

                                            echo ' </a> <div class="button-add hidden">
                                                        <button type="submit" title="Buy now" class="action" >Mua ngay<i class="fa fa-long-arrow-right"></i></button>
                                                    </div>
                                                    <div class="pro-price-mb">
                                                        <span class="pro-price">' . number_format($itemcart["gia"], 0, '.', '.') . 'đ' . '</span>
                                                    </div>
                                                </div>
                                                <div class="product-detail clearfix">
                                                    <div class="box-pro-detail">
                                                        <h3 class="pro-name">
                                                            <a href="/MVC/controller/productController.php?controller=productDetailId&value=' . $itemcart['masp'] . '" title="' . $itemcart['tensp'] . '">
                                                            ' . $itemcart['tensp'] . '
                                                            </a>
                                                        </h3>
                                                        <div class="box-pro-prices">
                                                            <p class="pro-price ">
                                                                <span>' . number_format($itemcart["gia"], 0, '.', '.') . 'đ' . '</span>
                                                            </p>
                                                        </div>
                                                        <div class="product-actions">
                                                        <form accept-charset="UTF-8" action="/MVC/controller/productController.php?controller=addProductCartPOST&id=' . $itemcart['masp'] . '"  method="post">
                                                            <button type="submit" data-product-id="' . $itemcart['masp'] . '"  class="proLoop-addtocart btn-addcart" id="btn-addcart">
                                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="24.000000pt" height="24.000000pt" viewBox="0 0 24.000000 24.000000" preserveAspectRatio="xMidYMid meet">
                                                                    <g transform="translate(0.000000,24.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                                                        <path d="M63 194 c-9 -14 -27 -30 -40 -35 -22 -8 -32 -44 -14 -51 4 -1 15 -23 23 -48 l15 -45 73 0 73 0 15 45 c8 25 19 47 24 48 17 7 7 43 -15 51 -13 5 -31 21 -40 35 -10 14 -22 26 -28 26 -6 0 -1 -12 11 -27 l22 -28 -31 -3 c-17 -2 -45 -2 -62 0 l-31 3 22 28 c12 15 17 27 11 27 -6 0 -18 -12 -28 -26z m114 -61 c-31 -2 -83 -2 -115 0 -31 2 -5 3 58 3 63 0 89 -1 57 -3z m21 -63 l-10 -40 -68 0 -68 0 -10 40 -10 40 88 0 88 0 -10 -40z"></path>
                                                                        <path d="M71 78 c-1 -16 4 -28 9 -28 12 0 12 8 0 35 -8 18 -9 17 -9 -7z"></path>
                                                                        <path d="M158 80 c-7 -24 -3 -38 8 -28 3 4 4 17 2 30 l-3 23 -7 -25z"></path>
                                                                        <path d="M110 70 c0 -11 5 -20 10 -20 6 0 10 9 10 20 0 11 -4 20 -10 20 -5 0 -10 -9 -10 -20z"></path>
                                                                    </g>
                                                                </svg>
                                                                <span>Thêm vào giỏ hàng</span>
                                                            </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                        }
                                    }
                                    ?>

                                </div>
                            </div> <!-- End results -->
                            <div class="row pagination-theme clearfix text-center">
                                <div id="pagination" class="clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <?php
                                        for ($i = 1; $i <= $total_pages; $i++) {
                                            echo '
                                        
                                        <a class="page-node" href="/MVC/controller/productController.php?searchproduct=' . $searchcontent . '&page=' . $i . '">' . $i . '</a>
                                    
                                ';
                                            //  echo "<a href='?page=" . $i . "&search=" . $searchcontent . "'>" . $i . "</a> ";
                                        }

                                        // <a class="page-node" href="/search?type=product&amp;q=a&amp;page=3">3</a>
                                        // <span class="page-node ">…</span>
                                        // <a class="page-node" href="/search?type=product&amp;q=a&amp;page=9">9</a>
                                        // <a class="next" href="/search?type=product&amp;q=a&amp;page=2">
                                        //     <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 31 10" style="enable-background:new 0 0 31 10; width: 31px; height: 10px;" xml:space="preserve">
                                        //         <polygon points="31,5 25,0 25,4 0,4 0,6 25,6 25,10 "></polygon>
                                        //     </svg> </a>
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // var addToCartBtn = $("#btn-addcart");
        // addToCartBtn.on("click", function() {
        //     // Send an AJAX GET request
        //     var productId = $(this).data('product-id');
        //     $.ajax({
        //         url: 'productController.php?controller=index',
        //         data: {

        //         },
        //         type: 'POST',
        //         success: function(response) {
        //             alert("hmm"+productId);
        //             //location.reload(); //reload page after successful update
        //         },
        //         error: function(jqXHR, textStatus, errorThrown) {
        //             console.log(textStatus, errorThrown);
        //             alert('An error occurred while updating cart.');
        //         }
        //     });
        // });



        // $(document).on('change', '.btn-addcart', function(e) {
        //     e.preventDefault();
        //     // var productId = $(this).data('product-id');
        //     // var quantity = $(this).val();

        //     // alert(productId + quantity);
        //     $.ajax({
        //         url: 'productController.php?controller=index',
        //         data: {

        //         },
        //         type: 'POST',
        //         success: function(response) {
        //             alert("hehe");
        //             //location.reload(); //reload page after successful update
        //         },
        //         error: function(jqXHR, textStatus, errorThrown) {
        //             console.log(textStatus, errorThrown);
        //             alert('An error occurred while updating cart.');
        //         }
        //     });
        // });
        $('form.search-page').submit(function(e) {
            e.preventDefault();
            var q = $(this).find('input[type="text"]').val();
            if (q.indexOf('script') > -1 || q.indexOf('>') > -1) {
                alert("Key word của bạn có chứa mã độc hại");
                $(this).find('input[type="text"]').val('');
            } else {
                // window.location.href = "/search?type=product&q=" + $('input.search_box').val();
            }
        })
    </script>

</main>
<?php //fotter page here --
include 'footer.php';

?>
<?php include 'sctript_indexjs.php'; ?>
