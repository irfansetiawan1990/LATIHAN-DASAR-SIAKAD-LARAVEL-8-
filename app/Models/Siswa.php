<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $table =  'tb_siswa';
    protected $fillable = ['nama_siswa','ttl','asal_sekolah','nama_ortu'];
    protected $timestamp = false;

    public function kelas()
    {
        return $this->hasOne(Kelas::class);
    }

}
