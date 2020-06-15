<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //usando el middleware check roles con el valor 1 que hace referencia a user
    public function __construct()
    {
        // esta es la forma de usar el middleware por ahora lo dejo comentado
        // este middleware nos permite solo el acceso si eres user
        // $this->middleware(['auth','role:1']);
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
