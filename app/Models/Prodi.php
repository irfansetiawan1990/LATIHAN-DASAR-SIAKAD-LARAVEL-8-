<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prodi extends Model
{
    use HasFactory;
    protected $table = 'tb_prodi';
    protected $fillable = ['nama_prodi','fakultas_id'];
    protected $timestamp = false;

    public function Fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
}
