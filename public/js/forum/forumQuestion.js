 
    //  När sidan laddats (all html) så kan vi börja kolla om saker händer
 $(document).ready(function(){
    //  När sidan laddats, skapa ett objekt som kan söka i url:n efter parametrar
    const searchParams = new URLSearchParams(location.search);

    //  När man submittar formen för att posta en question kör functionen:
    $("#answerQuestionCard").submit(function(event){
        //  Hindra formen från att ladda om sidan
    event.preventDefault();

        //  Spara data i variabler
    let formData = $("#answerQuestionCard").serialize();

        //  Hämtar questionID:t från url:n och adderar den till formdata
    let questionID = searchParams.get("question");
    formData += '&questionID=' + questionID;

        //  Hämtar contentet så att vi kan kolla så att det inte är en tom sträng
    let answerContent = $("#newAnswerContent").val();


        //  Kolla om fälten är tomma eller om de innehåller info och stoppa annars post:en.
    if(answerContent != ""){
            //  Skapar ett anrop till en annan fil och skickar datan dit som i sin tur postar answer
        $.ajax({
        type: "POST",
        url: "/public/OPA/forum/OPA.question.php",
        data: formData,
        success: function(response){
            console.log(response);
                //  Vid success:
                //  Resetta alla fält i formen
            $("#newAnswerContent").val('');


        },
                //  Vid error skriv i konsolen
        error: function(response){
            console.log("Error posting new Answer!");
        }
        });
    } else {
        //  Code for handling uncompleted submit
    }
});




});