<?php $this->load->view('frontend/home/slider', FALSE); ?>
<div class="shop-product-area section fix"><!--Start Shop Area-->
    <div class="container">
        <div class="row">
            <div class="col-md-3 hidden-xs">
                <?php $this->load->view('frontend/layout/sidebar', FALSE); ?>
            </div>
            <div class="col-md-9">
                <div class=""></div>
                <div class="row">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <?php if (isset($breadcrum[1])) :?>
                            <li><?php echo ucfirst($breadcrum[1]); ?></li>
                            <?php endif; ?>
                             <?php if (isset($breadcrum[2]) && !is_numeric($breadcrum[2])) :?>
                            <li><?php echo ucwords( str_replace('-', ' ' ,$breadcrum[2])  ); ?></li>
                            <?php endif; ?>
                             <?php if (isset($breadcrum[3]) && !is_numeric($breadcrum[3])) :?>
                            <li><?php echo ucwords( str_replace('-', ' ' ,$breadcrum[3])  ); ?></li>
                            <?php endif; ?>
                             <?php if (isset($breadcrum[4]) && !is_numeric($breadcrum[4])) :?>
                            <li><b><?php echo ucwords( str_replace('-', ' ' ,$breadcrum[4])  ); ?></b></li>
                            <?php endif; ?>
                            
                        </ol>
                    </nav>
                    <div class="shop-products">
                        <?php
                        foreach ($products->Data as $product):
                         
                            ?>
                            <!-- Single Product Start -->
                            <div class="col-sm-4 fix" style="height: 350px;">
                                <div class="product-item fix">
                                    <div class="product-img-hover">
                                        <!-- Product image -->
                                        <a href="<?php echo base_url('/productos/details') ?>/<?php echo $product->code_friendly_name ?>" class="pro-image fix"><img src="<?php echo base_url() ?>assets/frontend/img/code/<?php echo $product->code_list_image ?>"  width="246" height="246" alt="product" /></a>
                                        <!-- Product action Btn -->
                                        <div class="product-action-btn">
                                            <a class="quick-view" href="<?php echo base_url('/productos/details') ?>/<?php echo $product->code_friendly_name ?>"><i class="fa fa-search"></i></a>

                                            <a class="add-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>  
                                    <div class="pro-name-price-ratting">
                                        <!-- Product Name -->
                                        <div class="pro-name">
                                            <H6><?php echo $product->brand_name ?></H6>
                                        </div>
                                        <div class="pro-name">
                                            <a href="<?php echo base_url('/productos/details') ?>/<?php echo $product->code_friendly_name ?>"><?php echo $product->code_description ?></a>
                                        </div>
                                        <!--<div class="pro-ratting">
                                            <p><span class="new">SKU: <?php echo $product->product_sku ?></span></p>
                                        </div>-->
                                        <div class="pro-price fix">
                                            <p><span class="new" style="font-family: arial;font-size: 15px">$<?php echo number_format($product->product_sale_price,0,',','.')?></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Single Product End -->
<?php endforeach; ?>   
                        <div class="clearfix"></div>

                        <!-- Pagination -->
                        <div class="pagination">
<?php echo $products->ShowLinksProducts(''); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--Start Shop Area-->
<?php $this->load->view('frontend/layout/brands', FALSE); ?>