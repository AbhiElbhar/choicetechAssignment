<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    use HasFactory;
        
    protected $table = 'marks';

    protected $primarykey = 'id';

    protected $fillable = ['student_id',
    'marathi',
    'english',
    'hindi',
    'math',
    'science'];
}
