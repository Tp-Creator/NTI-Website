$(document).ready(function(){
    // for every button add event listner on click
    buttons = $(".menuitem");
    console.log(buttons);
    buttons.each(function(){
        $(this).on("click", function(){
        console.log("heheheh");
        console.log(this.id);
        deleteMenuItem(this.id);
    })});


    function deleteMenuItem(id){
        
        const data = 'id=' + id + "&function=2";

        //  Skapar ett anrop till en annan fil och skickar datan dit som i sin tur postar answer
        $.ajax({
        type: "POST",
        url: "/public/OPA/OPA.lunchadmin.php",
        data: data,
        success: function(response){
            console.log(response);
            
            // Removes the div that the button is currently in.
            $("#div"+id).remove();
            console.log("Deleted item");
        },

        error: function(response){
            console.log(response);
            console.log("Error deleting item!");
        }
        });
    }


    //  När man submittar formen för att posta kör functionen:
    $("#form").submit(function(event){
        //  Hindra formen från att ladda om sidan
    event.preventDefault();
    console.log("nice")

        //  Sparar data i variabler
    const date = $.trim($("#date").val());
    const food = $.trim($("#food").val());
    const vegfood = $.trim($("#vegfood").val());

        //  Hämtar questionID:t från url:n och skapar en sträng med informationen ifråm av url variabel
    data = 'date=' + date + '&food=' + food + '&vegfood=' + vegfood + "&function=1";
    console.log(data)

        //  Kolla om fälten är tomma eller om de innehåller info och stoppa annars post:en.
    if (date != "" && food != "" && vegfood != ""){
            //  Skapar ett anrop till en annan fil och skickar datan dit som i sin tur postar answer
        $.ajax({
        type: "POST",
        url: "/public/OPA/OPA.lunchadmin.php",
        data: data,
        success: function(response){
            // console.log(response);
            
            // Itterates the date to the next day
            const currentDate = $("#date").val();
            let newDate = new Date((Date.parse(currentDate)).valueOf() + 1000*3600*24);
            $("#date").val(newDate.toISOString().split('T')[0]);

            // empties the text boxes
            $("#food").val('');
            $("#vegfood").val('');
            console.log("Sent to db")
        },

                //  Vid error skriv i konsolen
        error: function(response){
            console.log("Error posting new Answer!");
        }
        });
    } else {
        //  Code for handling uncompleted submit
    }


    
        


})});