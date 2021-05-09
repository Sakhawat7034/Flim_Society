<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirectorController extends Controller
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
        return view('director');
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
          'director_name' =>'required',
          'director_gender'=>'required',
          'director_birth'=>'required',
          'director_country'=>'required'
       ]);
       $director_country=strtolower($request->get('director_country'));
       $director_name = strtolower( $request->get('director_name'));
      $director_birth = $request->get('director_birth');
      $director_gender= $request->get('director_gender');
      $users = DB::select('select director_id from director_details order by director_id desc');
      $id=211001;
      if($users)
      {
        $id=$users[0]->director_id;
        $id=$id+1;
    }
      DB::insert('insert into director_details (director_id,name,gender,birthdate,country) values (?,?,?,?,?)',[$id,$director_name,$director_gender,$director_birth,$director_country]);
      return redirect('director')->with('success','data added');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $users=DB::select('SELECT director_id,name,country,birthdate,gender,YEAR(CURRENT_TIMESTAMP) - YEAR(birthdate) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(birthdate, 5)) as age FROM director_details');
      return view('director_list')->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $users=DB::select('SELECT director_id,name,country,birthdate,gender FROM director_details WHERE director_id=?',[$id]);
      return view('director_update')->with('users', $users);
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
      DB::update('update director_details set birthdate = ? , country = ? where director_id = ?',[$request->get('director_birth'),$request->get('director_country'),$id]);
      echo "Record updated successfully.<br/>";
    echo '<a href = "/directorshow">Click Here</a> to go back.';
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
