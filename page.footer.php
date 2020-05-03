		<script type="text/javascript" src="js/filter.js"></script>
		<script src="js/preview.js"></script>
		
		<script src="js/reyact.js"></script>
		<script src="js/custom.js"></script>
        <script>
            
            $(document).ready(function(){
                //again add Reply
                $(document).on("click",".revpbtn",function(e){
                    e.preventDefault();
                    
                    var rep_id = $(this).data("rev_id");
                    var revp_text = $("#"+rep_id+"").val();
                    var com_id = $('.comm_id').val();
                    //alert(revp_text + com_id);
                    $.ajax({
                        url : 'comment.php',
                        type : 'POST',
                        async : false,
                        data : { 'rep_text' : revp_text, 'rep_id' : com_id},
                        success:function(data,status){
                            // console.log(data);
                            //alert(status);
                            //alert(data);
                            var element = $("#"+rep_id+"").emojioneArea();
                            element[0].emojioneArea.setText('');
                            loaddata();
                        }
                    });
                });
                //reverreply
                $(document).on("click",".rephithit",function(e){
                    e.preventDefault();
                    var com_rep_id = $(this).data("repid");
                    //alert(com_i);
                    // //$(this).next('div').show();
                    $("."+com_rep_id+"").toggle();
                    $("#"+com_rep_id+"").emojioneArea({
                    pickerPosition: "bottom"
                    });
                    //console.log(id);
                });
                //add reply
                $(document).on("click",".repbtn",function(e){
                    e.preventDefault();
                    var rep_id = $(this).data("btn");
                    var rep_text = $("#"+rep_id+"").val();
                    $.ajax({
                        url : 'comment.php',
                        type : 'POST',
                        async : false,
                        data : { 'rep_text' : rep_text, 'rep_id' : rep_id},
                        success:function(data,status){
                            // console.log(data);
                            //alert(status);
                            //alert(data);
                            var element = $("#"+rep_id+"").emojioneArea();
                            element[0].emojioneArea.setText('');
                            loaddata();
                        }
                    });
                });
                //show reply form
                $(document).on("click",".rephit",function(e){
                    e.preventDefault();
                    var com_id = $(this).data("comment_id");
                    //alert(com_id);
                    //$(this).next('div').show();
                    $("."+com_id+"").toggle();
                    $("#"+com_id+"").emojioneArea({
                    pickerPosition: "bottom"
                    });
                    //console.log(id);
                });
                //dainamic emoji
                $(document).on("click",".hit",function(){
                    var id = $(this).data("txt_id");
                    $("#"+id+"").emojioneArea({
                    pickerPosition: "bottom"
                    });
                });
                //add comment
                $(document).on("click",".db",function(e){
                e.preventDefault();
                var id = $(this).data("co_id");
                var comment = $("#"+id+"").val();
                var userid = $('.user').val();
                //alert(comment+userid+id);
                // $("#"+id+"").emojioneArea({
                //     pickerPosition: "bottom"
                // });
                    $.ajax({
                        url : 'comment.php',
                        type : 'POST',
                        async : false,
                        data : { 'comment' : comment, 'userid' : userid,'postid': id },
                        success:function(data,status){
                            // console.log(data);
                            //alert(status);
                            //alert(data);
                            var element = $("#"+id+"").emojioneArea();
                            element[0].emojioneArea.setText('');
                            loaddata();
                        }
                    });
                });
                function loaddata(){
                    $.ajax({
                        url : 'show.php',
                        type :'post',
                        success:function(data){
                            $('.show').html(data);
                        }
                    });
                }
                // $(".reply").addClass('reply-box');
            });
			
		</script>
	</body>
</html>