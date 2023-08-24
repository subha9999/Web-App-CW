<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promocode apply project in php</title>
    <link rel="stylesheet" href="stylesheet.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h2></h2>
        <div class="form-group">
            <label for="total_price">Total Price:</label><br>
            <input type="text"  id="total_price" name="total_price" value="1000.0">
        </div>
        <div class="form-group">
            <label for="promo_code">Apply Promocode:</label><br>
            <input type="text"  id="coupon_code" placeholder="Apply Promocode" name="coupon_code">
            <b><span id="message" style="color:green;"></span></b>
        </div>
        <button id="apply" class="mybtn">Apply</button>
        <button id="edit" class="my btn" style="display:none;">Edit</button>
    </div>
    <script>
        $("#apply").click(function(){
    if($('#coupon_code').val()!=''){
        $.ajax({
            type:"POST",
            url:"process.php",
            data:{
                coupon_code: $('#coupon_code').val()
            },
            success: function(dataResult){
                var dataResult=JSON.parse(dataResult);
                if(dataResult.statusCode==200){
                    var after_apply = dataResult.value;

                    $('#total_price').val(after_apply);
                    $('#apply').hide();
                    $('#edit').show();
                    $('#message').html("Promocode applied successfully !");

                }
                else if(dataResult.statusCode==201){
                    $('#message').html("Invalid Promocode !");

                }
            }
        });

    }
    else{
        $('#message').html("Promocode cannot be blank.Enter a valid Promocode !");

    }
});
$("#edit").click(function(){
    $('#coupon_code').val("");
    $('#apply').show();
    $('#edit').hide();
    location.reload();
});
    </script>
</body>
</html>