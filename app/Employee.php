<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable = ['id', 'first_name', 'last_name', 'position', 'birth_date'];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
