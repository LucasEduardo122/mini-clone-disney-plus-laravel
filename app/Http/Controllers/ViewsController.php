<?php

namespace App\Http\Controllers;

use App\Models\Api;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function Home() {
        $LIST_MOVIES = ['tt12801262', 'tt4823776', 'tt2096673', 'tt5109280', 'tt7146812', 'tt2948372', 'tt2953050', 'tt3521164'];
        $data = [];

        for($c = 0; $c < count($LIST_MOVIES); $c ++) {
            $apiDados = new Api();

            array_push($data, $apiDados->ApiImdb($LIST_MOVIES[$c]));
        }

        return view('site.home', ['filmes' => $data]);
    }
}
