<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Polisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nrp',
        'name',
        'pangkat_id'
    ];

    public function pangkat(): BelongsTo 
    {
        return $this->belongsTo(Pangkat::class);
    }
}
