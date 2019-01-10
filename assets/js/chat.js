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
                if(!$(".recent").empty())
                {
                    $(".recent").empty();
                }

                for(var i = 0; i < data.length; i++)
                {
                    if(data[i]["receiver"] == $("#receiver").val())
                    {
                        $(".recent").append("<span class='my message'>"+ data[i]["content"] +"</span>");
                    }
                    else
                    {
                        $(".recent").append("<span class='receiver message'>"+ data[i]["content"] +"</span>");

                    }
                    console.log(data[i]);
                }
            }
        })
    }

    setInterval(getMessages(), 1000);
})
