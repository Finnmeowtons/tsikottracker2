<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'service_product_id',
        'price',
        'date',
        'company_id',
        'notes',
        'employee_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function serviceProduct()
    {
        return $this->belongsTo(ServiceProduct::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
