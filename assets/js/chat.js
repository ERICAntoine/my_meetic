$(document).ready(function(e){
    $("#submit").click(function(e){
        e.preventDefault();

        if($("#receiver").val() !== "")
        {
                $.ajax({
                    url: "../poo/call/messageinsert.php",
                    data: { message : $("#message").val(), chatWith : $("#receiver").val()},
                    dataType: "json",
                    success: function(data){
                        console.log("hello");
                        if(data == 'Success')
                        {
                            console.log(data);
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
})

//setInterval(getMessages(), 1000);

function getMessages()
{
    $.ajax({
        url: "../poo/call/messengercall.php",
        dataType: "json",
        data: { chatWith : $("#receiver").val() },
        success: function(data)
        {
            console.log(data);
            if(!$(".recent").empty())
            {
                $(".recent").empty();
            }

            for(var i = 0; i < data.length; i++)
            {
                if(data[i]["receiver"] == $("#receiver").val())
                {
                    $(".recent").append("<span class='my message'>"+ data[i]["content"] + "<span class='date'>"+ data[i]["create_at"]+"</span>" +"</span>");
                }
                else
                {
                    $(".recent").append("<span class='receiver message'>"+ data[i]["content"] +"<span class='date'>" +  data[i]["create_at"]+"</span>" + "</span>");

                }
                console.log(data[i]);
            }
        }
    })
}

setInterval(getMessages, 3000);
