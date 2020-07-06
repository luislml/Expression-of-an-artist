<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserNotification;
use App\Events\UserNotify;
use App\User;
use App\ArtSchool;
use App\Artist;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.notifications');
         

    }
    public function getnotify()
    {
         
        
        return [
            'readnotifications' => auth()->user()->readNotifications,
            'unreadnotifications' => auth()->user()->unreadNotifications
         ];

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

        $notifys = auth()->user()->Notifications;
        
        foreach ($notifys as $notify) 
        {
            if ($notify->id == $id ) 
            {
                if ($notify->data['type'] == 'Escuela') {
                    $request = ArtSchool::find($notify->data['id_request']);
                }else {
                    $request = Artist::find($notify->data['id_request']);
                }
                
                $user = User::find($notify->data['user_id']);
                $data = [$request,$user,$notify];
                $notify->markAsRead();
                return view('admin.notificationshow')->with('data', $data);
            } 
        }
        return; 
        
        
    }
    public function generalnotifyread($id)
    {
        $notifys = auth()->user()->Notifications;
        foreach ($notifys as $notify) 
        {
            if (array_key_exists('msj', $notify->data)) {
                
                if ($notify->data['msj'] == 'readnotifysuccess') {
                    $notify->markAsRead();
                    return;
                }else {
                    $notify->markAsRead();
                    return;
                }
            }
        }
        return;
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
        if ($request[3] == "succes") {
            $school = ArtSchool::find($request[1]);
            $school->state = true;
            $school->save();
            $user = User::find($request[0]);
            $user->role_id = 3;
            $user->save();
            $data = collect(['msj' => 'readnotifysuccess']);
            $user->notify(new UserNotification($data));
            event(new UserNotify($request[2]));
            return $user; 
        }
         if ($request[3] == "danger") {
            $user = User::find($request[0]);
            $data = collect(['msj' => 'readnotifydenied']);
            $user->notify(new UserNotification($data));
            event(new UserNotify($request[2]));
            return $user;
         }
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
