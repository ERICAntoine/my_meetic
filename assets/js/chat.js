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
                        alert(data);
                    }  
                },
            });
        }
        else
        {
            console.log(errors);
        }
    });

    function getMessages()
    {
        $.ajax({
            url: "../poo/call/messengercall.php",
            dataType: "json",
            data: { chatWith : $("#receiver").val() },
            success: function(data)
            {
                console.log(data);
            }
        })
    }

    setInterval(getMessages(), 3000);
})