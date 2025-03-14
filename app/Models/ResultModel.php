<?php

namespace App\Models;

use CodeIgniter\Model;

class ResultModel extends Model
{
    protected $table = "result";
    protected $primaryKey = "result_id";
    protected $allowedFields = [
        'result_id',
        'user_id',
        'char_type',
        'kana_type',
        'true_answer',
        'false_answer'
    ];
}
