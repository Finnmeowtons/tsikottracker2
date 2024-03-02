<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'owner_id',
        'invitation_code'
    ];

    protected $hidden = ['created_at', 'updated_at'];
    
    protected static function boot()
{
    parent::boot();

    static::creating(function ($company) {
        $company->invitation_code = Str::random(12); // Generate the code when a company is created 
    });
}

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function offer()
    {
        return $this->hasMany(Offer::class);
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
