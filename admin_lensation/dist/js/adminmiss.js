function getdata(what,action,id)
{
    //alert(what);
    $.ajax({
        url:'adminmiss.php?what='+what+'&action='+action+'&id='+id,
        type:'POST',
        success: function(data)
        {
            $("#missdata").html(data);
        }
    });
}


// aa maru 6

function product(data,proid)
{
    //alert(what);
    $.ajax({
        url:'adminmiss.php?data='+data+'&proid='+proid,
        type:'POST',
        success: function(data)
        {
            $("#missmodal").html(data);
        }
    });
}