<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
            
    protected $table = 'departements';

    protected $primarykey = 'id';

    protected $fillable = ['student_id',
    'deptName',
    'std',
    'division',
    'rollNo'];
}
