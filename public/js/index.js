const sliderLeftArrow = document.querySelector(".slider_left_arrow");
const sliderRightArrow = document.querySelector(".slider_right_arrow");

const slider = tns({
    container: ".slider_list",
    items: 1,
    slideBy: "page",
    autoplay: true,
    speed: 1500,
    autoplayTimeout: 5000,
    autoplayHoverPause: false,
    nav: false,
    controls: false,
    mouseDrag: true,
    rewind: false
});

const bottomSlider = tns({
    container: ".bottom_slider_list",
    items: 4,
    slideBy: 1,
    autoplay: true,
    speed: 500,
    autoplayTimeout: 5000,
    autoplayHoverPause: false,
    nav: false,
    controls: false,
    mouseDrag: true,
    rewind: false,
    gutter: 5,
    responsive: {
        1200: {
          items: 4
        },
        700: {
            items: 2 
        },
        0: {
            items: 1
        }
      }
});

const sliderToLeft = () => {
    slider.goTo('prev');
}

const sliderToRight = () => {
    slider.goTo('next');
}

sliderLeftArrow.addEventListener("click", sliderToLeft);
sliderRightArrow.addEventListener("click", sliderToRight);