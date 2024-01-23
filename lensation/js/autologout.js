var c=0,log;

clearInterval(log);

$(document).ready(function(){
    //  alert ('hii');
    callkaro();
    $("body").mouseover(function(){
        c=0;
    });
    $("body").click(function(){
        c=0;
    });
    $("body").dblclick(function(){
        c=0;
    });
    $("body").mouseup(function(){
        c=0;
    });
    $("body").mousedown(function(){
        c=0;
    });
    $("body").mouseleave(function(){
        c=0;
    });
    $("body").mouseenter(function(){
        c=0;
    });
    $("body").mousehover(function(){
        c=0;
    });
    $("body").keypress(function(){
        c=0;
    });
    $("body").keydown(function(){
        c=0;
    });
    $("body").keyup(function(){
        c=0;
    });
    $("body").focuse(function(){
        c=0;
    });
    $("body").blur(function(){
        c=0;
    });
    $("body").load(function(){
        c=0;
    });
    $("body").submit(function(){
        c=0;
    });
});

function callkaro()
{
    // alert ('hii');
    log=setInterval(call,15000);
}

function call()
{
    c++;

    if(c) {
        $("#tx").text(c);
    }

    var dt=$("#tx").text();
    
    //  alert (c);

    if(c==120)
    {
        clearInterval(log);
        if(dt.length!=0)
        {
        window.location.href="logout.php";
        }
    }
}

