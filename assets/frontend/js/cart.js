/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    
 
    
    $('.add_cart').click(function () {
        var product_id      =   $(this).data("productid");
        var product_name    =   $(this).data("productname");
        var product_price    =  $(this).data("price");
        var product_color   =   $("#color").val();
        var product_size    =   $("#tamano").val();
        
        var quantity        =   $("#quantity").val() ; 
       
        if (product_size=="") {
            $("#tamano").css('border','1px solid red');
            $(".err_size").html('Seleccione tamaño del producto')
            return false;
        }
        
        if (product_color == ""){
            $("#color").css('border','1px solid red');
            $(".err_color").html('Seleccione color del producto')
            return false;
        }

        if (quantity == "" || quantity <=0 ){
            $("#quantity").css('border','1px solid red');
            //$(".err_color").html('Seleccione color del producto')
            return false;
        }
        
        
        $.ajax({
            url: BASE_URL + "productos/agregar",
            method: "POST",
            data: { product_id      : product_id, 
                    product_name    : product_name, 
                    product_color   : product_color, 
                    product_size    : product_size, 
                    quantity        : quantity,
                    csrf_token: $("input[name=csrf_token]").val() 
                },
            success: function (data) {
               
                $.notify(
                            {
                                icon: 'fa fa-shopping-cart',
                                message: "El producto  "+ product_name +" fue agregado al carro con exito "
                            },
                            {
                                type: "success",
                                placement: {
                                    from: "top",
                                    align: "center"
                                },
                                animate: {
                                        enter: 'animated fadeInDown',
                                        exit: 'animated fadeOutUp'
                                },
                                delay: 3000,
                                timer: 1000,
                            }
                        );
                $('.cart-info').html(data);
            }
        });
    });

    //$('#detail_cart').load("<?php echo site_url('product/load_cart');?>");

    $(document).on('click', '.romove_cart', function () {
        var row_id = $(this).attr("id");
        $.ajax({
            url: "<?php echo site_url('product/delete_cart');?>",
            method: "POST",
            data: {row_id: row_id},
            success: function (data) {
                 $('.cart-info').html(data);
            }
        });
    });
});