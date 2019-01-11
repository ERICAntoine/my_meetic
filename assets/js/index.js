$("#menu_profil").append("<ul id='hover'></ul>");
$("#hover").append("<li><a href='photo'>Photo</a></li>");
$("#hover").append("<li><a href='change'>Vos Infos</a></li>");


$("#menu_profil").hover(function()
{
    $("#hover").show();
}, function()
{
    $("#hover").hide();
})