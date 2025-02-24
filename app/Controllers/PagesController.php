<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class PagesController extends ResourceController
{
    public function index()
    {
        return view('/index');
    }

    // tampilkan halmaan hiragana
    public function hiragana()
    {
        return view('kana/hiragana');
    }

    // tampilkan halmaan katakana
    public function katakana()
    {
        return view('kana/katakana');
    }
}
