<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form id="form">
        <input type="text"  class="name form-control" placeholder="name">
        <input type="text"  class="course form-control" placeholder="course">
        <input type="text"  class="email form-control" placeholder="email">
        <input type="text"  class="phone form-control" placeholder="phone no">
        <input  value="Submit" type="submit">
    </form>
    <div class="error_message">

    </div>
    <script>
    $(document).ready( function(){
        $(document).on('submit', '#form', function (e){

            e.preventDefault();
            var data={
                'name': $('.name').val(),
                'course': $('.course').val(),
                'email': $('.email').val(),
                'phone': $('.phone').val(),

            }
            console.log(data);
         
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                     });
                     $.ajax({
                        type: "POST",
                url: "/students/data",
                data: data,
            success:function(response)
            {
                if(response.status==400)
                {
                    $('.error_message').html("");
                        $('.error_message').addClass('alert alert-danger');
                        
                        $.each(response.error, function (key, err_value) {
                            $('.error_message').append('<li>' + err_value + '</li>');
                        });
                }
                else{
                $('.error_message').html('');
                $('.error_message').addClass('alert alert-success');
                $('.error_message').text(response.message);

                }
            }
                     });
           
        });

    });
    </script>

</body>
</html>