<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stokout extends Model
{
    protected $guarded = [];
    protected $table = 'stokouts';

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
