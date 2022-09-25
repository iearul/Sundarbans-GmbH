
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<style>
    header.top-head {
    z-index: 1;
}
</style>
<!-- [1] -->
<div  id="ex1" class="modal">
                <h2 id="modal-1-title">
                    Quick Enquiry
                </h2>
             
                <div class="contact-form">
                    <?=form_open("products/enquiry/".$product->url, array('id' => 'hire_form'))?>
                        <div class="row">                
                            <div class="cell-6">
                                <div class="form-input">
                                    <label>Full name<span class="red">*</span></label>
                                    <input type="text" name="fullname" required>
                                </div>
                            </div>             
                            <div class="cell-6">
                                <div class="form-input">
                                    <label>Email<span class="red">*</span></label>
                                    <input type="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">                
                            <div class="cell-6">
                                <div class="form-input">
                                    <label>Contact No<span class="red">*</span></label>
                                    <input type="text" name="phone"  required>
                                </div>
                            </div>             
                            <div class="cell-6">
                                <div class="form-input">
                                    <label>Company Name<span class="red">*</span></label>
                                    <input type="text" name="company" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">                
                            <div class="cell-6">
                                <div class="form-input">
                                    <label>Color</label>
                                    <input type="text" name="color"  required>
                                </div>
                            </div>             
                            <div class="cell-6">
                                <div class="form-input">
                                    <label>Quantity</label>
                                    <input type="text" name="quantity" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">                
                            <div class="cell-6">
                                <div class="form-input">
                                    <label>Fabrics</label>
                                    <input type="text" name="fabrics"  required>
                                </div>
                            </div>             
                            <div class="cell-6">
                                <div class="form-input">
                                    <label>Product Size</label>
                                    <input type="text" name="psize" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">                
                            <div class="cell-6">
                                <div class="form-input">
                                    <label>GSM</label>
                                    <input type="text" name="gsm"  required>
                                </div>
                            </div>             
                            <div class="cell-6">
                                <div class="form-input">
                                    <label>Product per CRT</label>
                                    <input type="text" name="ppcrt" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-input">
                            <label>Message<span class="red">*</span></label>
                            <textarea required style="height: 100px;" name="enquiry"></textarea>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-large main-bg" value="Submit">
                        </div>
                    <?php echo form_close();?>
                </div>
            
</div>

<!-- Content Start -->
<div id="contentWrapper">
    <div class="page-title title-1">
        <div class="container">
            <div class="row">
                <div class="cell-12">
                    <h1 class="fx" data-animate="fadeInLeft"> <?= $product->name ?></h1>
                    <div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                        <span class="bold">You Are In:</span><a href="">Home </a><span class="line-separate">/</span><a>Products </a><span class="line-separate">/</span><a><?= $product->name ?> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sectionWrapper">
        <div class="container">
            <div class="row">
                <div class="cell-12">
                    <?php if(!empty($message)) { ?>
                        <div class="box success-box fx" data-animate="fadeInRight">
                                <a class="close-box" href="#"><i class="fa fa-times"></i></a>

                                <p><?=$message?></p>
                        </div>
                    <?php } ?>
                    <?php if(!empty($message_error)) { ?>
                        <div class="box error-box fx" data-animate="fadeInLeft">
                                <a class="close-box" href="#"><i class="fa fa-times"></i></a>
                                <p><?=$message_error?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                
                <div class="cell-9">
                    <div class="grid-list">
                        <div class="row">
                            <div class="cell-6">
                                <div class="product-img">
                                    <img alt="" id="img_01" src="uploads/products/<?= $product->image ?>" />
                                    <div class="thumbs">
                                        <ul id="gal1">
                                            <li><a data-image="uploads/products/<?= $product->image ?>" href="#"><img alt="" src="uploads/products/<?= $product->image ?>" /></a></li>
                                            <?php if (!empty($product->images)) {
                                                $images = json_decode($product->images, true);
                                                foreach ($images as $key => $image) { ?>
                                            <li><a data-image="uploads/products/<?= $image ?>" href="#"><img alt="" src="uploads/products/<?= $image ?>" /></a></li>
                                                <?php }
                                            } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="cell-6">
                                <div class="product-specs price-block list-item">
                                    <div class="price-box"><span class="product-price"><?= $product->name ?></span></div>
                                    <div>
                                        <span><span><?= $product->subtitle ?></span>
                                    </div>
                                </div>
                                <?php
                                if (!empty($product->attributes)) {
                                    $attributes = json_decode($product->attributes, true);
                                    ?>
                                <table>
                                    <tbody>
                                    <?php foreach ($attributes as $attribute) { ?>
                                        <tr>
                                            
                                            <td><b><?= $attribute['title'] ?></b></td>
                                            <td><?= $attribute['value'] ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                                <?php } ?>
                            </div>
                            <div class="left" style="padding: 15px;"><a href="#ex1" rel="modal:open" class="btn btn-sm btn-color">Enquiry / Customize</a>
                                
                                <!-- Model -->
                                
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
                <aside class="cell-3 left-shop">
                    <div class="widget r-posts-w sale-widget fx" data-animate="fadeInRight">
                        <h3 class="widget-head">Latest Product</h3>
                        <div class="widget-content">
                            <ul>
                            <?php foreach ($recents as $recent) { ?>
                                <li>
                                    <a href="products/details/<?= $recent->url ?>">
                                        <div class="post-img">
                                            <img src="uploads/products/<?= $recent->image ?>" alt="">
                                        </div>
                                        <div class="widget-post-info">
                                            <h4>
                                            <?=$recent->name?>
                                            </h4>
                                        </div>  
                                    </a>
                                </li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- Content End -->

