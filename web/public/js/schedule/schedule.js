document.addEventListener("DOMContentLoaded", function(){

    //  Uppdatera schema bild
    // let scheduleImg = document.getElementById('schedule-img');
    let classSelect = document.getElementById('class-select')
    let lessonDiv = document.getElementById('lesson-feed')

    classSelect.addEventListener("change", function(){

        let data = '&function=1&class=' + this.value;

        $.ajax({
            type: "POST",
            url: "/public/OPA/OPA.schedule.php",
            data: data,
            success: function(html){

                lessonDiv.innerHTML = "";
                $(lessonDiv).append(html);

            },
                  //  Vid error skriv i konsolen
            error: function(response){
              console.log("Error Fetching schedule!");
            }
          });

        // className = this.value;
        // scheduleImg.src = "/public/img/schedule/"+className+".png";
        // console.log(img);

    })

})