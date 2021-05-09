<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Director</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap1.min.css')}}" >
<body>

<div class="container">

  <div class="row">
   <div class="col-md-12">
    <br />
    <h3 aling="center">Add New Director</h3>
    <br />
    @if(count($errors) > 0)
    <div class="alert alert-danger">
     <ul>
     @foreach($errors->all() as $error)
      <li>{{$error}}</li>
     @endforeach
     </ul>
    </div>
    @endif
    @if(\Session::has('success'))
    <div class="alert alert-success">
     <p>{{ \Session::get('success') }}</p>
    </div>
    @endif
    <form method="post" action="{{url('director')}}">
       {{csrf_field()}}
     <div class="form-group">
      <input type="text" name="director_name" class="form-control" placeholder="Enter Director Name" />
    </div>
       <div class="form-group">
       			 <select class="custom-select" name="director_gender">
         				<option value="0" selected disabled>Select Gender</option>
         				<option value="male">Male</option>
         				<option value="female">Female</option>
       			</select>
           </div>
     <div class="form-group">
    <input  type="text" class="form-control" name="director_birth" placeholder=" Birth Date" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}"/>
     </div>
     <div class="form-group">
      <input type="text" name="director_country" class="form-control" placeholder="Enter Director's Country" />
    </div>
     <div class="form-group">
      <input type="submit" class="btn btn-primary" />
     </div>
     <div class="form-group">
       <button type="button" class="btn ">
         <a href="/directorshow" >SHOW MOVIE LIST</a>
 </button>
     </div>
    </form>
   </div>
  </div>

</div>
<script src="{{asset('js/jquery-3.4.1.min.js')}}" ></script>
<script src="{{asset('js/popper.min.js')}}" ></script>
<script src="{{asset('js/bootstrap.min.js')}}" ></script>
</body>
</html>
