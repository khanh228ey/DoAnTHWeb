<?php
include 'header.php';
?>
<div id="product" class="productDetail-page 0_ size_aonam ">

    <div class="product-detail-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php
                    echo ' <div class="row product-detail-main pr_style_03"> ';
                    echo ' <div class="col-md-5 col-sm-12 col-xs-12 product-content-img"> ';

                    echo ' <div class="product-gallery"> ';
                    echo ' <div class="product-gallery__thumbs-container hidden-sm hidden-xs"> ';
                    echo ' <div class="product-gallery__thumbs thumb-fix"> ';
                    $callproductService = new ProductService();
                    $result_images  = $callproductService->findOneImageIdProductIdSort($result_productId['masp']);
                   // $counthidden = 0;
                    foreach ($result_images as $item) {
                        if (!empty($item)) {
                           // $count ++;
                            echo ' <div class="product-gallery__thumb"> ';
                            echo ' <a class="product-gallery__thumb-placeholder" rel="nofollow" href="javascript:" data-image="' . $callproductService->findOneImageIdProduct($result_productId['masp']) . '" data-zoom-image="' . $callproductService->findOneImageIdProduct($result_productId['masp']) . '"> ';
                            //img

                            echo ' <img alt=" ' . $result_productId["tensp"] . ' " data-image="' . $item['Image'] . '" src="' . $item['Image'] . '"> ';

                            echo ' </a> ';
                            echo ' </div> ';
                        }
                    }
                  //  echo '<input data-counthidden ="' . $count . '"/>';
                    echo ' </div> ';
                    echo ' </div> ';
                    echo ' <div class="product-image-detail box__product-gallery scroll"> ';
                    echo ' <ul id="sliderproduct" class="site-box-content slide_product clearfix hidden-lg hidden-md"> ';

                    echo ' <li class="product-gallery-item gallery-item current"> ';
                    echo ' <img class="product-image-feature" src="' . $callproductService->findOneImageIdProduct($result_productId['masp']) . '" alt=" ' . $result_productId["tensp"] . '"> ';
                    echo ' </li> ';

                    echo ' </ul> ';
                    echo ' <div class="hidden-sm hidden-xs"> ';
                    //img
                    echo ' <img class="product-image-feature" src="' . $callproductService->findOneImageIdProduct($result_productId['masp']) . '" alt=" ' . $result_productId["tensp"] . ' "> ';

                    echo ' </div> ';

                    echo ' </div> ';
                    echo ' </div> ';

                    echo ' </div> ';
                    echo ' <div class="col-md-7 col-sm-12 col-xs-12 product-content-desc" id="detail-product"> ';
                    echo ' <div class="product-title"> ';
                    echo ' <h1> ' . $result_productId["tensp"] . ' </h1> ';
                    echo ' </div> ';
                    echo ' <div class="product-price" id="price-preview"> ';
                    echo ' <span class="pro-price">  ' . number_format($result_productId["gia"], 0, '.', '.') . 'đ' . '  </span> ';
                    echo '                        <span class ="pri"'.$itemcart['maloaisp'].'</span>';
                    echo'</div> ';
     
                    echo ' <form id="add-item-form" action="/MVC/controller/productController.php?controller=addProductCartPOST&id='.$result_productId['masp'].'" method="post" class="variants clearfix"> ';
                    echo ' <div class="selector-actions"> ';
                    echo ' <div class="module-wrap-sizes"> ';
                    echo ' <div class="box-item"> ';
                    echo ' <div class="quantity-area clearfix"> ';
                    echo ' <input type="button" value="-" onclick="minusQuantity()" class="qty-btn"> ';
                    echo ' <input type="text" id="quantity" name="quantity" value="1" min="1" class="quantity-selector"> ';
                    echo ' <input type="button" value="+" onclick="plusQuantity()" class="qty-btn"> ';
                    echo ' </div> ';
                    echo ' </div> ';
                    echo ' </div> ';


                    echo ' <div class="wrap-addcart clearfix"> ';

                    echo ' <div class="block-chat-desktop"> ';
                    echo ' <a href="https://www.facebook.com/messages/t/105589525788167"> ';
                    echo ' <img src="https://file.hstatic.net/200000421115/file/icon_chat_mobile_eb01fde55e2640609f1ada9adf965f7f.png" alt="chat"> ';
                    echo ' Chat ngay';
                    echo ' </a> ';
                    echo ' </div> ';


                    //button buy
                    echo ' <button type="submit" id="add-to-cart" class="add-to-cartProduct button dark btn-addtocart addtocart-modal" name="add"> Thêm vào giỏ  </button> ';
                    echo ' <button type="submit" id="buy-now" class="add-to-cartProduct button dark btn-addtocart addtocart-modal hidden" name="add" style="display: inline-block;"> Mua ngay  </button> ';
                    echo ' </div> ';
                    echo ' </div> ';


                    echo ' <div class="product-action-bottom visible-xs"> ';
                    echo ' <div class="input-bottom"> ';
                    echo ' <input id="quan-input" type="number" value="1" min="1"> ';
                    echo ' </div> ';
                    echo ' <button type="button" id="add-to-cartbottom" class="add-to-cartProduct add-cart-bottom button dark addtocart-modal" name="add"> Thêm vào giỏ  </button> ';
                    echo ' </div> ';
                    echo ' </form> ';

                    echo ' <div class="product-description"> ';
                    echo ' <div class="title-bl"> ';
                    echo ' <h2> Mô tả </h2> ';
                    echo ' </div> ';
                    echo ' <div class="description-content"> ';
                    echo ' <div class="description-productdetail">';
                    echo ' <h2>';
                    echo '  <strong>';
                    echo ' <u>THÔNG TIN SẢN PHẨM</u>';
                    echo '  </strong>';
                    echo ' </h2>';
                    echo ' <table border="1" cellspacing="1" cellpadding="1" style="width:100%">';
                    echo '   <tbody>';
                    echo '      <tr>';
                    echo '          <td>';
                    echo '              <h3><strong><span style="color:#6600ff">Tên sản phẩm</span></strong></h3>';
                    echo '           </td>';
                    echo '          <td>';
                    echo '                <h3><strong>' . $result_productId["tensp"] . '</strong></h3>';
                    echo '           </td>';
                    echo '       </tr>';
                    echo '       <tr>';
                    echo '          <td>';
                    echo '             <h3><strong><span style="color:#6600ff">Loại sản phẩm</span></strong></h3>';
                    echo '          </td>';
                    echo '         <td>';
                    echo '            <h3><strong>' . $result_productId["maloaisp"] . '&nbsp;</strong></h3>';
                    echo '         </td>';
                    echo '     </tr>';
                    echo '     <tr>';
                    echo '          <td>';
                    echo '              <h3><strong><span style="color:#6600ff">Hãng sản xuất</span></strong></h3>';
                    echo '   </td>';
                    echo '   <td>';
                    echo '      <h3><strong> ' . $result_productId["manhasx"] . ' </strong></h3>';
                    echo '  </td>';
                    echo ' </tr>';
                    echo '  <tr>';
                    echo '    <td>';
                    echo '        <h3><strong><span style="color:#6600ff">Note</span></strong></h3>';
                    echo '   </td>';
                    echo '    <td>';
                    echo '        <h3><strong>' . $result_productId["note"] . '</strong></h3>';
                    echo '     </td>';
                    echo '  </tr>';
                    echo '   <tr>';
                    echo '    <td>';
                    echo '        <h3><strong><span style="color:#6600ff">Mô tả chi tiết tình trạng</span></strong></h3>';
                    echo '     </td>';
                    echo '     <td>';
                    echo '       <h3><strong>' . $result_productId["ttsp"] . '</strong></h3>';
                    echo '     </td>';
                    echo '   </tr>';
                    echo '   </tbody>';
                    echo '  </table>';
                    echo '  </div>';
                    echo ' <div> ';
                    // $result_imagesall  = $callproductService->findOneImageIdProductIdSort($result_productId['masp']);
                    // foreach ($result_imagesall as $items) {
                    //     if (!empty($items)) {
                    //         echo ' <img src="' . $items['Image'] . '"> ';
                    //     }
                    // }
                    echo ' </div> ';
                    echo ' </div> ';
                    echo ' </div> ';
                    echo ' </div> ';
                    echo ' </div> ';
                    echo ' </div> ';
                    ?>




                
                    <div class="list-productRelated clearfix">
                        <div class="heading-title text-center">
                            <h2>Sản phẩm liên quan</h2>
                        </div>
                        <div class="content-product-list row">
                            <?php
                            foreach ($callproductService->GetSeries($result_productId['maloaisp']) as $seri) {
                                if ($seri['masp'] != $result_productId['masp']) {
                                    echo ' <div class="col-md-4 col-sm-6 col-xs-6 pro-loop"> ';
                                    echo '  <div class="product-block product-resize fixheight" id="related_prod_loop_1" style="height: 322px;">';
                                    echo '      <div class="product-img">';
                                    if ((int)$seri['soluong'] == (int)0) {
                                        echo '          <div class="product-order">Pre-order</div>';
                                    }
                                    echo '           <a href="/MVC/controller/productController.php?controller=productDetailId&value=' . $seri['masp'] . '" title="' . $seri['tensp'] . '" class="image-resize ratiobox lazyloaded" data-expand="-1" style="height: 199px;">';
                                    foreach ($callproductService->findOneImageIdProductIdSort($seri['masp']) as $imgseri) {
                                        if (!empty($imgseri))
                                            if ($imgseri['mahinh'] == "1") {
                                                echo '               <picture>';
                                                echo '                    <img class="img-loop lazyautosizes ls-is-cached lazyloaded" data-sizes="auto" data-src="' . $imgseri['Image'] . '" data-lowsrc="' . $imgseri['Image'] . '" src="' . $imgseri['Image'] . '" alt=" ' . $seri['tensp'] . ' " sizes="199px">';
                                                echo '               </picture>';
                                            }
                                        if ($imgseri['mahinh'] == "2") {
                                            echo '               <picture>';
                                            echo '                   <img class="img-loop img-hover lazyloaded" data-src="' . $imgseri['Image'] . '" src="' . $imgseri['Image'] . '" alt=" ' . $seri['tensp'] . ' ">';
                                            echo '            </picture>';
                                        }
                                    }
                                    echo '          </a>';
                                    echo '         <div class="button-add hidden">';
                                    echo '            <button type="submit" title="Buy now" class="action">Mua ngay<i class="fa fa-long-arrow-right"></i></button>';
                                    echo '          </div>';
                                    echo '           <div class="pro-price-mb">';
                                    echo '               <span class="pro-price"> ' . number_format($seri['gia'], 0, '.', '.') . 'đ' . '</span>';
                                    echo '          </div>';
                                    echo '     </div>';
                                    echo '      <div class="product-detail clearfix">';
                                    echo '            <div class="box-pro-detail">';
                                    echo '               <h3 class="pro-name">';
                                    echo '                  <a href="/MVC/controller/productController.php?controller=productDetailId&value=' . $seri['masp'] . '" title="' . $seri['tensp'] . '">';
                                    echo '                      ' . $seri['tensp'] . ' ';
                                    echo '                  </a>';
                                    echo '              </h3>'; 
                                    echo '              <div class="box-pro-prices">';
                                    echo '                 <p class="pro-price ">';
                                    echo '                    <span>' . number_format($seri['gia'], 0, '.', '.') . 'đ' . '</span>';
                                    echo '                   </p>';
                                    echo '               </div>';
                                    echo '               <div class="product-actions">';
                                    echo '<form accept-charset="UTF-8" action="/MVC/controller/productController.php?controller=addProductCartPOST&id='.$seri['masp'].'"  method="post">';
                                    echo '                 <button class="proLoop-addtocart" >';
                                    echo '                     <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="24.000000pt" height="24.000000pt" viewBox="0 0 24.000000 24.000000" preserveAspectRatio="xMidYMid meet">';
                                    echo '                          <g transform="translate(0.000000,24.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">';
                                    echo '                             <path d="M63 194 c-9 -14 -27 -30 -40 -35 -22 -8 -32 -44 -14 -51 4 -1 15 -23 23 -48 l15 -45 73 0 73 0 15 45 c8 25 19 47 24 48 17 7 7 43 -15 51 -13 5 -31 21 -40 35 -10 14 -22 26 -28 26 -6 0 -1 -12 11 -27 l22 -28 -31 -3 c-17 -2 -45 -2 -62 0 l-31 3 22 28 c12 15 17 27 11 27 -6 0 -18 -12 -28 -26z m114 -61 c-31 -2 -83 -2 -115 0 -31 2 -5 3 58 3 63 0 89 -1 57 -3z m21 -63 l-10 -40 -68 0 -68 0 -10 40 -10 40 88 0 88 0 -10 -40z"></path>';
                                    echo '                               <path d="M71 78 c-1 -16 4 -28 9 -28 12 0 12 8 0 35 -8 18 -9 17 -9 -7z"></path>';
                                    echo '                              <path d="M158 80 c-7 -24 -3 -38 8 -28 3 4 4 17 2 30 l-3 23 -7 -25z"></path>';
                                    echo '                              <path d="M110 70 c0 -11 5 -20 10 -20 6 0 10 9 10 20 0 11 -4 20 -10 20 -5 0 -10 -9 -10 -20z"></path>';
                                    echo '                          </g>';
                                    echo '                        </svg>';
                                    echo '                       <span>Thêm vào giỏ hàng</span>';
                                    echo '                 </button></form>';
                                    echo '               </div>';
                                    echo '          </div>';
                                    echo '     </div>';
                                    echo '    </div>';
                                    echo '</div>';
                                }
                            }
                            ?>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<?php //fotter page here --
include 'footer.php';
?>
<?php //js page here --
include 'sctript_indexjs.php';
?>
<script>
    $(".product-gallery__thumb img").click(function() {
        $(".product-gallery__thumb").removeClass('active');
        $(this).parents('.product-gallery__thumb').addClass('active');
        var img_thumb = $(this).data('image');
        var total_index = $(this).parents('.product-gallery__thumb').index() + 1;
        $(".gallery-index .current").html(total_index);

        $(".product-image-detail .product-image-feature").attr("src", $(this).attr("data-image"));


    });
    $(".product-gallery__thumb").first().addClass('active');
    var check_variant = true;
    var fIndex = false;

    var selectCallback = function(variant, selector) {
        if (variant && variant.available) {
            current_id = variant.id;

            if (variant.featured_image != null) {
                if ($(window).width() > 991) {

                    $(".product-gallery__thumb a img[data-image='" + Haravan.resizeImage(variant.featured_image.src, 'master').replace('https:', '') + "']").click().parents('.product-gallery__thumb').addClass('active');

                } else {
                    setTimeout(function() {
                        var indexVariant = $(".product-gallery-item img[src='" + Haravan.resizeImage(variant.featured_image.src, 'master').replace('https:', '') + "']").parent().index();
                        $("#sliderproduct").flickity('select', indexVariant);
                    }, 500);
                }
            }
        }
    };
    //Img 360*
    
</script>
