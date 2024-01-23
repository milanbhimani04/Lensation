function getdata(what,who,id,action)
{
    $.ajax({
        url:'miss.php?what='+what+'&who='+who+'&id='+id+'&action='+action,
        type:'POST',
        success: function(data)
        {
            $("#missdata").html(data);
        }
    });
}

function likepost(uuid,ref,uid,pid,what,suu)
{
    $.ajax({
        url:'miss.php?uuid='+uuid+'&ref='+ref+'&uid='+uid+'&pid='+pid+'&what='+what+'&suu='+suu,
        type:'POST',
        success: function(data)
        {
            $("#missindex").html(data);
        }
    });
}

function getuserdata(su,tamekon,tamaroid)
{
    // alert();
    $.ajax({
        url:'miss.php?su='+su+'&tamekon='+tamekon+'&tamaroid='+tamaroid,
        type:'POST',
        success: function(data)
        {
            $("#missuserdata").html(data);
        }
    });
}

function getindex(what,action,id)
{
    $.ajax({
        url:'miss.php?what='+what+'&action='+action+'&id='+id,
        type:'POST',
        success: function(data)
        {
            $("#missindex").html(data);
        }
    });
}

function forrate(why,kone,kon,ketla)
{
    $.ajax({
        url:'miss.php?why='+why+'&kone='+kone+'&kon='+kon+'&ketla='+ketla,
        type:'POST',
        success: function(data)
        {
            $("#missrate").html(data);
        }
    });
}

function getcaptcha(captcha)
{
    $.ajax({
        url:'miss.php?captcha='+captcha,
        type:'POST',
        success: function(data)
        {
            $("#captcha").html(data);
        }
    });
}

function combobox(combo,comboid)
{
    $.ajax({
        url:'miss.php?combo='+combo+'&comboid='+comboid,
        type:'POST',
        success: function(data)
        {
            $("#"+combo+"data").html(data);
        }
    });
}