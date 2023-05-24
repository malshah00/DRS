<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>view staff list</title>
</head>
<body>
        <h1>Staff List</h1>
        <table>
          <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Phone Number</td>
            <td>Expert</td>
            <td>Action</td>
          </tr>
          @foreach ($staff as $sta)
          <tr>
            <td>{{$sta['sname']}}</td>
            <td>{{$sta['staffemail']}}</td>
            <td>{{$sta['sphone']}}</td>
            <td>{{$sta['expert']}}</td>
            <td><button>delete</button></td>
          </tr>
          @endforeach
        </table>
</body>
</html>