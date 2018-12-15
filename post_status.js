$(document).ready(function(){
    $("#sts_btn").click(function(){
       var status = $("#sts_box").val();
        
       data = "s="+ status;
        
        $.ajax({
          method:"post",
          url: "post_sts.php?",
          data: data,
          success: function(data)
            {
                $("#sts_error").html(data);
            }
            
        });
    });
});