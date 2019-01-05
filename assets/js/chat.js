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
                //console.log(data.length);
                for(var i = 0; i < data.length; i++)
                {
                    $(".recent").append("<span class='message'>"+ data[i]["content"] +"</span><br/>");

                    console.log(data[i]["content"]);
                }
            }
        })
    }

    setInterval(getMessages(), 3000);
})