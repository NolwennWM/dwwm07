"use strict";
const images = ["../../ressources/images/img1.jpg","../../ressources/images/img2.jpg","../../ressources/images/img3.jpg"];

window.addEventListener("click", addSlider)
async function addSlider(){
    const sliderJS = await import("./slider.js")
    const slider = sliderJS.create(images);
    document.body.append(slider);
    sliderJS.default();
    window.removeEventListener("click", addSlider);
}