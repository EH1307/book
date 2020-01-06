<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class HomeController extends Controller
{
    public function index(){
        $books=Book::all();
        return $books;
    }
    public function index(){
        $books=Book::all();
        return view('home',['$books'=>$books]);
    }
}
