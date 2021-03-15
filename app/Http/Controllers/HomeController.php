<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class HomeController extends Controller{
        public function index(Request $request){
            return view('home');
        }

        public function page(Request $request){
            return view('page');
        }
    }
