    <?php
    include 'header.php';
    ?>
    <main class="mainContent-theme ">
        <div id="collection" class="collection-page">

            <div class="breadcrumb-shop">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pd5  ">
                            <ol class="breadcrumb breadcrumb-arrows" itemscope=""
                                itemtype="http://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                    <a href="/MVC/controller/productController.php" target="_self" itemprop="item"><span
                                            itemprop="name">Trang chủ</span></a>
                                    <meta itemprop="position" content="1">
                                </li>

                                <li class="active" itemprop="itemListElement" itemscope=""
                                    itemtype="http://schema.org/ListItem">
                                    <span itemprop="item" content=""><span itemprop="name">Sản phẩm</span></span>
                                    <meta itemprop="position" content="2">
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <div class="main-content ">
                <div class="container-fluid">
                    <div class="row">
                        <div id="collection-body" class="wrap-collection-body clearfix">


                            <div class="col-md-3 col-sm-12 col-xs-12 sidebar-fix">
                                <div class="wrap-filter">
                                    <div class="box_sidebar">
                                        <div class="block left-module">
                                            <div class=" filter_xs">
                                                <div class="layered">

                                                    <div class="group-menu">
                                                        <div class="title_block visible-sm visible-xs">
                                                            Tất cả sản phẩm
                                                            <span><i class="fa fa-angle-down"></i></span>
                                                        </div>
                                                        <div class="block_content layered layered-category">
                                                            <div class="layered-content">
                                                                <ul class="tree-menu">


                                                                    <li
                                                                        class="tree-menu-lv1 has-child  menu-uncollap menu-uncollapsed">
                                                                        <a class="" href="javascript:void(0)"
                                                                            title="Honkai Impact 3" target="_self">
                                                                            <span class="">Danh mục sản phẩm</span>
                                                                            <span class="icon-control"><i
                                                                                    class="fa fa-minus"></i></span>
                                                                        </a>
                                                                        <ul class="tree-menu-sub"
                                                                            style="display: block;">

                                                                            <li>
                                                                                <span></span>
                                                                                <a href="/MVC/controller/productController.php?controller=SeriGET&seri=Áo"
                                                                                    class="current"
                                                                                    title="Sản phẩm Honkai">Sản phẩm
                                                                                    Áo</a>
                                                                            </li>

                                                                            <li>
                                                                                <span></span>
                                                                                <a href="/MVC/controller/productController.php?controller=SeriGET&seri=Quần"
                                                                                    title="Sản phẩm Honkai">Sản phẩm
                                                                                    Quần</a>
                                                                            </li>
                                                                            <li>
                                                                                <span></span>
                                                                                <a href="/MVC/controller/productController.php?controller=SeriGET&seri=Khác"
                                                                                    title="Sản phẩm Khác">Sản phẩm
                                                                                    Khác</a>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <div class="wrap-collection-title row">
                                    <div class="heading-collection row">
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <h1 class="title">
                                                Sản phẩm <?php echo $searchcontent ?>
                                            </h1>
                                                
                                            <div class="alert-no-filter"></div>

                                        </div>
                                        <?php
                                            
                                        ?>

                                    </div>
                                </div>

                                <div class="row filter-here">
                                    <div class="content-product-list product-list filter clearfix">
                                        <?php
                                    if (isset($result_search)) {
                                        foreach ($result_search  as $itemcart) {
                                            echo ' <div class="col-md-3 col-sm-6 col-xs-6 pro-loop col-4">

                                    <div class="product-block product-resize fixheight" id="collection_loop_1" style="height: 298px;">
                                        <div class="product-img">';
                                            if ((int)$itemcart['soluong'] == (int)0) {
                                                echo '   <div class="product-order">Pre-Order</div>';
                                            } else echo '   <div class="product-order">Order</div>';
                                            $callproductService = new productService();
                                            $result_images  = $callproductService->findOneImageIdProductIdSort($itemcart['masp']);
                                            echo '   <a href="/MVC/controller/productController.php?controller=productDetailId&value=' . $itemcart['masp'] . '" title="' . $itemcart['tensp'] . '" class="image-resize ratiobox lazyloaded" data-expand="-1" style="height: 214px;">';
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

                                            echo '  </a>
                                            <div class="button-add hidden">
                                                <button type="submit" title="Buy now" class="action" >Mua ngay<i class="fa fa-long-arrow-right"></i></button>
                                            </div>
                                            <div class="pro-price-mb">
                                                <span class="pro-price">' . number_format($itemcart["gia"], 0, '.', '.') . 'đ' . '</span>

                                            </div>
                                        </div>
                                        <div class="product-detail clearfix">
                                            <div class="box-pro-detail">
                                                <h3 class="pro-name">
                                                    <a href="/MVC/controller/productController.php?controller=productDetailId&value=' . $itemcart['masp'] . '" title="  ' . $itemcart['tensp'] . '">
                                                    ' . $itemcart['tensp'] . '
                                                    </a>
                                                </h3>
                                                <div class="box-pro-prices">
                                                    <p class="pro-price ">
                                                        <span>' . number_format($itemcart["gia"], 0, '.', '.') . 'đ' . '</span>

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                
                                </div>';
                                        }
                                    }
                                    ?>

                                    </div>
                                    <div class="sortpagibar pagi clearfix text-center">
                                        <div id="pagination" class="clearfix">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <?php
                                            for ($i = 1; $i <= $total_pages; $i++) {
                                                echo '
                                
                                        <a class="page-node" href="/MVC/controller/productController.php?controller=SeriGET&seri=' . $getseri . '&page=' . $i . '">' . $i . '</a>
                                    
                                ';
                                            } ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>





    </main>
    <?php //fotter page here --
    include 'footer.php';
    ?>
    <?php //js page here --
    include 'sctript_indexjs.php';
    ?>