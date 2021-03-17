<?php

namespace App\Http\Controllers;

use App\Models\CreateCV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('account.home');
    }
    
    /**
     * Show the create CV page.
     *
     * @return void
     */
    public function createCvPage()
    {
        $cv = CreateCV::where('user_id', Auth::id())->first();

        return view('account.createCV', compact('cv'));
    }
    
    /**
     * Store CV method
     *
     * @param  mixed $request
     * @return void
     */
    public function storeCv(Request $request)
    {
        try {
            CreateCV::create([
                'user_id' => Auth::id(),
                'text'    => $request->text,
                'cv_url'  => null
            ]);
    
            return response([
                'message' => 'Zapisano CV !',
            ]);
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
