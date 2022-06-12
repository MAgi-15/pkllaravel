<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = "data_thread";

    protected $fillable = ['Id', 'User', 'Thread', 'Gambar', 'Judul', 'Komunitas', 'jumlah_comment'];
}
