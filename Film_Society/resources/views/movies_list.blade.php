<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>movie list</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap1.min.css')}}" >
  </head>
  <body>
    <table class="table table-bordered">

<thead>

<tr>

<th>Name</th>

<th>Director Name</th>

<th>Main Actor</th>

<th>Main Actress</th>

<th>Release Date</th>

<th>Country</th>

<th>Type</th>

</tr>

</thead>

<tbody>



@foreach($users as $value)

<tr>

<td>{{ $value->nm }}</td>

<td>{{ $value->mdnm }}</td>

<td>{{ $value->msnm }}</td>

<td>{{ $value->ms1nm }}</td>

<td>{{ $value->rd }}</td>

<td>{{ $value->c }}</td>

<td>{{ $value->t }}</td>



</tr>

@endforeach

</tbody>

</table>

</div>
  </body>
</html>
