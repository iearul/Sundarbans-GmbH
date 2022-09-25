    <!-- Content Start -->
    <div id="contentWrapper">
        <div class="page-title title-1">
                <div class="container">
                        <div class="row">
                                <div class="cell-12">
                                        <h1 class="fx" data-animate="fadeInLeft"> Products</h1>
                                        <div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                                                <span class="bold">You Are In:</span><a href="">Home </a><span class="line-separate">/</span><a>Products </a>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>

        <div class="sectionWrapper">
            <div class="container">
                <div class="row">
                    
                    <aside class="cell-3 left-shop">
                        <div class="widget r-posts-w sale-widget fx" data-animate="fadeInRight">
                            <h3 class="widget-head">Product Categories</h3>
                            <div class="widget-content">
                                <ul>
                                        <li class="active">
                                            <a href="<?=site_url()?>products">All Products</a>
                                            
                                        </li>
                                        <?php foreach($categories as $category){ ?>
                                        <li>
                                            <a href="<?=site_url()?>products/category/<?=$category->url?>"><?=$category->title?></a>
                                            
                                        </li>
                                        <?php } ?>    
                                </ul>
                            </div>
                        </div>
                    </aside>
                    <div class="cell-9">
                            <div class="grid-list">
                                <div class="row">
                                    <?php $i=0; foreach($products as $product){if($i==3){echo '<div class="clearfix"></div>';$i=0;}$i++; ?> 
                                        <div class="cell-4 fx shop-item" data-animate="fadeInUp">
                                            <div class="item-box">
                                                
                                                <div class="item-img">
                                                        <a href="uploads/products/<?=$product->image?>" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Product Title: <?=$product->name?>"><img  style="height: 250px; width: 400px;" alt="<?=$product->name?>" src="uploads/products/<?=$product->image?>"></a>
                                                </div>
                                                <a href="<?=site_url()?>products/details/<?=$product->url?>"><h3 class="item-title"><?=$product->name?></h3></a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content End -->
