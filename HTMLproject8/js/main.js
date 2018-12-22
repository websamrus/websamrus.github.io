window.onload=function (e) {
    var circle = document.querySelectorAll('.sliderBlockSwitch__circle');
    var sliderH = document.querySelectorAll('.sliderBlock');

    for (var i=0; i< circle.length; i++){
        circle[i].onclick=function () {
            for (var j=0; j< circle.length; j++){
                circle[j].classList.remove('sliderBlockSwitch__circle-active');
                sliderH[j].classList.remove('sliderBlock-active');
            }
            this.classList.add('sliderBlockSwitch__circle-active');
            sliderH[parseInt( this.getAttribute('data-active'))-1].classList.add('sliderBlock-active');
         };
    }
}





