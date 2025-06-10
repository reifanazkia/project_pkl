<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class newsModel extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $primaryKey = 'id_news';

    protected $fillable = [
        'judul',
        'isi',
        'gambar',
        'tanggal'
    ];

    protected function gambar(): Attribute
    {
        return Attribute::make(
            get: fn($gambar) => url('/storage/news/' . $gambar),
        );
    }
}
