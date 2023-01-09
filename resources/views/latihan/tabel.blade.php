<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

    <table class="table">
      <tr>
        <td>aksi</td>
        <td>year</td>
        <td>month</td>
        <td>date</td>
        <td>mon</td>
        <td>tue</td>
        <td>wed</td>
      </tr>
        @foreach($syllabus as $p)
       
        
            <tr>
              <td>
                <a href="http://localhost/idbc/edit.php?id={{ $p->ID }}">
                  Edit
                </a>
              </td>
              <td>{{ $p->ID }}</td>
              <td>{{ $p->Year }}</td>
              <td>{{ $p->month }}</td>
              <td>{{ $p->date }}</td>
              <td>{{ $p->mon }}</td>
              <td>{{ $p->tue }}</td>
              <td>{{ $p->wed }}</td>
            </tr>

        @endforeach
    </table>
    
</body>
</html>