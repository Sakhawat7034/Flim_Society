<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
          'movie_name'=> 'required',
          'release_date'=> 'required',
          'movie_director'=>'required',
          'movie_actor'=>'required',
          'movie_actress'=>'required',
          'movie_country'=>'required',
          'movie_type'=>'required'
        ]);
        $movie_country=strtolower($request->get('movie_country'));
        $movie_director=strtolower( $request->get('movie_director'));
        $movie_actor =strtolower( $request->get('movie_actor'));
        $movie_actress=strtolower( $request->get('movie_actress'));
         $movie_name = strtolower( $request->get('movie_name'));
         $movie_type=strtolower( $request->get('movie_type'));
          $release_date = $request->get('release_date');
          //select last id of the movies table
          $users = DB::select('select movie_id from movies order by movie_id desc');
          $id=111001;
          if($users)
          {
            $id=$users[0]->movie_id;
            $id=$id+1;
        }
      //insert data into movies table
      DB::insert('insert into movies (movie_id,name,releasedate,type,country) values (?,?,?,?,?)',[$id,$movie_name,$release_date,$movie_type,$movie_country]);
      //insert director and movie id the movie_direct table
      $user=DB::select("select director_id from director_details where name = ? ",[$movie_director]);
      if($user)
      {
        $director_id=$user[0]->director_id;
        DB::insert('insert into movie_direct (movie_id,director_id) values (?,?)',[$id,$director_id]);
      }

      // insert director into director_details table if new director create a movie
      else {
          $users = DB::select('select director_id from director_details order by director_id desc');
        $director_id=211001;
        if($users)
        {
          $director_id=$users[0]->director_id;
          $director_id=$director_id+1;
      }

        DB::insert('insert into director_details (director_id,name) values (?,?)',[$director_id,$movie_director]);
        DB::insert('insert into movie_direct (movie_id,director_id) values (?,?)',[$id,$director_id]);
      }
      //insert moviestars id  and movie id the movie_direct table
      $user=DB::select('select star_id,name FROM moviestars where name= ? UNION SELECT star_id,name FROM moviestars where name = ?',[$movie_actor,$movie_actress]);
      $usercount=count($user);
      if($usercount==2)
      {
        $star_id=$user[0]->star_id;
        DB::insert('insert into act (movie_id,star_id) values (?,?)',[$id,$star_id]);
        $star_id=$user[1]->star_id;
        DB::insert('insert into act (movie_id,star_id) values (?,?)',[$id,$star_id]);
      }

      // insert director into director_details table if new director create a movie
      else if ($usercount==1 && $user[0]->name==$movie_actor){
        $users = DB::select('select star_id from moviestars order by star_id desc');
        $actor_id=221001;
        if($users)
        {
          $actor_id=$users[0]->star_id+1;

      }
        DB::insert('insert into moviestars (star_id,name,gender) values (?,?,"female")',[$actor_id,$movie_actress]);
        $star_id=$user[0]->star_id;
        DB::insert('insert into act (movie_id,star_id) values (?,?)',[$id,$star_id]);

        DB::insert('insert into act (movie_id,star_id) values (?,?)',[$id,$actor_id]);
      }
      elseif ($usercount==1 && $user[0]->name==$movie_actress) {
        $users = DB::select('select star_id from moviestars order by star_id desc');
        $actor_id=221001;
        if($users)
        {
          $actor_id=$users[0]->star_id+1;

      }
        DB::insert('insert into moviestars (star_id,name,gender) values (?,?,"male")',[$actor_id,$movie_actor]);
        $star_id=$user[0]->star_id;
        DB::insert('insert into act (movie_id,star_id) values (?,?)',[$id,$star_id]);

        DB::insert('insert into act (movie_id,star_id) values (?,?)',[$id,$actor_id]);
      }
      else {
        $users = DB::select('select star_id from moviestars order by star_id desc');
        $actor_id=221001;
        if($users)
        {
          $actor_id=$users[0]->star_id+1;

      }
        DB::insert('insert into moviestars (star_id,name,gender) values (?,?,"male")',[$actor_id,$movie_actor]);
        DB::insert('insert into act (movie_id,star_id) values (?,?)',[$id,$actor_id]);
        DB::insert('insert into moviestars (star_id,name,gender) values (?,?,"female")',[$actor_id+1,$movie_actress]);
        DB::insert('insert into act (movie_id,star_id) values (?,?)',[$id,$actor_id+1]);
      }

      // return to the current page

         return redirect()->route('movies.create')->with('success','data added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $users = DB::select('SELECT male.mid,male.nm,male.rd,male.c,male.t,male.mdnm,male.msnm,female.ms1nm
FROM(SELECT m4.mid,m4.nm,m4.rd,m4.c,m4.t,m4.mdnm,ms.name msnm
FROM (SELECT m3.mid,m3.nm,m3.rd,m3.c,m3.t,m3.mdnm,act.Star_ID
FROM (SELECT m2.mid,m2.nm,m2.rd,m2.c,m2.t,md.name mdnm
         FROM (SELECT m1.name nm,m1.movie_id mid, m1.ReleaseDate rd,m1.Country c,m1.Type t,movie_direct.Director_ID
      FROM movies m1 JOIN movie_direct ON m1.Movie_ID=movie_direct.Movie_ID) m2 JOIN director_details md ON m2.director_id=md.Director_ID) m3 JOIN act ON m3.mid=act.Movie_ID) m4 JOIN moviestars ms ON m4.star_id=ms.Star_ID WHERE Gender = "male") male,(SELECT  m6.mid,ms1.name ms1nm
         FROM (SELECT m5.movie_id mid,act.Star_ID
      FROM movies m5 JOIN act ON m5.Movie_ID=act.Movie_ID) m6 JOIN moviestars ms1 ON m6.Star_id=ms1.star_id WHERE gender="female") female
      WHERE female.mid=male.mid');


    return view('movies_list')->with('users', $users);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
