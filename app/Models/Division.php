<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $table = 'documents';
    protected $primaryKey = 'id';
    protected $fillable = [
        'division_name',
        'status',
        
    ];
}
