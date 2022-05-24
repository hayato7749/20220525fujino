<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['fullname','gender','email','postcode','address','building_name','opinipn',];

    public static $rules = array(
        'fullname'=>'required',
        'gender'=> 'required|string',
        'email'=>'required|email',
        'postcode'=>'required|numeric|max:8',
        'address'=>'required|string',
        'building_name'=>'string',
        'opinion'=>'required|string|max:120',
    );

    
}
