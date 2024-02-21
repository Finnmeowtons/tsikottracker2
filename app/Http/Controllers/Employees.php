<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class Employees extends Controller
{
    public function index()
    {
        $employees = Employee::get();
        return view('employees', compact('employees'));
    }
}
