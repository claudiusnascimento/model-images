<?php

namespace ClaudiusNascimento\ModelImages\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelImage extends Model
{
    use SoftDeletes;

    public $fillable = [
        'key',
        'rel',
        'rel_id',
        'src',
        'title',
        'alt',
        'class',
        'content',
        'active',
        'order',
        'width',
        'height',
        'weight',
        'filters'
    ];

}

