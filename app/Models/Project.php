<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama',
        'client',
        'leader_name',
        'leader_email',
        'start',
        'finish',
        'progress',
        'progress_total'
    ];
}
