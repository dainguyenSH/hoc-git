<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = array('id', 'employee_id', 'employee_name', 'photo', 'birthday', 'sex', 'address', 'telephone', 'email', 'nationality');

    public function degrees()
    {
    	return $this->hasMany('App\Degree', 'employee_id', 'id');
    }

    public function getEmployeeInfo($id)
    {
    	$employees = DB::table('employees')->where('id', $id)->get();
    	return $employees;
    }

    public static function getAllEmployees()
    {
    	return DB::table('employees')->get();
    }
}
