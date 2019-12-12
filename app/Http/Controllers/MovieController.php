<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//on indique au Controller que l'on va utiliser le Model Movie
use App\Movie;
use App\Genre;

class MovieController extends Controller
{
    //READ
    public function showTest()
    {      
        //Permet de récupérer tout le contenu de la table 'movies' et de le stocker dans la variable $movies
        $movies=Movie::All();
        //dd($movies); //équivalent laravel du var_dump/die

        //renvoie sur la view
        return view('movies.show',compact('movies')); //nomDuDossier.nomDuFichier
    }

    //CREATE étape 1
    public function createMovie()
    {
        //READ
        //Permet de récupérer tout le contenu de la table 'movies' et de le stocker dans la variable $movies
        $genres=Genre::All();
        //dd($movies); //équivalent laravel du var_dump/die

        //renvoie sur la view
        return view('movies.create', compact('genres')); //nomDuDossier.nomDuFichier
    }
    //forcer le type de la requête par l'élément précédent
    //laravel traite plus facilement les objets donc on transforme les données récoltées du formulaire en objet
    //équivaut à $request= new Request
    //plutôt que de faire un dd($_POST)

    //CREATE étape 2
    public function store(Request $request)
    {
        //dd($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50|string',
            'director' => 'required|max:50|string',
            'duration' => 'required|integer',
            'year' => 'required|max:4|integer',
            'genre_id' => 'required|integer',
        ]);
        //vérifier les données entrées ds le formulaire avant envoi
        if ($validator->fails()) {
            return redirect('movies/create')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $movie=new Movie([
            "name" => $request->name,
            "director" => $request->director,
            "duration" => $request->duration,
            "year" => $request->year,
            "genre_id" => $request->genre_id,
        ]);
        //le new permet en générant l'objet de transmettre un commande INSERT à la bdd
        //puis faut autoriser la transmission des éléments cf Movie.php


        $movie->save();
        //fait l'insertion et la sauvegarde en bdd

        return redirect('/showMovies');
        //on peut pas retourner une view car données de formulaire

        }   
    }

    //UPDATE étape1
    public function edit($id)
    {
        //dd('Je récupère le film voulu');
        //dd($id);
        $movie=Movie::find($id);
        //équivaut à un SELECT
        //on cherche ds notre table, le film où l' ID==$id
        $genres=Genre::All();
        return view('movies.edit', compact ('movie','genres'));
        
    }
    //UPDATE étape 2
    public function update(Request $request , $id)
    {
        //dd($id); 
        //récupère les données modifiées où le film où l'ID==$id        
        $movie=Movie::find($id);

        //UPDATE FROM movies SET (X=Y) WHERE id=$id
        $movie->name = $request->name;
        $movie->director = $request->director;
        $movie->duration = $request->duration;
        $movie->year = $request->year;
        $movie->genre_id = $request->genre_id;
        //reconnaît mon genre_id grâce qu select qui fait le lien

        $movie->save();
        //fait l'insertion et la sauvegarde en bdd

        return redirect('/showMovies');
        //on peut pas retourner une view car données de formulaire
    }

    //DELETE
    public function delete($id)
    {
        $movie=Movie::find($id);
        //je récupère le film à partir de son ID

        $movie->delete();
        //je supprime le film

        return redirect('/showMovies');
        //je retourne sur le tableau
    }
}
