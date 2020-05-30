function initslider() {
    $('.slider-container').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow: '.prev-arrow',
        nextArrow: '.next-arrow'
    });
}

function initTentang() {
    let controller = new ScrollMagic.Controller();
    $('.card-tentang').each(function() {
        let animate = new TimelineMax();

        let overlay = $(this).find('.card-tentang-img .overlay')
        let desc = $(this).find('.card-tentang-description')
        let p = $(this).find('.card-tentang-description p')
        let a = $(this).find('.card-tentang-description a')
    
        animate
        .fromTo(overlay, 1, {skewX:30, scale: 3.5}, {skewX: 0, xPercent: 100, transformOrigin: '0% 100%', ease: Power4.easeOut})
        .from(desc, 2, {scaleX: 0, ease: Power4.easeOut}, '-=0.8')
        .from(p, 1, {autoAlpha: 0, x: -30, ease: Power4.easeOut}, '-=0.8')
        .from(a, 1, {autoAlpha: 0, ease: Power4.easeOut}, '-=1.3');
    
        new ScrollMagic.Scene({
            triggerElement: this,
          })
            .setTween(animate)
            .addTo(controller);
    });
}

function initTentangSekolah() {
    let controller = new ScrollMagic.Controller();
    $('.card-tentang-sekolah').each(function() {
        let animate = new TimelineMax();

        let overlay = $(this).find('.card-tentang-sekolah-img .overlay')
        let desc = $(this).find('.card-tentang-sekolah-description')
        let p = $(this).find('.card-tentang-sekolah-description p')
        let a = $(this).find('.card-tentang-sekolah-description a')
    
        animate
        .fromTo(overlay, 1, {skewX:30, scale: 3.5}, {skewX: 0, xPercent: 100, transformOrigin: '0% 100%', ease: Power4.easeOut})
        .from(desc, 2, {scaleX: 0, ease: Power4.easeOut}, '-=0.8')
        .from(p, 1, {autoAlpha: 0, x: -30, ease: Power4.easeOut}, '-=0.8')
        .from(a, 1, {autoAlpha: 0, ease: Power4.easeOut}, '-=1.3');
    
        new ScrollMagic.Scene({
            triggerElement: this,
          })
            .setTween(animate)
            .addTo(controller);
    });
}

function initVisiMisi() {
    let controller = new ScrollMagic.Controller();
    $('.card-visi-misi').each(function() {
        let animate = new TimelineMax();

        let overlay = $(this).find('.card-visi-misi-img .overlay')
        let desc = $(this).find('.card-visi-misi-description')
        let p = $(this).find('.card-visi-misi-description p')
        let a = $(this).find('.card-visi-misi-description a')
    
        animate
        .fromTo(overlay, 1, {skewX:30, scale: 3.5}, {skewX: 0, xPercent: 100, transformOrigin: '0% 100%', ease: Power4.easeOut})
        .from(desc, 2, {scaleX: 0, ease: Power4.easeOut}, '-=0.8')
        .from(p, 1, {autoAlpha: 0, x: -30, ease: Power4.easeOut}, '-=0.8')
        .from(a, 1, {autoAlpha: 0, ease: Power4.easeOut}, '-=1.3');
    
        new ScrollMagic.Scene({
            triggerElement: this,
          })
            .setTween(animate)
            .addTo(controller);
    });
}

function initGallery() {
    let controller = new ScrollMagic.Controller();
    $('.card-gallery').each(function() {
        let animate = new TimelineMax();
        animate
        .fromTo(this, .75, {autoAlpha: 0, x: 650}, {autoAlpha: 1, x: 0, ease: Power4.ease})
        new ScrollMagic.Scene({
            triggerElement: this,
        })
        .setTween(animate)
        .addTo(controller);
    });
}

function initNavbar() {
    $(window).scroll(function (event) {
        var scroll = $(window).scrollTop();
        if(scroll > 0) {
            $(".navbar").addClass("scroll");
        } else {
            $(".navbar").removeClass("scroll");
        }
    });
}

$(document).ready(function(){
    $('.nav-hamburger').click(function(){
        $(".nav-hamburger").toggleClass("active");
        $(".navbar .nav").toggleClass("active");
    });
    initslider();
    initTentang();
    initTentangSekolah();
    initVisiMisi();
    // initGallery();
    initNavbar();
});