
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
 
    


});