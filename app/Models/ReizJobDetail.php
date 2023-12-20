<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReizJobDetail extends Model
{
    use HasFactory;

    public $table = 'reiz_job_details';

    protected $guarded = ['id'];

    public function job(): BelongsTo
    {
        return $this->belongsTo(ReizJob::class,'reiz_job_id','id');
    }
}
