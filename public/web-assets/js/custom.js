// blogslider start
$('.services-silder').slick({
    dots: false,
    arrows: true,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    autoplay: true,
    slidesToScroll: 1,
    responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});

// blogslider end

// product slider jas start

$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: true,
    centerMode: true,
    focusOnSelect: true
});
// product slider jas end

// simple slick slider start
$(".tab_slider").slick({
    dots: true,
    infinite: true,
    speed: 300,
    autoplay: true,
    slidesToShow: 3,
    slidesToScroll: 1
});

// simple slick slider end

// wow animation js

$(function() {
    new WOW().init();
});


// responsive menu js

$(function() {
    $('#menu').slicknav();
});




// slick slider in tabs js end

// on hover-img-mov

$(".about-img  ").mousemove(function(event) {
    var mousex = event.pageX - $(this).offset().left;
    var mousey = event.pageY - $(this).offset().top;
    var imgx = (mousex - 10) / 100;
    var imgy = (mousey - 10) / 100;
    $(this).find('   .image-abt ').css({
        "transform": "translate(" + imgx + "%   ," + imgy + "%   )",
        "transition": "none"
    });
  
  });
  
  $(".about-img ").mouseout(function() {
      $(this).find('img').css({
          "transform": "translate(0px,0px)",
          "transition": "1s ease-out"
        });
    });
    
    // on hover-img-mov

    $('.range-slider .range-slider__range').change(function(){
        let par = $(this).parent().parent().find('.range-slider__value')
        let rval = $(this).val()
        $('#amount').attr('value',rval)
        let total = $(this).parent().parent().find('#target span').text()
        let percent = (rval / total) * 100 
        let round = (Math.round(percent))
        par.text(rval)
        let totalper = $(this).parent().parent().find('.in-percnt').text(round+ "%");
        
    })
       $('#anonymous').on('change',function(){
        let an = $('input[name="anonymous"]:checked').val()
        if(an == 'on'){
            $('#p_anonymous').val(an);
        }else{
            $('#p_anonymous').val('');
        }
       });

    // $('#donate-form').on('submit',function(e){
        function paypal1(){


     let first_name=$('#first_name').val();
    $('#p_first_name').val(first_name);
    let last_name = $('#last_name').val();
    $('#p_last_name').val(last_name);
    let title = $('#title').val();
    $('#p_title').val(title);
    let email = $('#email').val();
    $('#p_email').val(email);
    let phone_number = $('#phone_number').val();
    $('#p_phone_number').val(phone_number);
    let country = $('#country').val();
    $('#p_country').val(country);
    let address = $('#address').val();
    $('#p_address').val(address);
    let amount = $('#amount').val();
    $('#p_amount').val(amount);
    

    $('#pay-form').submit();
    }


         $('#anonymous').click(function(){
            if($(this).is(':checked')){
                $('.anonymous-donate').attr('disabled',true);
                $('.anonymous-donate').val('');
            }
            else{   
                $('.anonymous-donate').attr('disabled',false);
                // $(this).attr('disabled',false)
            }
           });


    $('#newsletter-form').on('submit',function(e){
    e.preventDefault();
    let newsletter_email = $('#newsletter_email').val();  
    let token = $('#token').val();  
    let route = $('#route').val();  

    $.ajax({
      url: route,
      type:"POST",
      data:{
        "_token": token,
        newsletter_email:newsletter_email,
      },
      success:function(data){
         if(data.success == true){
           toastr.success(data.message);
     } else {
           toastr.error(err.message);
     }
      },
      error: function(response) {
        $('#newsletterErrorMsg').text((response.responseJSON.errors.newsletter_email == undefined)? '' :response.responseJSON.errors.newsletter_email);
      },
    });
    });
        

