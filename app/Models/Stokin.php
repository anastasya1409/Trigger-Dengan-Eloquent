<?php

 namespace App\Models;

 use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
 class Stokin extends Model
 {
 use HasFactory;

 protected $fillable = [
 'produk_id',
 'jumlah',
 'tanggal_masuk',
 'keterangan',
 'satuan'
 ];

 protected $table = 'stokins';

 /**
 * Validation rules for Stokin
 */
 public static $rules = [
 'produk_id' => 'required|exists:produks,id',
 'jumlah' => 'required|integer|min:1',
 'tanggal_masuk' => 'nullable|date',
 'keterangan' => 'nullable|string|max:255',
 'satuan' => 'nullable|string|max:50'
 ];

 /**
 * Get the produk that owns the stokin
 */
 public function produk()
 {
 return $this->belongsTo(Produk::class);
 }
 }