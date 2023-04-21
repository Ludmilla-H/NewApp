<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{

    public function formAdd () { //affichage de mon formulaire

        $categories = Category::OrderBy('name' , 'asc')->get();

        return view('adminnews.edit' ,compact('categories'));
    

    }



    public function index() {

       // $actus = News::all() ;//Tout lister
    
        $actus = News::orderBy('created_at' , 'desc')->paginate(10) ;//Tout lister

        // 1 je crée ma vue
        // 2 Méthode dans le Controller qui retourne la vue
        // 3 modifier le fichiers route pour déclarer le nv chemin d'accès
        return view("adminnews.list" , compact('actus'));

    }


    public function add (Request $request){ // Ajout des informations

        $newsModel = new News ; //Création d'une instance de class (model news)pour enregistreer en base

        //Vérification des données du formulaire

        //Titre obligatoire (minimun de caractère)
        $request->validate(['titre' => 'required|min:5']); 

        //Gestion du téléchargement de l'image 
        if ($request->file()) { 
        
            $fileName = $request->image->store('public/images') ;//nom du fichier d'enregistrement
            $newsModel->image = $fileName ;
            # code...
        }

        $newsModel->category_id = $request->category ;
        $newsModel->description =  $request->description ;

        $newsModel->description = $request->description ;
        
        $newsModel->name =  $request->titre ; //
        $newsModel->save(); //Enregistrement des données

        return redirect(route('news.add')) ;
    
        }

        public function formEdit ($id = 0) { //

            $actu = news::findOrFail($id) ;
            //Classer les catégories par ordre croissant
            $categories = Category::OrderBy('name' , 'asc')->get();
    
            return view('adminnews.edit' , compact('actu' , 'categories'));
        }

        public function edit(Request $request , $id = 0){

        //Création d'une instance de class (model news a modifier a partir de l'id)
        //pour enregistrer en base
        $actu = News::findOrFail($id);
        $request->validate(['titre' => 'required|min:5']);


        if ($request->file()) { 
        
            if($actu->image !='') {
                Storage::delete($actu->image);
            }
            
            $fileName = $request->image->store('public/images') ;//nom du fichier d'enregistrement
            $actu->image = $fileName ;
            # code...
        }

        $actu->category_id = $request->category ;
        $actu->description = $request->description ;
        $actu->name =  $request->titre ; //
        $actu->save(); //Enregistrement des données
        return redirect(route('news.list')) ;

        }
    
        public function delete($id = 0) {
            //Récupération d'une news a partir de son id
            $actu = News::findOrFail ($id);
            //Vérifier l'existence du fichier
            if($actu->image != '') {
                Storage::delete($actu->image);
            }

            //Supprimer l'image dans le systeme de donnée
            Storage::delete($actu->image);
            //Suppression de la donnée dans la base de donnée
            $actu->delete();
            dd($id);
            return redirect(route('news.liste'));
        }

    
    }
    

