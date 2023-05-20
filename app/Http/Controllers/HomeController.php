<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Status;

class HomeController extends Controller
{
    public function index()
    {
        #метод pluck извлекает все значения по заданному ключу, у нас тут вывод новостей либо вывод новостей друзей.
        #пагинация 10 сортировка по дате DESC
        if ( Auth::check() ) {
            $statuses = Status::where(function($query){
                return $query->where('user_id', Auth::user()->id)
                    ->orWhereIn('user_id', Auth::user()->friends()->pluck('id'));
            })
            ->orderBy('created_at','desc')
            ->paginate(3);

            return view('timeline.index', compact('statuses'));
        }

        return view('home');
    }
}
