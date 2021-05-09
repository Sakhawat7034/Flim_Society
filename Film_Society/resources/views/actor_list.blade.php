<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>actor list</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap1.min.css')}}" >
  </head>
  <body>
    <table class="table table-bordered">

<thead>

<tr>

<th>Name</th>

<th>Country</th>

<th>Birth Date</th>

<th>Gender </th>


</tr>

</thead>

<tbody>


@foreach($users as $value)

<tr>

<td>{{ $value->name}}</td>

<td>{{ $value->country}}</td>

<td>{{ $value->birthdate}}</td>

<td>{{ $value->gender}}</td>

<td>{{ $value->age}}</td>

<td><a href='edit/{{ $value->star_id }}'>Update</a></td>




</tr>

@endforeach

</tbody>

</table>

</div>
  </body>
</html>
