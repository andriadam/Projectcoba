$('.page-scroll').on('click', function () {

  //ambil isi href
  var tujuan = $(this).attr('href');

  //tangkap elemen
  var elemenTujuan = $(tujuan);

  //pindahkan scroll
  $('html,body').animate({
    scrollTop: elemenTujuan.offset().top - 100
  }, 800, 'easeInOutExpo');

  e.preventDefault();

});



// Jumbotron
$(window).scroll(function () {
  var wScroll = $(this).scrollTop();

  $('.buka h2').css({
    'transform': 'translate(0px, ' + wScroll / 15 + 'px)'
  });

  $('.buka .line-s').css({
    'transform': 'translate(0px, ' + wScroll / 2 + 'px)'
  });

  $('.buka .jam').css({
    'transform': 'translate(0px, ' + wScroll / 10 + 'px)'
  });

  if (wScroll > $('.why').offset().top - 200) {
    $('.why').each(function (i) {
      setTimeout(function () {
        $('.why').eq(i).addClass('mengapa_muncul');
      }, 300 * i);
    });
  };

  if (wScroll > $('.galeri').offset().top - 200) {
    $('.galeri .img-thumbnail').each(function (i) {
      setTimeout(function () {
        $('.galeri .img-thumbnail').eq(i).addClass('muncul');
      }, 200 * (i + 1));
    })
  };

  if (wScroll > $('section').offset().top - 200) {
    setTimeout(function () {
      $('section .line-title').addClass('muncul');
    }, 50 * (1))
  };
});
