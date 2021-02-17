$(document).ready(function ($) {
    //$('form').parsley();
    
    // Inicliza valor de comunas
    let comuna = $("#customer_commune");
    comuna.find('option').remove();
    comuna.append('<option value="">Seleccione una comuna</option>');
    
    $('#customer_region').change(function () {
        $.ajax({
            type: "POST",
            url: BASE_URL + 'clientes/comuna',
            data: {
                'reg_id': $(this).val(),
                'csrf_token': $("input[name=csrf_token]").val()
            },
            dataType: "json",
            beforeSend: function () {
            },
            success: function (data) {
                
                comuna.find('option').remove();
                comuna.append('<option value="">Seleccione una comuna</option>');
                $(data).each(function (i, v) { // indice, valor
                    comuna.append('<option value="' + v.commune_id + '">' + v.commune_name + '</option>');
                })
            },
            error: function (message) {
            }

        })




    })





})