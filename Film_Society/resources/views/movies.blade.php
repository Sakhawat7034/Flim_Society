<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Movies</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap1.min.css')}}" >
<body>

<div class="container">

  <div class="row">
   <div class="col-md-12">
    <br />
    <h3 aling="center">Add New Movie</h3>
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
    <form method="post" action="{{url('movies')}}">
       {{csrf_field()}}
     <div class="form-group">
      <input type="text" name="movie_name" class="form-control" placeholder="Enter Movie Name" />
    </div>
     <div class="form-group">
      <input type="text" name="movie_director" class="form-control" placeholder="Enter Movie Director Name" />
     </div>
     <div class="form-group">
      <input type="text" name="movie_actor" class="form-control" placeholder="Enter Main Movie Actor Name" />
     </div>
     <div class="form-group">
      <input type="text" name="movie_actress" class="form-control" placeholder="Enter Movie Actress Name" />
     </div>
     <div class="form-group">
      <input type="text" name="movie_country" class="form-control" placeholder="Enter Country Name of Movie produce" />
     </div>
     <div class="form-group">
     			 <select class="custom-select" name="movie_type">
       				<option value="0" selected disabled>Select Movie Type</option>
       				<option value="Comedy">Comedy</option>
       				<option value="Sci-fi">Sci-fi</option>
       				<option value="Horror">Horror</option>
       				<option value="Romance">Romanc </option>
       				<option value="Action">Action</option>
       				<option value="Thriller">Thriller</option>
       				<option value="Drama">Drama</option>
       				<option value="Mystery">Mystery</option>
       				<option value="Crime">Crime</option>
       				<option value="Animation">Animation</option>
              <option value="Adventure">Adventure</option>
              <option value="Fantasy">Fantasy</option>
              <option value="Comedy-Romance">Comedy-Romance</option>
              <option value="Action-Comedy">Action-Comedy</option>
              <option value="Superhero">Superhero</option>

     			</select>
         </div>
     <div class="form-group">
      <input type="text" name="release_date" class="form-control" placeholder="Enter Release Date"  onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}" />
     </div>
     <div class="form-group">
      <input type="submit" class="btn btn-primary" />
     </div>
     <div class="form-group">
       <button type="button" class="btn ">
         <a href="/actorshow" >SHOW MOVIE LIST</a>
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
