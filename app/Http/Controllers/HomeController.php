<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Src\Imdb\ImdbFactory;

class HomeController
{
    public function index()
    {
        return view('Web.index');
    }

    public function search(Request $request)
    {
        if (!is_null($request->search)) {
            $imdb = new ImdbFactory($request->search);
            $list = $imdb->getResult();
            return view('Web.Layouts.listResult', ['list' => $list['d']]);
        }
        return response()->json(['error' => 'Error msg'], 404);
    }

}