$(document).ready(function(){
    //emoji script
    

    $("#detalis").emojioneArea({
        pickerPosition: "bottom"
    });
    // $("#emoji").emojioneArea({
    //     pickerPosition: "bottom"
    // });
    
    //like process
    $(document).on("click",".like",function(e){
        e.preventDefault();
        var postid = $(this).data("id");
        //alert(postid);
        $.ajax({
            url : 'server.php',
            type : 'POST',
            async : false,
            data : { 'postid' : postid, 'liked' : 1 },
            success:function(data,status){
                // console.log(data);
                //alert(status);
                loaddata();
            }
        });
    });
    //unlike process
    $(document).on("click",".unlike",function(e){
        e.preventDefault();
        var postid = $(this).data("id");
        //alert(postid);
        $.ajax({
            url : 'server.php',
            type : 'POST',
            async : false,
            data : { 'postid' : postid, 'unliked' : 1 },
            success:function(data,status){
                // console.log(data);
                //alert(status);
                loaddata();
            }
        });
    });
    //show data
    function loaddata(){
        $.ajax({
            url : 'show.php',
            type :'post',
            success:function(data){
                $('.show').html(data);
            }
        });
    }
});
