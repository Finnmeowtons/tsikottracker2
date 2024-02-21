<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_details',
        'position',
        'company_id',
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
