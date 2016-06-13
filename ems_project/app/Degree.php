<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $table = 'employees';
    protected $fillable = array('id', 'employee_id', 'name', 'year', 'school');

    public function employees()
    {
    	return $this->belongsTo('App\Employee');
    }
}
