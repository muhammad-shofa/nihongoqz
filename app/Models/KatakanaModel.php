<?php

namespace App\Models;

use CodeIgniter\Model;

class KatakanaModel extends Model
{
    protected $table = "katakana";
    protected $primarykey = "katakana_id";
    protected $allowedFields = [
        'katakana_id',
        'katakana_kana',
        'dakuten'
    ];
}
