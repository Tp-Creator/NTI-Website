document.addEventListener("DOMContentLoaded", function(){

    //  Uppdatera schema bild
    let scheduleImg = document.getElementById('schedule-img');
    let classSelect = document.getElementById('class-select')

    console.log(classSelect);

    classSelect.addEventListener("change", function(){

        className = this.value;
        scheduleImg.src = "/public/img/schedule/"+className+".png";
        // console.log(img);

    })

})