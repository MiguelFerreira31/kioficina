
// BANNER - SLIDE
$('.slide').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  dots: true,
  autoplaySpeed: 2000,
});

// MARCAS - SLIDE
$('.marcas div div').slick({
  slidesToShow: 7,
  slidesToScroll: 1,
  arrows: false,  // Desativa as setas de navegação
  autoplay: true,
  autoplaySpeed: 2000,
});

// DEPO - SLIDE
$('.slide-depo').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  fade: true,
  autoplaySpeed: 2000,
});


const observer = new MutationObserver(() => {
  if (document.body.style.paddingRight === '17px') {
    document.body.style.paddingRight = '0';
  }
});
observer.observe(document.body, { attributes: true, attributeFilter: ['style'] });