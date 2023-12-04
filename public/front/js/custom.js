function myPlugin({ swiper, extendParams, on }) {
    extendParams({
        debugger: false,
    });

    on('init', () => {
        if (!swiper.params.debugger) return;
        console.log('init');
    });
    on('click', (swiper, e) => {
        if (!swiper.params.debugger) return;
        console.log('click');
    });
    on('tap', (swiper, e) => {
        if (!swiper.params.debugger) return;
        console.log('tap');
    });
    on('doubleTap', (swiper, e) => {
        if (!swiper.params.debugger) return;
        console.log('doubleTap');
    });
    on('sliderMove', (swiper, e) => {
        if (!swiper.params.debugger) return;
        console.log('sliderMove');
    });
    on('slideChange', () => {
        if (!swiper.params.debugger) return;
        console.log(
            'slideChange',
            swiper.previousIndex,
            '->',
            swiper.activeIndex
        );
    });
    on('slideChangeTransitionStart', () => {
        if (!swiper.params.debugger) return;
        console.log('slideChangeTransitionStart');
    });
    on('slideChangeTransitionEnd', () => {
        if (!swiper.params.debugger) return;
        console.log('slideChangeTransitionEnd');
    });
    on('transitionStart', () => {
        if (!swiper.params.debugger) return;
        console.log('transitionStart');
    });
    on('transitionEnd', () => {
        if (!swiper.params.debugger) return;
        console.log('transitionEnd');
    });
    on('fromEdge', () => {
        if (!swiper.params.debugger) return;
        console.log('fromEdge');
    });
    on('reachBeginning', () => {
        if (!swiper.params.debugger) return;
        console.log('reachBeginning');
    });
    on('reachEnd', () => {
        if (!swiper.params.debugger) return;
        console.log('reachEnd');
    });
}


// Init Swiper
var swiper = new Swiper('.swiper', {
    // Install Plugin To Swiper
    loop:true,
    autoplay:true,
    slidesPerView: 3,
    centeredSlides: true,
    spaceBetween: 30,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    // Enable debugger
    debugger: true,
});

// Show 4 Items at a one time
var items = document.querySelectorAll('.carousel .carousel-item');
items.forEach((e) =>{
    const slide =5;
    let next = e.nextElementSibling;
    for (var i = 0; i<slide; i++ ){
        if(!next){
            next = items[0]
        }
        let clonechild = next.cloneNode(true)
        e.appendChild(clonechild.children[0])
        next = next.nextElementSibling
    }
});
