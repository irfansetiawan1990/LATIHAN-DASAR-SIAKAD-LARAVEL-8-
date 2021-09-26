<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'tb_guru';
    protected $fillable = ['nama_guru','nip'];
    protected $timestamp = false;

   // public function prodi()
    //{
     // return $this->hasMany(Prodi::class, 'fakultas_id');
  // }

  public function kelas()
  {
      return $this->hasOne(Kelas::class);
   }

  public function rombel()
 {
     return $this->hasOne(Rombel::class);
 }



}
