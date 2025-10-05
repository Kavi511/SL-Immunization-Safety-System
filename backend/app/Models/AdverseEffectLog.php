<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdverseEffectLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'effect_id',
        'action',
        'changes',
        'user_id',
    ];

    public function effect()
    {
        return $this->belongsTo(AdverseEffect::class, 'EffectID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
