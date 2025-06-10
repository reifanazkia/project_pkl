<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class galeryModel extends Model
{
    use HasFactory;

    protected $table = 'galery';
    protected $primaryKey = 'id_galery';

    protected $fillable = [
        'nama',
        'deskripsi',
        'alamat',
        'kontak',
        'logo'

    ];
}
