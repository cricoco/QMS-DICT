<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = 'documents';
    protected $primaryKey = 'id';
    protected $fillable = ['doc_ref_code', 
                            'doc_title', 
                            'dmt_incharged', 
                            'division', 
                            'process_owner',
                            'status',
                            'doc_type',
                            'request_type',
                            'request_reason',
                            'requester',
                            'request_date',
                            'revision_num',
                            'effectivity_date',
                            'file',
                            ];
}

