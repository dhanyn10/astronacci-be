<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLimit extends Model
{
    use HasFactory;

    protected $table        = "user_limit";
    protected $primaryKey   = "id";
    public $timestamps      = false;
    public $imcrementing    = true;

    protected $fillable = [
        'email',
        'type'
    ];
}
