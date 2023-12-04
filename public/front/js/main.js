
// Swiper js section Start here

var swiper = new Swiper(".mySwiper", {
    effect: "coverflow",
    loop:true,
    autoplay:true,
    grabCursor: true,
    centeredSlides: true,
    spaceBetween: 10,
    slidesPerView: "auto",
    coverflowEffect: {
        rotate: 5,
        stretch: 0,
        depth: 150,
        modifier: 1,
        slideShadows: false,
    },
    pagination: {
        el: ".swiper-pagination",
    },
});
// Range Slider End here

var slider = document.getElementById("myRange");
var output = document.getElementById("demo1");
output.innerHTML = slider.value;

slider.oninput = function() {
    output.innerHTML = this.value;
}

// Range Slider 2 End here



var slider2 = document.getElementById("myRange2");
var output2 = document.getElementById("demo2");
output2.innerHTML = slider2.value;

slider2.oninput = function() {
    output2.innerHTML = this.value;
}

// Range Slider 2 End here

// Manipulate SwiperJs Start here
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    centeredSlides: true,
    spaceBetween: 30,
    pagination: {
        el: ".swiper-pagination",
        type: "fraction",
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

// Manipulate SwiperJs End here

