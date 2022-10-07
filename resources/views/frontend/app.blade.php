<!DOCTYPE html>
<html>
    <head>
        <title>Dwiggy-Doo</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" />
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css-web/style.css')}}" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
          <link rel="stylesheet" href="http://cilearningschool.com/flowerpetral/public/assets/css/aiz-core.css">
    <script>
        var AIZ = AIZ || {};
    </script>

    </head>
    <body>
        <header>
            <div class="container py-3 px-0 px-md-1">
                <ul class="align-items-center ml-auto mb-0 d-flex justify-content-end list-unstyled">
                    <li class="d-none d-md-block col-md-6 col-lg-5">
					<form action="{{ route('search') }}" method="GET" class="stop-propagation">
                        <div class="form-group m-0 d-flex justify-content-end">
                            <input class="form-control srch-form px-3" type="text" id="search" name="q" placeholder="Search Product" /> <button class="btn find" type="submit"><img src="{{asset('assets/images/loupe.svg')}}" /> Find</button>
                        </div>
						</form>
                    </li>
                    <li>
					@auth
							<a class="px-2" href="{{ route('dashboard') }}"><img src="{{asset('assets/images/profile.svg')}}" width="46px" /></a>
						@else
							 <a class="px-2" href="{{ route('user.login') }}"><img src="{{asset('assets/images/profile.svg')}}" width="46px" /></a>
					@endauth
                    </li>
                    <li class="position-relative">
                        <div class="numbers">02</div>
                        <a class="px-2" href="#"><img src="{{asset('assets/images/heart.png')}}" width="46px" /></a>
                    </li>
                    <li  id="cart_items">
                        @include('frontend.partials.cart')
                        <a class="px-2" href="{{ route('cart') }}"><img src="{{asset('assets/images/cart.png')}}" width="46px" /></a>
                    </li>
                </ul>
            </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-dark bg-red main-nav px-lg-0">
                <div class="container" id="cart_items_sidenav">
                    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{asset('assets/images/logo.svg')}}" /></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarToggler">
                        <ul class="navbar-nav ml-auto">
						@foreach (\App\Category::where('level', 0)->get()->take(11) as $key => $category)
                            <li class="nav-item"><a class="nav-link" href="{{ route('products.category', $category->slug) }}">{{ $category->getTranslation('name') }}</a></li>
							@endforeach
                            
                        </ul>
                    </div>
                </div>
            </nav>


    @include('frontend.partials.modal')

    <div class="modal fade" id="addToCart">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader text-center p-3">
                    <i class="las la-spinner la-spin la-3x"></i>
                </div>
                <button type="button" class="close absolute-top-right btn-icon close z-1" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la-2x">&times;</span>
                </button>
                <div id="addToCart-modal-body">

                </div>
            </div>
        </div>
    </div>

    @yield('modal')
        </header>



        @yield('content')



      <footer class="pt-1">
            <div class="footer py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <h4 class="mb-3 pb-1">Customer Service</h4>
                            <ul class="list-unstyled quick_linkks mb-0">
                                <li><a href="#"> Track Order </a></li>
                                <li><a href="#"> Returns </a></li>
                                <li><a href="#"> Shipping Info </a></li>
                                <li><a href="#"> Recalls & Advisories</a></li>
                                <li><a href="#"> Pet Store Locator </a></li>
                                <li><a href="#"> Help </a></li>
                                <li><a href="#"> Contact Us </a></li>
                                <li><a href="#"> Website Accessibility </a></li>
                                <li><a href="#"> Policy</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <h4 class="mb-3 pb-1">Corporate</h4>
                            <ul class="list-unstyled quick_linkks mb-0">
                                <li><a href="#"> Careers </a></li>
                                <li><a href="#"> About Us </a></li>
                                <li><a href="#"> Code of Ethics </a></li>
                                <li><a href="#"> COVID-19 Response </a></li>
                                <li><a href="#"> Event Sponsorships </a></li>
                                <li><a href="#"> Vendors </a></li>
                                <li><a href="#"> Affiliate Program </a></li>
                                <li><a href="#"> Petco Foundation </a></li>
                                <li><a href="#"> Gift Cards </a></li>
                                <li><a href="#"> Coupons and Promos </a></li>
                                <li><a href="#"> Investors</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <h4 class="mb-3 pb-1">Products</h4>
                            <ul class="list-unstyled quick_linkks mb-0">
                                <li><a href="#"> Dog Grooming</a></li>
                                <li><a href="#"> Positive Dog Training </a></li>
                                <li><a href="#"> Veterinary Services </a></li>
                                <li><a href="#"> Petco Insurance </a></li>
                                <li><a href="#"> Pet Adoption </a></li>
                                <li><a href="#"> Repeat Delivery </a></li>
                                <li><a href="#"> Resource Center</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <h4 class="mb-3 pb-1">Keep In Touch</h4>
                            <div class="footer-contact">
                                <p>Unit No. 58, Hartron Complex, Phase IV, Electronic City, Udyog Vihar, Sector 18, Gurugram, Haryana 122015</p>
                                <p><a href=""> Info@dwiggydoo.com</a></p>
                                <p><a href=""> 91 846 892 0394</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright text-white text-center p-2">
                <div class="container"><div class="copyrihgt-text">&copy; 2021. Dwiggy Doo</div></div>
            </div>
        </footer>
		
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
        <script src="{{asset('assets/js-web/custom.min.js')}}"></script>
    <script src="http://cilearningschool.com/flowerpetral/public/assets/js/vendors.js"></script>
    <script src="http://cilearningschool.com/flowerpetral/public/assets/js/aiz-core.js"></script>
        
        <script>
        $(document).ready(function() {

            $('.category-nav-element').each(function(i, el) {

                $(el).on('mouseover', function(){

                    if(!$(el).find('.sub-cat-menu').hasClass('loaded')){

                        $.post('{{ route('category.elements') }}', {_token: AIZ.data.csrf, id:$(el).data('id')}, function(data){

                            $(el).find('.sub-cat-menu').addClass('loaded').html(data);

                        });

                    }

                });

            });

            if ($('#lang-change').length > 0) {

                $('#lang-change .dropdown-menu a').each(function() {

                    $(this).on('click', function(e){

                        e.preventDefault();

                        var $this = $(this);

                        var locale = $this.data('flag');

                        $.post('{{ route('language.change') }}',{_token: AIZ.data.csrf, locale:locale}, function(data){

                            location.reload();

                        });



                    });

                });

            }



            if ($('#currency-change').length > 0) {

                $('#currency-change .dropdown-menu a').each(function() {

                    $(this).on('click', function(e){

                        e.preventDefault();

                        var $this = $(this);

                        var currency_code = $this.data('currency');

                        $.post('{{ route('currency.change') }}',{_token: AIZ.data.csrf, currency_code:currency_code}, function(data){

                            location.reload();

                        });



                    });

                });

            }

        });



        $('#search').on('keyup', function(){

            search();

        });



        $('#search').on('focus', function(){

            search();

        });



        function search(){

            var searchKey = $('#search').val();

            if(searchKey.length > 0){

                $('body').addClass("typed-search-box-shown");



                $('.typed-search-box').removeClass('d-none');

                $('.search-preloader').removeClass('d-none');

                $.post('{{ route('search.ajax') }}', { _token: AIZ.data.csrf, search:searchKey}, function(data){

                    if(data == '0'){

                        // $('.typed-search-box').addClass('d-none');

                        $('#search-content').html(null);

                        $('.typed-search-box .search-nothing').removeClass('d-none').html('Sorry, nothing found for <strong>"'+searchKey+'"</strong>');

                        $('.search-preloader').addClass('d-none');



                    }

                    else{

                        $('.typed-search-box .search-nothing').addClass('d-none').html(null);

                        $('#search-content').html(data);

                        $('.search-preloader').addClass('d-none');

                    }

                });

            }

            else {

                $('.typed-search-box').addClass('d-none');

                $('body').removeClass("typed-search-box-shown");

            }

        }



        function updateNavCart(){

            $.post('{{ route('cart.nav_cart') }}', {_token: AIZ.data.csrf }, function(data){

                $('#cart_items').html(data);

            });

        }



        function removeFromCart(key){

            $.post('{{ route('cart.removeFromCart') }}', {_token: AIZ.data.csrf, key:key}, function(data){

                updateNavCart();

                $('#cart-summary').html(data);

                AIZ.plugins.notify('success', 'Item has been removed from cart');

                $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())-1);

            });

        }



        function addToCompare(id){

            $.post('{{ route('compare.addToCompare') }}', {_token: AIZ.data.csrf, id:id}, function(data){

                $('#compare').html(data);

                AIZ.plugins.notify('success', "{{ translate('Item has been added to compare list') }}");

                $('#compare_items_sidenav').html(parseInt($('#compare_items_sidenav').html())+1);

            });

        }



        function addToWishList(id){

            @if (Auth::check() && (Auth::user()->user_type == 'customer' || Auth::user()->user_type == 'seller'))

                $.post('{{ route('wishlists.store') }}', {_token: AIZ.data.csrf, id:id}, function(data){

                    if(data != 0){

                        $('#wishlist').html(data);

                        AIZ.plugins.notify('success', "{{ translate('Item has been added to wishlist') }}");

                    }

                    else{

                        AIZ.plugins.notify('warning', "{{ translate('Please login first') }}");

                    }

                });

            @else

                AIZ.plugins.notify('warning', "{{ translate('Please login first') }}");

            @endif

        }



        function showAddToCartModal(id){

            if(!$('#modal-size').hasClass('modal-lg')){

                $('#modal-size').addClass('modal-lg');

            }

            $('#addToCart-modal-body').html(null);

            $('#addToCart').modal();

            $('.c-preloader').show();

            $.post('{{ route('cart.showCartModal') }}', {_token: AIZ.data.csrf, id:id}, function(data){

                $('.c-preloader').hide();

                $('#addToCart-modal-body').html(data);

                AIZ.plugins.slickCarousel();

                AIZ.plugins.zoom();

                AIZ.extra.plusMinus();

                getVariantPrice();

            });

        }



        $('#option-choice-form input').on('change', function(){

            getVariantPrice();

        });



        function getVariantPrice(){

            if($('#option-choice-form input[name=quantity]').val() > 0 && checkAddToCartValidity()){

                $.ajax({

                   type:"POST",

                   url: '{{ route('products.variant_price') }}',

                   data: $('#option-choice-form').serializeArray(),

                   success: function(data){

                       $('#option-choice-form #chosen_price_div').removeClass('d-none');

                       $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);

                       $('#available-quantity').html(data.quantity);

                       $('.input-number').prop('max', data.quantity);

                       //console.log(data.quantity);

                       if(parseInt(data.quantity) < 1 && data.digital  == 0){

                           $('.buy-now').hide();

                           $('.add-to-cart').hide();

                       }

                       else{

                           $('.buy-now').show();

                           $('.add-to-cart').show();

                       }

                   }

               });

            }

        }



        function checkAddToCartValidity(){

            var names = {};

            $('#option-choice-form input:radio').each(function() { // find unique names

                  names[$(this).attr('name')] = true;

            });

            var count = 0;

            $.each(names, function() { // then count them

                  count++;

            });



            if($('#option-choice-form input:radio:checked').length == count){

                return true;

            }



            return false;

        }



        function addToCart(){

            if(checkAddToCartValidity()) {

                $('#addToCart').modal();

                $('.c-preloader').show();

                $.ajax({

                   type:"POST",

                   url: '{{ route('cart.addToCart') }}',

                   data: $('#option-choice-form').serializeArray(),
                   headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                   success: function(data){

                       $('#addToCart-modal-body').html(null);

                       $('.c-preloader').hide();

                       $('#modal-size').removeClass('modal-lg');

                       $('#addToCart-modal-body').html(data.view);

                       updateNavCart();

                       $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);

                   }

               });

            }

            else{

                AIZ.plugins.notify('warning', 'Please choose all the options');

            }

        }



        function buyNow(){

            if(checkAddToCartValidity()) {

                $('#addToCart-modal-body').html(null);

                $('#addToCart').modal();

                // $('.c-preloader').show();

                $.ajax({

                   type:"POST",

                   url: '{{ route('cart.addToCart') }}',

                   data: $('#option-choice-form').serializeArray(),

                   success: function(data){

                       if(data.status == 1){

                            updateNavCart();

                            $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())+1);

                            window.location.replace("{{ route('cart') }}");

                       }

                       else{

                            $('#addToCart-modal-body').html(null);

                            $('.c-preloader').hide();

                            $('#modal-size').removeClass('modal-lg');

                            $('#addToCart-modal-body').html(data.view);

                       }

                   }

               });

            }

            else{

                AIZ.plugins.notify('warning', 'Please choose all the options');

            }

        }



        function show_purchase_history_details(order_id)

        {

            $('#order-details-modal-body').html(null);



            if(!$('#modal-size').hasClass('modal-lg')){

                $('#modal-size').addClass('modal-lg');

            }



            $.post('{{ route('purchase_history.details') }}', { _token : AIZ.data.csrf, order_id : order_id}, function(data){

                $('#order-details-modal-body').html(data);

                $('#order_details').modal();

                $('.c-preloader').hide();

            });

        }



        function show_order_details(order_id)

        {

            $('#order-details-modal-body').html(null);



            if(!$('#modal-size').hasClass('modal-lg')){

                $('#modal-size').addClass('modal-lg');

            }



            $.post('{{ route('orders.details') }}', { _token : AIZ.data.csrf, order_id : order_id}, function(data){

                $('#order-details-modal-body').html(data);

                $('#order_details').modal();

                $('.c-preloader').hide();

            });

        }



        function cartQuantityInitialize(){

            $('.btn-number').click(function(e) {

                e.preventDefault();



                fieldName = $(this).attr('data-field');

                type = $(this).attr('data-type');

                var input = $("input[name='" + fieldName + "']");

                var currentVal = parseInt(input.val());



                if (!isNaN(currentVal)) {

                    if (type == 'minus') {



                        if (currentVal > input.attr('min')) {

                            input.val(currentVal - 1).change();

                        }

                        if (parseInt(input.val()) == input.attr('min')) {

                            $(this).attr('disabled', true);

                        }



                    } else if (type == 'plus') {



                        if (currentVal < input.attr('max')) {

                            input.val(currentVal + 1).change();

                        }

                        if (parseInt(input.val()) == input.attr('max')) {

                            $(this).attr('disabled', true);

                        }



                    }

                } else {

                    input.val(0);

                }

            });



            $('.input-number').focusin(function() {

                $(this).data('oldValue', $(this).val());

            });



            $('.input-number').change(function() {



                minValue = parseInt($(this).attr('min'));

                maxValue = parseInt($(this).attr('max'));

                valueCurrent = parseInt($(this).val());



                name = $(this).attr('name');

                if (valueCurrent >= minValue) {

                    $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')

                } else {

                    alert('Sorry, the minimum value was reached');

                    $(this).val($(this).data('oldValue'));

                }

                if (valueCurrent <= maxValue) {

                    $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')

                } else {

                    alert('Sorry, the maximum value was reached');

                    $(this).val($(this).data('oldValue'));

                }





            });

            $(".input-number").keydown(function(e) {

                // Allow: backspace, delete, tab, escape, enter and .

                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||

                    // Allow: Ctrl+A

                    (e.keyCode == 65 && e.ctrlKey === true) ||

                    // Allow: home, end, left, right

                    (e.keyCode >= 35 && e.keyCode <= 39)) {

                    // let it happen, don't do anything

                    return;

                }

                // Ensure that it is a number and stop the keypress

                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {

                    e.preventDefault();

                }

            });

        }



         function imageInputInitialize(){

             $('.custom-input-file').each(function() {

                 var $input = $(this),

                     $label = $input.next('label'),

                     labelVal = $label.html();



                 $input.on('change', function(e) {

                     var fileName = '';



                     if (this.files && this.files.length > 1)

                         fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);

                     else if (e.target.value)

                         fileName = e.target.value.split('\\').pop();



                     if (fileName)

                         $label.find('span').html(fileName);

                     else

                         $label.html(labelVal);

                 });



                 // Firefox bug fix

                 $input

                     .on('focus', function() {

                         $input.addClass('has-focus');

                     })

                     .on('blur', function() {

                         $input.removeClass('has-focus');

                     });

             });

         }



    </script>


        @yield('script')
    </body>
</html>
