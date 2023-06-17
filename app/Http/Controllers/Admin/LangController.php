<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function index()
    {
        return view('lang');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */

    public function change(Request $request)
    {
        // dd($request->lang);
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);

        return redirect()->back();
    }
}
