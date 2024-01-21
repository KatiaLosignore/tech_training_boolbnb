<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentSponsorship extends Model
{
    use HasFactory;

    protected $fillable = [
        'apartment_id',
        'sponsorship_id',
        'expire_date',
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function sponsorship()
    {
        return $this->belongsTo(Sponsorship::class);
    }
}
