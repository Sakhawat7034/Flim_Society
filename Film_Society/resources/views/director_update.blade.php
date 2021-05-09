<!DOCTYPE html>
<html>
<head>
<title>Director Up date</title>
</head>
<body>
  <form method="post" action="/directoredit/{{$users[0]->director_id}}">
     {{csrf_field()}}

   <div class="form-group">
  <input  type="text" class="form-control" name="director_birth" value="{{$users[0]->birthdate}}" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}"/>
   </div>
   <div class="form-group">
    <input type="text" name="director_country" class="form-control" value="{{$users[0]->country}}" />
  </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
   <div class="form-group">
     <button type="button" class="btn ">
       <a href="/directorshow" >Show Actor list</a>
  </button>
   </div>
  </form>
</body>
</html>
