$(document).ready(function(){


    $('#add-address').click( function() {
        $('.ui.modal.add-address')
            .modal('show','setting', 'transition', 'fade up');
    });

    

    $('.dropdown').val("");
    $('.province').dropdown();


    $('#address select').change(function() {
        if ($('#address select option:selected').attr('data-state') !== 'تهران')
        {

            $('#peyk').prop('disabled', true);
            $('#peyk').parent().parent().addClass('disabled');

        } else {

            $('#peyk').prop('disabled', false);
            $('#peyk').parent().parent().removeClass('disabled');
        }

    });

    $("input[name='address']").click(function() {

        if ($(this).attr('data-state') !== 'تهران')
        {

            $('#peyk').prop('disabled', true);
            $('#peyk').parent().parent().addClass('disabled');

        } else {

            $('#peyk').prop('disabled', false);
            $('#peyk').parent().parent().removeClass('disabled');
        }
        

    });

    $("input[name='shipping']").prop('checked', false);

    $("input[name='shipping']").click(function() {
        
        
        if ($(this).attr('id') === 'hozori') {

            $(".dropdown").addClass('disabled');

            $(".dropdown").val('');

        } else {
            $(".dropdown").removeClass('disabled');
        }

        if ($(this).attr('id') === 'peyk') {
            $('#address .title #send-m').remove();
            $('#address select option:not([data-state="تهران"])').attr('disabled','disabled');
            $('#address .title').append("<span id='send-m' style='font-size:12px;color: #ccc;'> (ارسال با پیک فقط در شهر تهران انجام می‌شود.)</span>");

        } else {

            $('#address select option:not([data-state="تهران"])').removeAttr('disabled');
            $('#address .title #send-m').remove();
        }

        var shippingFee  = parseInt($(this).attr('price-value'));


        $(".shipping-fee").html(itpro(shippingFee) + " تومان");

        $("input[name='shipping_fee']").val(shippingFee);

        var total = parseInt($(".total").attr('data-value'));


        total += parseInt(shippingFee);
        $(".total").html(itpro(total));
        $("input[name='basket_total']").val(total);


    });


    function itpro(Number)
    {
        Number+= '';
        Number= Number.replace(',', ''); Number= Number.replace(',', ''); Number= Number.replace(',', '');
        Number= Number.replace(',', ''); Number= Number.replace(',', ''); Number= Number.replace(',', '');
        x = Number.split('.');
        y = x[0];
        z= x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(y))
            y= y.replace(rgx, '$1' + ',' + '$2');
        return y+ z;
    }



});

function Func(Shahrestanha) {
    var _Shahrestan = document.getElementById("Shahrestan");
    _Shahrestan.options.length = 0;
    if(Shahrestanha != "") {
        var arr = Shahrestanha.split(",");
        for(i = 0; i < arr.length; i++) {
            if(arr[i] != "") {
                _Shahrestan.options[_Shahrestan.options.length]=new Option(arr[i],arr[i]);
            }
        }
    }
}
