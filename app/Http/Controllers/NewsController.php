<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        $news = DB::table('news')->get();
        $favorite = DB::table('favorite_news')->get();
        $array = array();
        foreach ($favorite as $fav) {
            $array = array($fav->news_id);
        }
        return view('news.index', ['news' => $news, 'favorite' => $favorite, 'array' => compact($array)]);
    }
    public function show($id)
    {
        $news = DB::table('news')->find($id);
        $tags = DB::table('news')->get();
        return view('news.show', ['news' => $news, 'tags' => $tags]);
    }

    public function allNews(Request $request)
    {
        $town = $request->country;
        $countrys = DB::table('news')->get();
        if ($town == 'Нет') {
            $news = DB::table('news')->get();
            return view('news.news', ['news' => $news, 'countrys' => $countrys, 'town' => $town]);
        } else {
            $news = DB::table('news')->where('town', $town)->get();
            return view('news.news', ['news' => $news, 'countrys' => $countrys, 'town' => $town]);
        }
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $prod = DB::table('news')->where('heading', 'LIKE', "%{$search}%")->orderBy('heading')->get();
        return view('news.search', ['prod' => $prod]);
    }

    public function favoriteAdd(Request $request)
    {
        if (Auth::check()) {
            $news_id = $request->favoriteAdd;
            $user_id = Auth::user()->id;
            DB::insert('insert into favorite_news (user_id, news_id) values (?, ?)', [$user_id, $news_id]);
            echo 'Новость добавлена в избранные';
        } else {
            echo 'Вы не вошли в систему';
        }
    }
    public function favoriteShow()
    {
        if (Auth::check()) {
            $favorite = DB::table('favorite_news')->get();
            $news = DB::table('news')->get();
            return view('news.favorite', ['favorite' => $favorite, 'news' => $news]);
        } else {
            echo 'Вы не вошли в систему';
        }
    }
}
