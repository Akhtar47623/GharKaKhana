
// counter

// blogslider start
$('.blogslid').slick({
  dots: true,
  arrows:true,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 4,
  responsive: [
    {
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
$(".wasit-sli").slick({
  dots: true,
  arrows: true,
  infinite: true,
  // speed:3000,
  autoplay:true,
  slidesToShow: 2,
  slidesToScroll: 1
});

// simple slick slider end

// wow animation js 

    $('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});


  $("#scrol-top").hide();
$(window).scroll(function() {
    if ($(window).scrollTop() > 100) {
        $("#scrol-top").fadeIn("slow");
    }
    else {
        $("#scrol-top").fadeOut("fast");
    }
});



$(function () {
    new WOW().init();
  });


// responsive menu js 

$(function () {
  $('#menu').slicknav();
});

$(window).scroll(function(){
  var sticky = $('.sticky'),
      scroll = $(window).scrollTop();

  if (scroll >= 100) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});


function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  // document.getElementById("rgbs").style.backgroundColor = "rgba(0,0,0,0.4)";
  // document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  // document.body.style.backgroundColor = "white";
}

// slick slider in tabs js start

function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace("active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += "active";
}

function pheight() {
  document.getElementById("myBtn").style.height = "100%";
}
function pheight1() {
  document.getElementById("myBtn1").style.height = "100%";
}
function pheight2() {
  document.getElementById("myBtn2").style.height = "100%";
}
function pheight3() {
  document.getElementById("myBtn3").style.height = "100%";
}
function pheight4() {
  document.getElementById("myBtn4").style.height = "100%";
}
function pheight5() {
  document.getElementById("myBtn5").style.height = "100%";
}
function pheight6() {
  document.getElementById("myBtn6").style.height = "100%";
}
function pheight7() {
  document.getElementById("myBtn7").style.height = "100%";
}
function pheight8() {
  document.getElementById("myBtn8").style.height = "100%";
}
function pheight9() {
  document.getElementById("myBtn9").style.height = "100%";
}
function pheight10() {
  document.getElementById("myBtn10").style.height = "100%";
}


// slick slider in tabs js end

