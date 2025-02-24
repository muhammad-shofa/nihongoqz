<?php

namespace App\Models;

use CodeIgniter\Model;

class HiraganaModel extends Model
{
    protected $table = "hiragana";
    protected $primarykey = "hiragana_id";
    protected $allowedFields = [
        'hiragana_id',
        'hiragana_kana',
        'dakuten'
    ];
}
