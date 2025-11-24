<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'member_id',
        'bikes_owned',
        'last_oil_change',
        'member_since',
    ];

    // Cast date fields to Carbon objects
    protected $casts = [
        'last_oil_change' => 'datetime',
        'member_since' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Optional helper functions to format dates safely in Blade
    public function getMemberSinceFormattedAttribute()
    {
        return $this->member_since ? $this->member_since->format('Y-m-d') : '-';
    }

    public function getLastOilChangeFormattedAttribute()
    {
        return $this->last_oil_change ? $this->last_oil_change->format('Y-m-d') : '-';
    }
}
