<?php

namespace App\Http\Controllers;

use index;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller {

public function index () {
    
    $actuas = News::all() ;

    return view ('adminnews.news' , compact('actuas')) ;
    
}

public function detail($id = 0) { //

    $actua = news::findOrFail($id) ;
dd($actua) ;
    return view('adminnews.newsdetail' , compact('actua'));
}





}
