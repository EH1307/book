<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book; // importez l'alias de la classe

class FrontController extends Controller
{
    public function index(){
        return Book::all(); // retourne tous les livres de l'application
    }
    // retournera un livre en fonction de son identifiant
    public function show(int $id){
        return Book::find($i);
    }
}
