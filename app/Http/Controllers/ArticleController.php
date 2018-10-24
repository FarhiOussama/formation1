<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Article;

class ArticleController extends Controller
{
    public function index(){
        //return Article::all();
       //$articles = Article::all();
       //$articles = Article::simplePaginate();
       //$articles = Article::paginate(10);

      $search = request('search');
    //    $articles = Article::where('name', 'like', "%$search%")
    //                       ->orWhere('body', 'like', "%$search%")
    //                       ->paginate(10);

       //$articles = Article::rechercher($search)->paginate(10);
       $articles = Article::rechercher($search)->with('user')->paginate(20); //Model /json eager loading
       return view('articles.index',['articles'=>$articles]);
    }

    public function create(){
        return view('articles.create');
    }

    public function store(Request $request ){

        request()->validate([
            'name' => 'required|min:4|unique:articles',
            'published_at' => 'required',
            'body' => 'required',
        ]);

        Article::create(request()->all() + ['user_id' =>1]);
        // $name = request('name');
        // $body = request('body');
        // $date = request('publish_at');
       
        // Article::insert([
        //     'name' => $name,
        //     'body' => $body,
        //     'published_at' => $date,
        //     'user_id' => '1',       
        // ]);
        
        return redirect()->route('articles.index');
        
    }

    public function update(){
        Article::where(['id'=> 1])->update(['name' => 'oussama']);
    }

    public function destroy(){
        
    }
}
