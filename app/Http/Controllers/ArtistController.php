<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Artist;
use App\ArtistCv;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware(['auth','role:2']);
        $this->middleware(['auth']);
    }
    public function index()
    {
        return view('artist.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artist = new Artist;
        $artist->user_id = Auth::user()->id;
        $artist->biography = $request['biography'];
        $artist->birthday = $request['birthday'];
        $artist->tel_cel = $request['tel_cel'];
        $artist->location = $request['location'];
        $artist->profession = $request['profession'];
        $artist->save();

        $artCV = new ArtistCv;
        $artCV->artist_id = $artist->id;
        $artCV->type_cv = $request['type_cv'];
        if ($request['type_cv'] !== 'pdf') {
            $artCV->curriculum = $request['curriculum'];
        } else {
            $file = $request->file('curriculum');
            $upload_path = public_path('upload/cvs');
            $fileName = time() . 'cv.' . $file->getClientOriginalExtension();
            $file->move($upload_path, $fileName);
            $artCV->curriculum = $fileName;
        }
        $artCV->save();

        $cat = explode(',', $request['listCat']);
        foreach ($cat as $idcat) {
            \DB::insert('insert into artist_art_categories (artist_id, category_id) values (?, ?)', [$artist->id, $idcat]);
        }

        return response()->json(['msg', 'ok'], 200);
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
