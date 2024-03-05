<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'type',
        'company_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function record()
    {
        return $this->belongsToMany(Record::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
