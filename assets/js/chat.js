$(document).ready(function(e){
    $("form").submit(function(e){
        e.preventDefault();

        if($("#receiver").val() !== "")
        {
            $.ajax({
                url: "../poo/call/messageinsert.php",
                data: { message : $("#message").val(), chatWith : $("#receiver").val()},
                dataType: "json",
                success: function(data){

                    if(data == 'Success')
                    {
                        console,log(data);
                    }
                    else
                    {
                        const errors = data;
                        $("#resultat").empty();
                        $.each(errors, function(i,value)
                        {
                            $("#resultat").append(`<span class="errors">${value}</span><br/>`);
                        });
                    }  
                },
            });
        }
        else
        {
            console.log(errors);
        }
    });
})