
    //  När sidan laddats (all html) så kan vi börja kolla om saker händer
 $(document).ready(function(){
    window.lastPageUpdate = Date.now();

    // const timeElapsed = Date.now();
    // const today = new Date(timeElapsed);

        // Periodically check for new messages every 5 seconds
    setInterval(checkForNewQuestions, 5000);

    function checkForNewQuestions() {

        // let lastQuestionMillis = $(".questionDate").first().text();

        let data = '&function=2&lastQuestion=' + window.lastPageUpdate;

        $.ajax({
            type: "POST",
            url: "/public/OPA/forum/OPA.forum.php",
            data: data,
            success: function(html) {
                    // Update the page with the new messages
                if(html != ""){
                    $("#questionCardFeed").prepend(html);
                }
                
                window.lastPageUpdate = Date.now();
            }
        });
    }

    // function fetchQuestions(courses=true){
    //     // if
    // }


        //  När man klicka på knappen med id:t #askQuestion körs funktionen.
    $("#askQuestion").click(function(){
            //  Vi kollar först om kortet redan syns eller inte, gör det det så tar vi bort det och tvärt om.
        if($("#addQuestionCard").is(":visible")){
                //  .slideUp(300) är en animation som gör att den försvinner på 300 millisekunder.
            $("#addQuestionCard").slideUp(300);
                //  Ändrar även texten på knappen så att det står ask a question.
            $("#askQuestion").text("Ask a question");
          } else {
                //  Samma som föregående fast tvärt om
            $("#addQuestionCard").slideDown(300);
            $("#askQuestion").text("Cancel");
          }
    });
 


        //  När man submittar formen för att posta en question kör functionen:
    $("#addQuestionCard").submit(function(event){
            //  Hindra formen från att ladda om sidan
        event.preventDefault();

            //  Spara data i variabler
        var formData = $("#addQuestionCard").serialize();

        formData += '&function=1'

        var courseID = $("#courseID").val();
        var title = $.trim($("#title").val());
        var content = $.trim($("#content").text());


            //  Kolla om fälten är tomma eller om de innehåller info och stoppa annars posten.
        if(courseID != "" && title != "" && content != ""){
                //  Skapar ett anrop till en annan fil och skicka datan dit som i sin tur postar question
            $.ajax({
              type: "POST",
              url: "/public/OPA/forum/OPA.forum.php",
              data: formData,
              success: function(response){
                checkForNewQuestions();
                    //  Vid success:
                    //  Resetta alla fält i formen
                $("#courseID").val('');
                $("#title").val('');
                $("#content").val('');

                    //  Göm ask a question rutan
                    //  .slideUp(300) är en animation som gör att den försvinner på 300 millisekunder.
                $("#addQuestionCard").slideUp(300);
                    //  Ändrar även texten på knappen så att det står ask a question.
                $("#askQuestion").text("Ask a question");
                // console.log("nice");

              },
                    //  Vid error skriv i konsolen
              error: function(response){
                console.log("Error posting new question");
              }
            });
        } else {
            //  Code for handling uncompleted submit
        }
    });


    let choice = [];

    const filterButtons = $('.filterBut');
    
    //  The first button is speciall, it clears the filter
    const allButton = filterButtons[0];
    filterButtons.splice(0, 1);
    
    $(allButton).on('click', function(){
        //  Removes all of the chosen courses
        choice = [];
        updateQuestions()
    })

        //  .each() Loopar över alla element i children och kör funktionen
    filterButtons.each(function(){
        $(this).on('click', function(){

                //  Checks if the element is in the array choice. If,
                //  the index of the element is returned otherwise -1 is returned
            let indexToRemove = $.inArray($(this).attr('id'), choice);

            if (indexToRemove !== -1) {
                choice.splice(indexToRemove, 1);
            }
            else{
                choice.push($(this).attr('id'));
            }

            // Colors the button on active
            

            updateQuestions();
        })
    });


    function updateQuestions(){
    
        let questions = $("#questionCardFeed").children();
    
            //  .each() Loopar över alla element i children och kör funktionen
        questions.each(function(){

            let hasClass = false;
            if(choice.length > 0){
                for (let i in choice){
                        //  .hasClass kollar om elementet har den specifika klassen eller inte (returnerar true eller false)
                    if ($(this).hasClass(choice[i])){
                        hasClass = true;
                        break;
                    }
                }
            }
            else {
                hasClass = true;
            }

            if (!hasClass){
                    //  Kalkylerar exakt hur långt frågan måste slida för att försvinna + 10 för marginal
                let slideDistance =  ($(window).outerWidth() - $(this).outerWidth())/2 + $(this).outerWidth() + 10;

                    //  Flyttar ut frågan och gömmer den med animation
                $(this).animate({right: -slideDistance}, 400, function() {
                    $(this).hide();
                });

            }
            else {
                //  Flyttar tillbaka frågan så att man kan se den med animation
                $(this).show();
                $(this).animate({right: 0}, 400);
            }
        });        

    }

});