<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BacaQuran extends Model
{
    use HasFactory;

    protected $fillable = [
        'surat_id',
        'ayat_id',
        'user_id',
        'status',
    ];
}
