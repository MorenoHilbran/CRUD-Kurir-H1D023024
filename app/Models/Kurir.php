<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kurir extends Model
{
    protected $table ='kurir';
    protected $fillable = [
        'nama',
        'no_telepon',
        'wilayah_operasi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
