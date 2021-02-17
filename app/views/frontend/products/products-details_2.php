<?php //print_r($info)   ?>
<style>

    *{
        border-radius: 0;
    }   
    .select-menu .sort {

        display: block;
        float: left;
        height: 38px;
        margin-right: 20px;
        padding: 5px 10px;
    }

    .form-control{
        border-radius: 0;
    }

    .sort > h4 {
        float: left;
        font-size: 14px;
        font-weight: 700;
        margin-right: 5px;
        margin-top: 7px;
        text-transform: uppercase;
        color:#fff;
    }

    .sort select {


        background: #fff url("<?php echo base_url() ?>assets/frontend/img/bottom-arrow.png") no-repeat scroll 90% center;
        border: 1px;
        min-width: 40px;
    }

    .btn-primary-cart {
        border-radius: 0;
        padding-top: 16px;
        padding-bottom: 16px;
        font-size: 16px;
    }

    .err_color,.err_size{
        font-size: 10px;
    }
</style>
<section class="product-page page fix"><!--Start Product Details Area-->
    <div class="container">
        <div class="row">

            <div class="col-md-3 hidden-xs">
                <?php $this->load->view('frontend/layout/sidebar', FALSE); ?>
            </div>

            <div class="col-md-9">
                <div class="col-sm-6">
                    <div class="details-pro-tab">
                        <!-- Tab panes -->
                        <div class="tab-content details-pro-tab-content">
                            <div class="tab-pane fade in active" id="image-1">
                                <div class="simpleLens-big-image-container">
                                    <a class="simpleLens-lens-image" data-lens-image="<?php echo base_url() ?>assets/frontend/img/code/<?php echo $info[0]->code_list_image ?>">
                                        <img src="<?php echo base_url() ?>assets/frontend/img/code/<?php echo $info[0]->code_list_image ?>" alt="" class="simpleLens-big-image">
                                    </a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="image-2">
                                <div class="simpleLens-big-image-container">
                                    <a class="simpleLens-lens-image" data-lens-image="<?php echo base_url() ?>assets/frontend/img/code/<?php echo $info[0]->code_detail_image ?>">
                                        <img src="<?php echo base_url() ?>assets/frontend/img/code/<?php echo $info[0]->code_detail_image ?>" alt="" class="simpleLens-big-image">
                                    </a>
                                </div>
                            </div>
                            

                        </div>
                        <!-- Nav tabs -->
                        <ul class="tabs-list details-pro-tab-list" role="tablist">
                            <li class="active"><a href="#image-1" data-toggle="tab"><img src="<?php echo base_url() ?>assets/frontend/img/code/<?php echo $info[0]->code_list_image ?>" alt="" /></a></li>
                            <li><a href="#image-2" data-toggle="tab"><img src="<?php echo base_url() ?>assets/frontend/img/code/<?php echo $info[0]->code_detail_image ?>" alt="" /></a></li>
                            
                        </ul>
                    </div>
                </div>


                <div class="col-sm-6">
                    <div class="shop-details">
                        <h2><?php echo $info[0]->brand_name; ?></h2>
                        <!-- Product Name -->
                        <h2><?php echo $info[0]->code_description; ?></h2>
                        <!-- Product Ratting -->
                        <!--<div class="pro-ratting">
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star"></i>
                                <i class="on fa fa-star-half-o"></i>
                        </div>
                        <h3><span>$165</span>$150</h3>-->
                        <!--<h4>10 Reviews</h4>-->
                        <!--
                        <h5>SKU :
                            <?php /* foreach ($codigos as $k) : ?>
                                <b><?php echo $k->product_ax_code . ' - ' ?></b>
                            <?php endforeach; */ ?>   
                        </h5>
                        -->
                        <h5>Codigo Padre :
                            
                                <b><?php echo $info[0]->code_id ?></b>
                            
                        </h5>

                        <h6>Detalle</h6>
                        <p><?php echo $info[0]->code_web_description ?></p>
                        <div class="select-menu fix">
                            <div class=" fix">
                                <?php 
                                if (isset($size) && is_array($size) && count($size)> 0) : 
                                    if (count($size)==1 && !empty(trim($size[0]->product_size))):
                                ?>
                                    <h6>Tama&ntilde;o</h6>
                                    <select class="form-control" id="tamano">
                                        <?php foreach ($size as $s) : ?>
                                            <option value="<?php echo $s->product_size ?>"><?php echo $s->product_size ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    
                                <?php elseif (count($size)>1) : ?>    
                                    <h6>Tama&ntilde;o</h6>
                                    <select class="form-control  " id="tamano">
                                        <option value="">Seleccione</option>
                                        <?php foreach ($size as $s) : ?>
                                            <option value="<?php echo $s->product_size ?>"><?php echo $s->product_size ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php 
                                    endif;
                                    
                                endif; 
                                 
                                 
                                 ?>
                                    <div class="err_size text-danger"></div>    
                            </div>
                            <br>
                            <div class=" fix">
                                
                            <?php 
                                if (isset($colores) && is_array($colores) && count($colores)> 0) : 
                                    if (count($colores)==1 && !empty(trim($colores[0]->product_color))):
                                ?>
                                    <h6>Color</h6>
                                    <select class="form-control" id="color" >
                                        <?php foreach ($colores as $c) : ?>
                                            <option value="<?php echo $c->product_color ?>"><?php echo $c->product_color ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    
                                <?php elseif (count($colores)>1) : ?>    
                                    <h6>Color</h6>
                                    <select class="form-control" id="color" >
                                        <option value="">Seleccione</option>
                                        <?php foreach ($colores as $c) : ?>
                                            <option value="<?php echo $c->product_color ?>"><?php echo $c->product_color ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php 
                                    endif;
                                    
                                endif; 
                                 
                                 
                                 ?>  
                                    
                                <input type="hidden" name="<?php echo $csfr['csrfName']?>" value="<?php echo $csfr['csrfHash']?>" style="display:none;" />
                                <div class="err_color text-danger"></div>
                            </div>    
                            
                            <!--<div class="sort fix">
                                    <h4>Color</h4>
                                    <select>
                                            <option value="pink">pink</option>
                                            <option value="red">red</option>
                                            <option value="blue">blue</option>
                                    </select>
                            </div>-->

                            <div class=" fix" style="margin-top: 10px">
                                <div class="col-md-3" style="padding-top: 10px"><h6>Cantidad</h6></div> 
                                <div class="col-md-2"><input type="text" name="quantity" id="quantity" class="form-control col-md-2" value="1" ></div>
                            </div>
                        </div>
                        <div class="review">
                            <button class="add_cart btn btn-block btn-primary btn-primary-cart" data-productid="<?php echo $info[0]->code_id ?>"  data-productname="<?php echo $info[0]->code_description; ?>" >AGREGAR AL CARRO </button>
                        </div>

                    </div>
                </div>

                


            </div>


        </div>
</section><!--End Product Details Area-->
