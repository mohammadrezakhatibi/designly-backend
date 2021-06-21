
        $(document).ready(function(){

            $('.dropdown').val("");

            $('.dropdown').dropdown();
            function readURL(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result).css('display','block');

                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function readURL2(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#blah2').attr('src', e.target.result).css('display','block');

                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#file1").change(function() {
                readURL(this);
            });

            $("#file2").change(function() {
                readURL2(this);
            });

            $('.delete').click(function (){
                $(this).parent('.image_holder').children('img').attr('src', '').css('display','none');
            });



            $('.attribute select').change(function() {
                var hasEmpty = $('.attribute select option:selected').is(function() {
                    return !$(this).val();
                });
                if (!hasEmpty) {
                    var attrPrice = [];

                    var qty = $('.attribute select[name=qty] option:selected').html();

                    

                    if (qty < 500) {

                        $('.attribute select option:selected').each(function() {
                            attrPrice.push($(this).attr('high-price'));
                        });

                    } else {

                        $('.attribute select option:selected').each(function() {
                            attrPrice.push($(this).attr('low-price'));
                        });

                    }

                    
                    var lastPrice = 0;
                    for ( var i = 0; i < attrPrice.length; i++ ) {
                        lastPrice += parseInt(attrPrice[i]);
                    }
                    var basePrice = parseInt($('span.price_num').attr('price-data'));

                    basePrice += parseInt(lastPrice);
                    basePrice = basePrice * parseInt(qty);
                    $('.price_num').html(itpro(basePrice));
                    $('.price_inout').val(basePrice);
                    


                } else {

                    $('.price_num').html(itpro($('span.price_num').attr('price-data')));

                    $('.price_inout').val($('.price_num').html());
                }
            });
            //
            // $('.dropdown').change( function () {
            //     var selectedCountry = parseInt($(".dropdown option:selected").attr('price-data'));
            //     var price = parseInt($('span.price_num').attr('price-data'));
            //
            //
            //     console.log($(".dropdown option:selected").attr('price-data'));
            //     $('span.price_num').html(itpro(price+selectedCountry));
            // });
            //
            //
            // var array = [];
            // $('.dropdown  option:selected').each(function() {
            //     console.log(array[ $(this).val()] = $(this).text());
            // });

            $("select[name='print']").on('change', function() {
                
                if ($( "select[name='print']").find(":selected").text() !== "دورو" )  {
                    
                    $('#file_back').hide();
                } else {

                    $('#file_back').show();
                }
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

            $('#submit').click( function () {
            
                $('.attribute select option:selected').each(function() {
                    if($(this).val() == ""){
                        $(this).parent().parent().addClass('error');
                    } else {

                        $(this).parent().parent().removeClass('error');
                    }

                    if ($('#file1').get(0).files.length === 0)
                    {
                        $('#file1').addClass('error');
                    } else {

                        $('#file1').removeClass('error');
                    }
                });
            });

        });