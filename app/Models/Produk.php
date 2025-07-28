<?php
 namespace App\Models;

 use Illuminate\Database\Eloquent\Model;

 class Produk extends Model
 {
 // protected $fillable = ['nama', 'harga', 'stok'];
 protected $guarded = [];
 protected $table = 'produks';

 public function stokins()
 {
 return $this->hasMany(Stokin::class);
 }

 public function stokouts()
 {
 return $this->hasMany(Stokout::class);
 }

 }
