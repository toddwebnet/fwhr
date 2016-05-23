$(document).ready(function ()
{
    if ($('#loginForm').length > 0)
    {
        $('#loginForm').on('submit', function (e)
        {
            e.preventDefault();
            loginFormSubmit();
        });
    }
});

function showLoading()
{
    $("#divLoading").show();
}
function hideLoading()
{
    $("#divLoading").hide();
}

function loginFormSubmit()
{
    showLoading();
    $("#loginErr").hide(255);
    url2Post = "/?f=procLogin&t=ajax";
    PostVars = $('#loginForm').serialize();
    $.ajax({
        url: url2Post,
        type: "POST",
        data: PostVars,
        dataType: "json",
        cache: false
    }).done(function (data)
    {
        hideLoading();
        if (data.pass == 1)
        {
            location.reload();
        }
        else
        {
            $("#loginErr").html(data.err);
            $("#loginErr").show(255);
        }
    });
}

function logoutSubmit()
{
    showLoading();
    url2Post = "/?f=procLogout&t=ajax";
    $.ajax({
        url: url2Post,
        cache: false
    }).done(function ()
    {
        hideLoading();
        location.reload();

    });
}