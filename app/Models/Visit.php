<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Visit extends Pivot
{
    use HasFactory;

    protected $table = 'visits';

    protected $fillable = [
        'shorten_url_id',
        'visitor_id'
    ];
}
