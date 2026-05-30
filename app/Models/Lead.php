<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'name','email','phone','company','status','notes','assigned_to'
    ];


public function assignedTo(){
    return $this->belongsTo(User::class,'assigned_to');
}

}
