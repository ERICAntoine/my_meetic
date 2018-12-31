
$(".display")[0].style.display = "block";
let i = 1;
console.log($(".display"));


$("#arrowNext").click(function()
{
    const lengthCarousel = $(".display").length;
    console.log(i);

    for(var j= 0; j < lengthCarousel; j++)
    {
        if($(".display").eq(j).css("display") == "block")
        {
            $(".display").eq(j).css("display", "none");
        }        
    }

    if(i < lengthCarousel)
    {
        $(".display").eq(i).css("display", "block");
        i++;
    }
    else
    {
        i = 0;
    }
})

$("#arrowBack").click(function()
{
    
    const lengthCarousel = $(".display").length;

    for(var j= 0; j < lengthCarousel; j++)
    {
        if($(".display").eq(j).css("display") == "block")
        {
            $(".display").eq(j).css("display", "none");
        }        
    }

    if(i > 0)
    {
        $(".display").eq(i-1).css("display", "block");
        i--;
    }
    else
    {
        i = lengthCarousel;
    }
    console.log(i);
})