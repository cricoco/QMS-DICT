<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentHistory extends Model
{
    use HasFactory;

    protected $fillable = ['username_id', 'document_id', 'operation'];

    public function user()
    {
        return $this->belongsTo(User::class, 'username_id');
    }

    public function document()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }
}
