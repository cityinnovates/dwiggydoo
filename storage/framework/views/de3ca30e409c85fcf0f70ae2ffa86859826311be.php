

  <script>
    function openModal() {
      document.getElementById("myModal").style.display = "block";
    }

    function closeModal() {
      document.getElementById("myModal").style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      var captionText = document.getElementById("caption");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      captionText.innerHTML = dots[slideIndex - 1].alt;
    }
  </script>
  <script>
    $(function() {

      $("#suggesstion-box a").click(function() {
        var texInputValue = $(this);
        $('.search_left').html(texInputValue);
        $('#suggesstion-box').addClass('hide');
        return false;
  
      });
      $(".search_left").click(function() {
        $(this).parent().siblings('#suggesstion-box').removeClass('hide')
      });
    })

  </script>
  <script type="text/javascript">
    $(function() {

      $(".cmt_ntcation_icon").mouseover(function() {
        $(this).children().css("color", "#f3735f");
      });
      $(".cmt_ntcation_icon").mouseout(function() {
        $(this).children().css("color", "#7E7E7E");
      });

      $(".bl_Convers_heart").click(function() {
        $(this).toggleClass("active");
      });
      $(".bl_mobile_right ").click(function() {
        $(this).siblings().toggleClass("show");
      });
      $(".close_popup").click(function() {
        $('.pp_after').hide("show");
      });
      setTimeout(function() {
        $('.modal.fade').addClass("show");
      }, 300);
      $(".modal .close ").click(function() {
        $('.modal').removeClass("show");
      });
      $("#submitbtn").click(function() {
        $(this).parent().siblings('.login_pp').addClass("active");
      });
     
      // $(".act_frnd_list>li>button").click(function() {
      //   $(this).addClass("active").parent().siblings().children().removeClass('active');
      // });
      $('#nav-icon4').click(function() {
        $(this).toggleClass('open');
      });

    });
    jQuery(function() {
      var pgurl = window.location.href.substr(window.location.href
        .lastIndexOf("/") + 1);
      jQuery(".nav-link").each(function() {
        if (jQuery(this).attr("href") == pgurl || jQuery(this).attr("href") == '')
          jQuery(this).addClass("active").parent().siblings().children().removeClass('active');
      })
    });
  </script>
  <script>
    new WOW().init();
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      // Your Social Stories
      var owlstory = $('.our_story_row');
      owlstory.owlCarousel({
        loop: false,
        nav: false,
        margin: 10,
        responsive: {
          0: {
            items: 1
          },
          360: {
            items: 1
          },
          600: {
            items: 2
          },
          900: {
            items: 3
          },
          1200: {
            items: 4
          }
        }
      });
      owlstory.on('mousewheel', '.owl-stage', function(e) {
        e.preventDefault();
      });
      var owl = $('.owl-carousel');
      owl.owlCarousel({
        items: 1,
        // rtl:true,
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true
      });
      $('.play').on('click', function() {
        owl.trigger('play.owl.autoplay', [1000])
      })
      $('.stop').on('click', function() {
        owl.trigger('stop.owl.autoplay')
      })
    });

    <?php
    if ($weburl != 'registers' && $weburl != 'login') {
      if (!isset(Auth::user()->id)) { ?>



        let timeout;
        timeout = setTimeout(alertFunc, 10000);

        function alertFunc() {
        }


    <?php   }
    }  ?>

    function modals() {
      $('#staticBackdrop').modal('hide');
      $('#dynamicBackdrop').modal('show');
    }

    function modalse() {
      $('#staticBackdrop').modal('show');
      $('#dynamicBackdrop').modal('hide');
    }

    function sendotp(value) {
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      var filter = /^\d*(?:\.\d{1,2})?$/;
      if (emailReg.test(value)) {
        $.ajax({
          type: 'POST',
          url: '<?php echo e(env('
          APP_URL ')); ?>/sendotptoemail',
          data: {
            "email": value,
            "_token": "<?php echo e(csrf_token()); ?>"
          },
          success: function(data) {
            $('#ottp').show();
            //   $("#submitbtn1").prop('disabled', false);
            $("#submitbtn1").show();
            $('#msg').show();
            $('#msg1').hide();
            $('#msg').html(data);
            if (data == "This Email id is not registered with us.") {
              window.location.href = "https://dwiggydoo.com/registers";
            }
          }
        });
      } else if (filter.test(value)) {
        if($('input[name="phone"]').val() != null){
          $('#email').hide();
          $.ajax({
            type: 'POST',
            url: '<?php echo e(env('
            APP_URL ')); ?>/sendotptomobile',
            data: {
              "mobile": value,
              "_token": "<?php echo e(csrf_token()); ?>"
            },
            success: function(data) {
              $('#ottp').show();
              //   $("#submitbtn1").prop('disabled', false);
              $("#submitbtn1").show();

              $('#msg').show();
              $('#msg1').hide();
              $('#msg').html(data);
              if (data == "This number is not registered with us.") {
                window.location.href = "https://dwiggydoo.com/registers";
              }
            }
          });
        }
      } else {
        var msgg = "Not a valid number";
        $('#msg1').show();
        $('#msg').hide();
        $('#msg1').html(msgg);
      }
    }

    function sendotpp() {
      var value = $('#phone').val();
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      var filter = /^\d*(?:\.\d{1,2})?$/;
      if (emailReg.test(value)) {
        $.ajax({
          type: 'POST',
          url: '<?php echo e(env('
          APP_URL ')); ?>/sendotptoemail',
          data: {
            "email": value,
            "_token": "<?php echo e(csrf_token()); ?>"
          },
          success: function(data) {

            $('#msg').html(data);

            $('#msg').show();
            $('#msg1').hide();
            if (data == "This Email id is not registered with us.") {
              window.location.href = "https://dwiggydoo.com/registers";
            }
          }
        });
      } else if (filter.test(value)) {
        $.ajax({
          type: 'POST',
          url: '<?php echo e(env('
          APP_URL ')); ?>/sendotptomobile',
          data: {
            "mobile": value,
            "_token": "<?php echo e(csrf_token()); ?>"
          },
          success: function(data) {

            $('#msg').html(data);

            $('#msg').show();
            $('#msg1').hide();
            if (data == "This number is not registered with us.") {
              window.location.href = "https://dwiggydoo.com/registers";
            }
          }
        });
      } else {
        var msgg = "Not a valid number";
        $('#msg1').show();
        $('#msg').hide();
        $('#msg1').html(msgg);
      }
    }
  </script>





  <script>
    function autocomplete(inp, arr) {
      /*the autocomplete function takes two arguments,
      the text field element and an array of possible autocompleted values:*/
      var currentFocus;
      /*execute a function when someone writes in the text field:*/
      inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) {
          return false;
        }
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
          /*check if the item starts with the same letters as the text field value:*/
          if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
            b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
            });
            a.appendChild(b);
          }
        }
      });
      /*execute a function presses a key on the keyboard:*/
      inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
          /*If the arrow DOWN key is pressed,
          increase the currentFocus variable:*/
          currentFocus++;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 38) { //up
          /*If the arrow UP key is pressed,
          decrease the currentFocus variable:*/
          currentFocus--;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 13) {
          /*If the ENTER key is pressed, prevent the form from being submitted,*/
          e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
          }
        }
      });

      function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
      }

      function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
          x[i].classList.remove("autocomplete-active");
        }
      }

      function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
          if (elmnt != x[i] && elmnt != inp) {
            x[i].parentNode.removeChild(x[i]);
          }
        }
      }
      /*execute a function when someone clicks in the document:*/
      document.addEventListener("click", function(e) {
        closeAllLists(e.target);
      });
    }

    <?php $attributesss = DB::table('breed')->orderBy('created_at', 'desc')->get();
    foreach ($attributesss as $key => $value) {
      $proname[] = $value->name;
    }



    ?>

    /*An array containing all the country names in the world:*/
    var countries = <?= json_encode($proname) ?>;
    autocomplete(document.getElementById("myInput"), countries);
    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
  </script>


  <script type="text/javascript">
    $(function() {
      // Your Social Stories
      var owlstory = $('.our_story_row');
      owlstory.owlCarousel({
        loop: true,
        nav: false,
        margin: 10,
        responsive: {
          0: {
            items: 1
          },
          360: {
            items: 2
          },
          600: {
            items: 3
          },
          1200: {
            items: 4
          }
        }
      });
      owlstory.on('mousewheel', '.owl-stage', function(e) {
        e.preventDefault();
      });
      $(".package_box").hover(
        function() {
          $(this).addClass("active");
          $(this).parent().siblings().children().removeClass("active");
        }
      );
      $(".cnd_drp_btn").click(function() {
        $(".conditions_drop").slideToggle();
        $(this).toggleClass("enable");

      });
      // Preference of Gender of Dog
      $(".genderDD").click(function() {
        $(this).addClass('active');
        $(this).parent().parent('.form-group').siblings().children().children('.active').removeClass('active');
      });
      // Preference of Gender of Dog end
      // chat page 

      $(".chat_option_rgt .acc-pri").click(function() {
        $(".chat_aria_top .accordion").slideToggle();
        $(".chat_option_rgt").toggleClass('add');
      });
      $(".chat_icons img").click(function() {
        $(".chat_icons.media").slideToggle();
        $(".chat_icons.media").css('display', 'flex');
      });
      $(".chat_search_toggle").click(function() {
        $(".chat_srch_input").slideToggle();
      });
      $(".chat_lft_top .nav .nav-link").click(function() {
        $(".chat_sec>.container>.row").toggleClass("active");
      });
      $(".chat-arrow-left").click(function() {
        $(".chat_sec>.container>.row").removeClass("active");
      });
      // chat page end               
      $(".bl_Convers_heart").click(function() {
        $(this).toggleClass("active");
      });
      $(".bl_mobile_right ").click(function() {
        $(this).siblings().toggleClass("show");
      });
      $(".go_ahead").click(function() {
        $('.pp_after').hide("show");
      });
      $(document).ready(function() {
        $("#mymodal2").modal2('show');
      });

      $("#submitbtn").click(function() {
        $(this).parent().siblings('.login_pp').addClass("active");
      });
    
      $('#nav-icon4').click(function() {
        $(this).toggleClass('open');
      });
      $('.dog_gif_btn button').click(function() {
        $('.dog_gif_div').addClass('open');
        if (".dog_gif_div + open") {
          setTimeout(function() {
            $('.dog_gif_div').removeClass('open');
          }, 11100);
        } else {
          $('.dog_gif_div').removeClass('open');
        }
      });


    });
    jQuery(function() {
      var pgurl = window.location.href.substr(window.location.href
        .lastIndexOf("/") + 1);
      jQuery(".nav-link").each(function() {
        if (jQuery(this).attr("href") == pgurl || jQuery(this).attr("href") == '')
          jQuery(this).addClass("active").parent().siblings().children().removeClass('active');
      })
    });
    
     $(".act_frnd_bar").click(function() {
    $(this).siblings().toggleClass("show");
  });

  $(".act_frnd_list>li>button").click(function() {
    $(this).addClass("active").parent().siblings().children().removeClass('active');
  });
  </script>

  <script>
    new WOW().init();
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      var owl = $('.owl-carousel');
      owl.owlCarousel({
        items: 1,
        rtl: true,
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true
      });
      $('.play').on('click', function() {
        owl.trigger('play.owl.autoplay', [1000])
      })
      $('.stop').on('click', function() {
        owl.trigger('stop.owl.autoplay')
      })

    });
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $('.slider-rewards').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 6,
      slidesToScroll: 4,
      responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,

          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });


    $('.slider-redeem-now').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 2,
      slidesToScroll: 4,
      responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });



    $('.slider-redeem-now-full').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
  </script>

  <script>
    class SlideStories {
      constructor(id) {
        this.slide = document.querySelector(`[data-slide=${id}]`);
        this.active = 0;
        this.init();
      }

      activeSlide(index) {
        this.active = index;
        this.items.forEach((item) => {
          item.classList.remove("active");
        });
        this.items[index].classList.add("active");
        this.thumbItems.forEach((item) => {
          item.classList.remove("active");
        });
        this.thumbItems[index].classList.add("active");
        this.autoSlide();
        console.log(this.thumbItems.classList);
      }

      prev() {
        if (this.active > 0) {
          this.activeSlide(this.active - 1);
        } else {
          this.activeSlide(this.items.length - 1);
        }
      }

      next() {
        if (this.active < this.items.length - 1) {
          this.activeSlide(this.active + 1);
        } else {
          this.activeSlide(0);
        }
      }

      addNavigation() {
        const nextBtn = this.slide.querySelector(".slide-next");
        const prevBtn = this.slide.querySelector(".slide-prev");
        nextBtn.addEventListener("click", this.next);
        prevBtn.addEventListener("click", this.prev);
      }

      addThumbItems() {
        this.items.forEach(() => (this.thumb.innerHTML += `<span></span>`));
        this.thumbItems = Array.from(this.thumb.children);
      }

      autoSlide() {
        clearTimeout(this.timeout);
        this.timeout = setTimeout(this.next, 5000);
      }

      init() {
        this.next = this.next.bind(this);
        this.prev = this.prev.bind(this);
        this.items = this.slide.querySelectorAll(".slide-items > *");
        this.thumb = this.slide.querySelector(".slide-thumb");
        this.addThumbItems();
        this.activeSlide(0);
        this.addNavigation();
      }
    }

    new SlideStories("slide");
  </script><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/inc/common_script.blade.php ENDPATH**/ ?>