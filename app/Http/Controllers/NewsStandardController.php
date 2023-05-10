<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsStandardController extends Controller {


public function index($id = 0) {

    if ($id != 0) {
        
        //si $id différent de 0 on liste par categories | afficher les news de la categorie id par ordre croissant)
        $actus = News::where('category_id' , $id)->orderBy('created_at' , 'desc')->paginate(3) ;
    } else {
    
        //sinon on liste tout | si tu passe par la route par défaut) afficher les news par date de création 
        $actus = News::orderBy('created_at' , 'desc')->paginate(3) ;
    }
    

    //get = recuperer tout les résultat
    //paginate = filtrer
    $categories = Category::orderBy('name' , 'asc')->get() ;

    return view ('news.standard' , compact('actus' , 'categories')) ;
    
    
}

public function detail(News $actu) {

    return view('news.standardDetail' , compact ('actu'));


    
}


}
