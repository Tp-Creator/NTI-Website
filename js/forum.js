
    //  När sidan laddats (all html) så kan vi börja kolla om saker händer
 $(document).ready(function(){

        //  När man klicka på knappen med id:t #askQuestion körs funktionen.
    $("#askQuestion").click(function(){
        if($("#askNewQuestionCard").is(":visible")){
            $("#askNewQuestionCard").hide();
            $("#askQuestion").text("Ask a question");
          } else {
            $("#askNewQuestionCard").show();
            $("#askQuestion").text("Cancel");
          }
    });
 
});