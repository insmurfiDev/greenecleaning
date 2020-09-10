$(document).ready(function($) { 

  $('#mBtn').on('click', function(e) {
    e.preventDefault();
    var link1 = $('.d-mob-link.one');
    var link2 = $('.d-mob-link.two');    
    var link3 = $('.d-mob-link.three');  
    var link4 = $('#mobLoginBtn');
    $('.c-mobmenu').addClass('mob-show');
    link1.animate({
      left: 50,
      top: 2000,
      opacity: 0
    });
    link1.animate({
      left: 0,
      top: 0,
      opacity: 1
    }, 1100);
    link2.animate({
      left: 150,
      top: 2200,
      opacity: 0
    });
    link2.animate({
      left: 0,
      top: 0,
      opacity: 1
    }, 1300);
    link3.animate({
      left: 250,
      top: 2400,
      opacity: 0
    });
    link3.animate({
      left: 0,
      top: 0,
      opacity: 1
    }, 1500);
    link4.animate({
      top: 2600,
      opacity: 0
    });
    link4.animate({
      top: 0,
      opacity: 1
    }, 1700);
  });

  $('#closeMob').on('click', function(e) {
    e.preventDefault();
    $('.c-mobmenu').removeClass('mob-show');
  });

  $('#mobLoginBtn').on('click', function(e) {
    e.preventDefault();
    $('.c-mobmenu').removeClass('mob-show');
  });

  

  $('#nav-tab .nav-link').on('click', function(e) {
    e.preventDefault();
    $('#nav-tab .nav-link').find('img').toggleClass('d-none');
  });

  // Cart
  $('#closeCart').on('click', function(e) {
    e.preventDefault();
    $('.c-cart').removeClass('shown-cart');
  });
  $('#cartBtn').on('click', function(e) {
    e.preventDefault();
    $('.c-cart').addClass('shown-cart');
  });

  // Carousel Slider

  $('.carousel').carousel();
  

  $('.rem-item').on('click', function(){
    $(this).parent('.prod-select').remove();
  });  

  $('.saveForward').on('click', function() {
    if( $('.c-header .itemsSaved, .menu-mob .itemsSaved').hasClass('d-none') ) {
      $('.c-header .itemsSaved, .menu-mob .itemsSaved').removeClass('d-none');
    }
  });

  $('.menu-mob .c-bar, #mob_menu a').on('click', function() {
    $(this).toggleClass('opens');
    $('body').toggleClass('fix');
    $('#mob_menu').toggleClass('shows');
  });

  // Rating
  var r_1 = $('.c-review .one');
  var r_2 = $('.c-review .two');
  var r_3 = $('.c-review .three');
  var r_4 = $('.c-review .four');
  var r_5 = $('.c-review .five');
  r_1.on('click', function() {
    r_1.addClass('checked');
    r_2.removeClass('checked');
    r_3.removeClass('checked');
    r_4.removeClass('checked');
    r_5.removeClass('checked');    
  });
  r_2.on('click', function() {
    r_1.addClass('checked');
    r_2.addClass('checked');
    r_3.removeClass('checked');
    r_4.removeClass('checked');
    r_5.removeClass('checked');    
  });
  r_3.on('click', function() {
    r_1.addClass('checked');
    r_2.addClass('checked');
    r_3.addClass('checked');
    r_4.removeClass('checked');
    r_5.removeClass('checked');    
  });
  r_4.on('click', function() {
    r_1.addClass('checked');
    r_2.addClass('checked');
    r_3.addClass('checked');
    r_4.addClass('checked');
    r_5.removeClass('checked');    
  });
  r_5.on('click', function() {
    r_1.addClass('checked');
    r_2.addClass('checked');
    r_3.addClass('checked');
    r_4.addClass('checked');
    r_5.addClass('checked');    
  });
  // Reviews Author
  $('.c-products__items').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: false,
    dots: false,
    pauseOnHover: true,
    responsive: [{
      breakpoint: 960,
      settings: {
        slidesToShow: 1
      }
    }, {
      breakpoint: 520,
      settings: {
        slidesToShow: 1,
        arrows: false
      }
    }]
  });  

  // $(function () {
  //   $('[data-toggle="popover"]').popover()
  // })

  // Cookie
  // if ( localStorage.getItem('cookieSettings') ){
  //   $('#cookiePanel').removeClass('show');
  // } else {
  //   $('#cookiePanel').addClass('show');
  // }

  // $('#accept-cookie').on('click', function(e) {
  //   e.preventDefault();
  //   $('#cookiePanel').removeClass('show');
  //   const cookieSettings = localStorage.getItem('cookieSettings');
  //   if(!cookieSettings){
  //     localStorage.setItem('cookieSettings', "oke");
  //   }
  // });

  // $('.dropdown .dropdown-item').on('click', function(e) {
  //   e.preventDefault();
  //   var text = $(this).text();
  //   var old = $(this).parent().prev().find('span:first').text();
  //   $(this).text(old);
  //   $(this).parent().prev().find('span:first').text(text);
  // });

  // $(document).on('click', '[data-toggle="lightbox"]', function(event) {
  //   event.preventDefault();
  //   $(this).ekkoLightbox();
  // });
});


$(document).scroll(function() {  
  var header_pos = $(window).scrollTop();
  if (header_pos >= 50) {
    $('.c-header').addClass('move');
  }
  if (header_pos < 50) {
    $('.c-header').removeClass('move');
  }
});

// Custom Select
var x, i, j, selElmnt, a, b, c;x = document.getElementsByClassName("e-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
  });
}

function closeAllSelect(elmnt) {  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

document.addEventListener("click", closeAllSelect);

