<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Kategori()
    {
        //relasi tabel menu dan kategori
        return $this->belongsTo(Kategori::class);
    }
}
