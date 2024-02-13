<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'owner_id',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function serviceProducts()
    {
        return $this->hasMany(ServiceProduct::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function userCompanyRelationships()
    {
        return $this->hasMany(UserCompanyRelationship::class);
    }
}
