<!DOCTYPE html>
<html>
<head>
<title>Actor Up date</title>
</head>
<body>
  <form method="post" action="/edit/{{$users[0]->star_id}}">
     {{csrf_field()}}

   <div class="form-group">
  <input  type="text" class="form-control" name="update_actor_birth" value="{{$users[0]->birthdate}}" onfocus="(this.type='date')" onblur="if(this.value==''){this.type='text'}"/>
   </div>
   <div class="form-group">
    <input type="text" name="update_actor_country" class="form-control" value="{{$users[0]->country}}" />
  </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
   <div class="form-group">
     <button type="button" class="btn ">
       <a href="/actorshow" >Show Actor list</a>
  </button>
   </div>
  </form>
</body>
</html>
