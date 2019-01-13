$(document).ready(function(e)
{
    $("#image_upload").change(function(e)
    {
        $("#upload").submit();    
    });

    $("#upload").submit(function(e)
    {
        e.preventDefault();

        $.ajax({
            url: "../poo/call/upload.php",
            type: "POST",
            data:  new FormData(this),
            dataType: "text",
            contentType: false,
            cache: false,
            processData:false,
            success: function response(data)
            {
                if(data == "success")
                {
                    window.location.replace("http://localhost/my_meetic/pages/personal.php");
                }
                else
                {
                    alert(data);
                }
            }
        })
    })
})