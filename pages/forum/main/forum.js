
    //  När sidan laddats (all html) så kan vi börja kolla om saker händer
 $(document).ready(function(){


        //  När man klicka på knappen med id:t #askQuestion körs funktionen.
    $("#askQuestion").click(function(){
            //  Vi kollar först om kortet redan syns eller inte, gör det det så tar vi bort det och tvärt om.
        if($("#askNewQuestionCard").is(":visible")){
                //  .slideUp(300) är en animation som gör att den försvinner på 300 millisekunder.
            $("#askNewQuestionCard").slideUp(300);
                //  Ändrar även texten på knappen så att det står ask a question.
            $("#askQuestion").text("Ask a question");
          } else {
                //  Samma som föregående fast tvärt om
            $("#askNewQuestionCard").slideDown(300);
            $("#askQuestion").text("Cancel");
          }
    });
 


        //  När man submittar formen för att posta en question kör functionen:
    $("#askNewQuestionCard").submit(function(event){
            //  Hindra formen från att ladda om sidan
        event.preventDefault();

            //  Spara data i variabler
        var formData = $("#askNewQuestionCard").serialize();

        var courseID = $("#courseID").val();
        var title = $.trim($("#title").val());
        var content = $.trim($("#content").val());


            //  Kolla om fälten är tomma eller om de innehåller info och stoppa annars posten.
        if(courseID != "" && title != "" && content != ""){
                //  Skapar ett anrop till en annan fil och skicka datan dit som i sin tur postar question
            $.ajax({
              type: "POST",
              url: "addAQuestion.php",
              data: formData,
              success: function(response){
                    //  Vid success:
                    //  Resetta alla fält i formen
                $("#courseID").val('');
                $("#title").val('');
                $("#content").val('');

                    //  Göm ask a question rutan
                    //  .slideUp(300) är en animation som gör att den försvinner på 300 millisekunder.
                $("#askNewQuestionCard").slideUp(300);
                    //  Ändrar även texten på knappen så att det står ask a question.
                $("#askQuestion").text("Ask a question");
                console.log("nice");

              },
                    //  Vid error skriv i konsolen
              error: function(response){
                console.log("Error posting new question!");
              }
            });
        } else {
            //  Code for handling uncompleted submit
        }
    });

    


});