$(document).ready(function(){
 
    $("#submit").click(function(e){
        e.preventDefault();
 
        $.post(
            "../poo/call/connexioncall.php",
            {
                email : $("#email").val(),
                password : $("#password").val()
            },
            function(data){

                if(data == 'Success')
                {
                    window.location.href = "personal.php";
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
            'json'
         );
    });
});