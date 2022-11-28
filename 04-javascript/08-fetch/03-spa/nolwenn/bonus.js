
// const btn = video.querySelector('button');

// btn.addEventListener("pointerdown", minimize)

function minimize(){
    const video = document.querySelector('.video');
    const nav = document.querySelector('nav');
    nav.append(video);
    video.classList.add("mini");
}