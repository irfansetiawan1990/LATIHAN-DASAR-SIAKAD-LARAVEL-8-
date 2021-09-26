<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'tb_mapel';
    protected $fillable = ['kode_mapel','nama_mapel','guru_id'];
    protected $timestamp = false;

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

}
