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

    /**
     *  Return the html of the image
     */
    public function toHtml($attrs = [])
    {
        $src = asset('storage/' . $this->src);

        $attrs['src'] = $src;

        $img = '<img ';

        foreach($attrs as $key => $attr) {
            $img .= $key . '="'. $attr .'"';
        }

        $img .= '>';

        return $img;
    }

    public function small($attrs = []) {
        return $this->toHtml(array_merge($attrs, ['width' => 100]));
    }

}

