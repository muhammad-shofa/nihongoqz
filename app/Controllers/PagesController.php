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

    public function login()
    {
        return view('auth/login.php');
    }

    public function register()
    {
        return view('auth/register.php');
    }

    public function profile()
    {
        // check is user logged in?
        if (!session()->get('is_login')) {
            return redirect()->to('/login');
        }

        return view('user/profile.php');
    }

    public function history()
    {
        // check is user logged in?
        if (!session()->get('is_login')) {
            return redirect()->to('/login');
        }

        return view('user/history.php');
    }
}
