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
        <input type="text"  id="name form-control" placeholder="name">
        <input type="text"  id="course form-control" placeholder="course">
        <input type="text"  id="email form-control" placeholder="email">
        <input type="text"  id="phone form-control" placeholder="phone no">
        <input  value="update" type="submit">
    </form>
    <script>
        $(document).ready(function()
    {
$('#form','submit',function(e)
{
    e.preventDefault();
    var stud_id=$(this).val();
    $.ajax({
url:"/edit-student/"+stud_id,
type:"GET",
success:function(response)
{
    $('#name').val(response.student.name);
                        $('#course').val(response.student.course);
                        // $('#email').val(response.student.email);
                        $('#phone').val(response.student.phone);
                        // $('#stud_id').val(stud_id); 
}
    });
});
    });
    </script>
</body>
</html>