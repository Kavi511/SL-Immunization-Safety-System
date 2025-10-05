<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class AdverseEffect extends Model
{
    use HasFactory;

    protected $table = 'adverse_effects'; // Table name
    protected $primaryKey = 'EffectID'; // Primary key
    protected $fillable = [
        'vaccination_records_id',
        'Description',
        'Severity',
        'reported_by',
        'ReportedDate',
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'reported_by');
}
}
