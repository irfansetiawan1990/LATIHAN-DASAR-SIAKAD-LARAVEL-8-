<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;
    protected $table = 'tb_kelas';
    protected $fillable = ['nama_kelas','guru_id'];
    protected $timestamp = false;

    public function Guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
