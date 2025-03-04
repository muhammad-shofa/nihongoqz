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
        return view('kana-test/hiragana');
    }

    // tampilkan halmaan katakana
    public function katakana()
    {
        return view('kana-test/katakana');
    }

    // tampilakan halmaan hiragana result test
    public function hiraganaResult()
    {
        return view('kana-result/result.php');
    }
}
