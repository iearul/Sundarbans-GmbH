
<!-- Content Start -->
<div id="contentWrapper">

        <!-- Revolution slider start -->
				<div class="tp-banner-container">
					<div class="tp-banner" >
						<ul>
                                                    <?php foreach ($sliders as $slider):?>
							<li data-slotamount="7" data-transition="incube" data-masterspeed="1000" data-saveperformance="on">
                                                            <img alt="" src="assets/frontend/images/slider/dummy.png" data-lazyload="uploads/sliders/<?=$slider->name?>">
                                                            <div style="width: 85%; text-align: center; font-size: 60px;" class="tp-caption customin main-title tp-resizeme"
									data-x="center" data-hoffset="0"
									data-y="center" data-voffset="0"
									data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:5;scaleY:5;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
									data-speed="300"
									data-start="1200"
									data-easing="Power3.easeInOut"
									data-splitin="none"
									data-splitout="none"
									data-elementdelay="0.1"
									data-endelementdelay="0.1"
									data-endspeed="1000"
									style="z-index: 18; max-width: auto; max-height: auto; white-space: nowrap;"><?=$slider->title1?>
								</div>
							</li>
                                                    <?php endforeach;?>
						</ul>
					</div>
				</div>
				<!-- Revolution slider end -->
				

        <!-- Welcome Box start -->
        <div class="welcome">
                <div class="container">
                        <h3 class="center block-head"><span class="main-color">Welcome To Sundarbans GmbH</h3>
                        <p class="margin-bottom-0" style="text-align: justify;"><?=$site->greeting?></p>
                </div>
        </div>
        <!-- Welcome Box end -->

        <!-- Services boxes style 1 start -->
        
        <!-- Services boxes style 1 start -->
         <!-- our Recent Product block start -->
        <div class="sectionWrapper">
                <div class="container">
                        <h3 class="block-head">Featured Product</h3>
                        <div class="portfolioGallery portfolio">
                            <?php foreach ($products as $recent):?>
                                <div>
                                        <div class="portfolio-item">
                                                <div class="img-holder">
                                                        <div class="img-over">
                                                                <a href="<?=site_url()?>products/details/<?=$recent->url?>" class="fx link"><b class="fa fa-link"></b></a>
                                                                <a href="uploads/products/<?=$recent->image?>" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Product Name: <?=$recent->name?>"><b class="fa fa-search-plus"></b></a>
                                                        </div>
                                                        <img style="height: 250px; width: 400px;" alt="" src="uploads/products/<?=$recent->image?>">
                                                </div>
                                                <div class="name-holder">
                                                        <a class="project-name" href="<?=site_url()?>products/details/<?=$recent->url?>"><?=$recent->name?></a>
                                                </div>
                                        </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                        <div class="clearfix"></div>
                </div>
        </div>
	<!-- our Recent Product block start -->	
        
        <div class="padd-top-30">
                <hr class="hr-style3">
        </div>

        
        <!-- our Recent Product block start -->
        <div class="sectionWrapper">
                <div class="container">
                        <h3 class="block-head">Latest Product</h3>
                        <div class="portfolioGallery portfolio">
                            <?php foreach ($recents as $recent):?>
                                <div>
                                        <div class="portfolio-item">
                                                <div class="img-holder">
                                                        <div class="img-over">
                                                                <a href="<?=site_url()?>products/details/<?=$recent->url?>" class="fx link"><b class="fa fa-link"></b></a>
                                                                <a href="uploads/products/<?=$recent->image?>" class="fx zoom" data-gal="prettyPhoto[pp_gal]"  title="Product Name: <?=$recent->name?>"><b class="fa fa-search-plus"></b></a>
                                                        </div>
                                                        <img style="height: 250px; width: 400px;" alt="" src="uploads/products/<?=$recent->image?>">
                                                </div>
                                                <div class="name-holder">
                                                        <a class="project-name" href="<?=site_url()?>products/details/<?=$recent->url?>"><?=$recent->name?></a>
                                                </div>
                                        </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                        <div class="clearfix"></div>
                </div>
        </div>
	<!-- our Recent Product block start -->			


</div>
<!-- Content End -->