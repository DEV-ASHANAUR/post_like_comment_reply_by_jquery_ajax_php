$(document).ready(function () {
    //add comment
    
    //post script
    $("form#data").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var title = $('#title').val();
        var detalis = $('#detalis').val();
        if (!title == '' && !detalis == '') {
            $.ajax({
                url: 'post.php',
                type: 'POST',
                data: formData,
                success: function (data, status) {
                    //alert(status);
                    //alert(data);
                    loaddata();
                    //$('#data').trigger("reset");
                    var element = $('#detalis').emojioneArea();
                    element[0].emojioneArea.setText('');
                    $('#data')[0].reset();
                    
                },
                cache: false,
                contentType: false,
                processData: false
            });
        } else {
            alert("Please Fill Out!")
        }

    });

    //loaddata script
    function loaddata(){
        $.ajax({
            url : 'show.php',
            type :'post',
            success:function(data){
                $('.show').html(data);
            }
        });
    }
    
    loaddata();

    //like process
    




















});