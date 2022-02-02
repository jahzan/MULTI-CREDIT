<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    /**
     * Trais
     */
    use HasFactory;
    /**
     * fillables
     */
    protected $fillable = ['email','token','type'];
}
