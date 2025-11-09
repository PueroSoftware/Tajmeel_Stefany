/* script.js */
document.querySelectorAll('[data-slider]').forEach(slider=>{
const imgs = slider.querySelectorAll('img');
const prev = slider.querySelector('.prev');
const next = slider.querySelector('.next');
let index=0;


function showImage(i){
imgs.forEach(img=>img.classList.remove('active'));
imgs[i].classList.add('active');
}


prev.addEventListener('click',()=>{
index=(index-1+imgs.length)%imgs.length;
showImage(index);
});


next.addEventListener('click',()=>{
index=(index+1)%imgs.length;
showImage(index);
});


setInterval(()=>{
index=(index+1)%imgs.length;
showImage(index);
},4000);
});