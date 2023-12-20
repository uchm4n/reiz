<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ReizJob extends Model
{
    use HasFactory;


    public function detail(): HasOne
    {
        return $this->hasOne(ReizJobDetail::class);
    }
}
