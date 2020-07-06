<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Artist;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $artist = '';
        if ($user->role_id === 2) {
            $artist = Artist::where('user_id', $user->id)
                ->with('cvs')
                ->first();
            $tmp = $artist->categories;
        }
        return response()->json(['user' => $user, 'artist' => $artist], 200);
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
        $message = array();

        $upUser = User::find($id);
        $upUser->email = $request['email'];
        $upUser->name = $request['name'];
        if ($request->file('avatar')) {
            $file = $request->file('avatar');
            $upload_path = public_path('images/avatars');
            $fileName = time() . 'profile.' . $file->getClientOriginalExtension();
            $file->move($upload_path, $fileName);
            $upUser->avatar = $fileName;
        }
        if ($request['newpassword'] !== null) {
            if(Hash::check($request['currentpass'], $upUser->password)) {
                $upUser->password = Hash::make($request['newpassword']);
                array_push($message, ['state' => 'success', 'msg' => 'Contraseña actualizada con exito']);
            }
            else {           
                array_push($message, ['state' => 'error', 'msg' => 'Contraseña incorecta']);
            }
        }

        $upUser->save();

        /* Update datas artist */
        if ($upUser->role_id == 2) {
            $tmpArtist = Artist::select('id')->where('user_id', $upUser->id)->first();
            $upArtist = Artist::find($tmpArtist->id);
            $upArtist->biography = $request['biography'];
            $upArtist->birthday = $request['birthday'];
            $upArtist->tel_cel = $request['tel_cel'];
            $upArtist->location = $request['location'];

            if ($request['type_cv'] !== 'pdf') {
                $upArtist->cvs()->update([
                    'type_cv' => $request['type_cv'],
                    'curriculum' => $request['curriculum']
                ]);
            } else {
                if ($request->file('curriculum')) {
                    $file2 = $request->file('curriculum');
                    $upload_path_cv = public_path('upload/cvs');
                    $fileName2 = time() . 'cv.' . $file2->getClientOriginalExtension();
                    $file2->move($upload_path_cv, $fileName2);
                    $upArtist->cvs()->update([
                        'type_cv' => $request['type_cv'],
                        'curriculum' => $fileName2
                    ]);
                }
            }
            
            $upArtist->categories()->detach();
            $cat2 = explode(',', $request['listCat']);
            foreach ($cat2 as $idcat) {
                \DB::insert('insert into artist_art_categories (artist_id, category_id) values (?, ?)', [$upArtist->id, $idcat]);
            }

            $upArtist->save();
        }

        array_push($message, ['state' => 'success', 'msg' => 'Datos actualizados con exito']);

        return response()->json($message, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $messageDel = '';
        $delUser = User::find($id);
        if ($delUser->email === $request['email'] && Hash::check($request['password'], $delUser->password)) {
            $delUser->delete();
            $messageDel = 'delete';
        }
        else {
            $messageDel = 'Credenciales incorrectas';
        }
        
        return response()->json($messageDel, 200);
    }
}
