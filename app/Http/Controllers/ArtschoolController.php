<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminNotifications;
use App\Events\AdminsNotify;
use App\ArtSchool;
use App\User;




class ArtschoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     */
    
    public function __construct()
    {
        $this->middleware(['auth']);  
    }
    public function index()
    {
        return view('artschool.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artschool = new ArtSchool;
        $artschool->name_school = $request->artschool['name_school'];
        $artschool->location = $request->artschool['location'];
        $artschool->about = $request->artschool['about'];
        $artschool->mission = $request->artschool['mission'];
        $artschool->vision = $request->artschool['vision'];
        $artschool->user_id = auth()->user()->id;
        $artschool->save();

        $userid = User::find($artschool->user_id);       
        $date = collect(['user_id' => $userid->id, 'name' => $userid->name, 'id_request' => $artschool->id, 'type' => 'Escuela']);
        $admins = User::where('role_id', 4)->get();
        
        Notification::send($admins, new AdminNotifications($date));
        event(new AdminsNotify('hola'));

        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
