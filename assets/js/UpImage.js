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
                console.log(data);
            }
        })

        /*$.post(
            "../poo/call/upload.php",
            {
                image : $("#image_upload").val(),
            },
            function(data)
            {
                console.log(data);
            }
        )*/
    })
})