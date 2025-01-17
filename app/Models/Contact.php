<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
        
    protected $table = 'contacts';

    protected $primarykey = 'id';

    protected $fillable = ['student_id',
    'email',
    'phoneNumber',
    'city',
    'state',
    'zipcode'];
}
