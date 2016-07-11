<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['employee_id','type', 'amount', 'remarks', 'date'];

    /**
     * @return [type]
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
