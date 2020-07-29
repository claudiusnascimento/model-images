<?php

namespace ClaudiusNascimento\ModelImages\Traits;

use ClaudiusNascimento\ModelImages\Models\ModelImage;

trait ModelImagesTrait
{

    public function getImagesWhereKeyStartsWith($start_string)
    {
        return $this->modelImages->filter(function($item) use ($start_string) {
            return starts_with($item->key, $start_string);
        });
    }

    public function getImagesWhereKeyEndsWith($end_string)
    {
        return $this->modelImages->filter(function($item) use ($end_string) {
            return ends_with($item->key, $end_string);
        });
    }

    public function getImagesWhereKeyIsNotEqualTo($key)
    {
        return $this->modelImages->reject(function($item) use ($key) {
            return $item->key == $key;
        });
    }

    /**
     * $fn = 'first' | 'last'
     */
    public function getImageByAttr($attr, $value, $fn = 'first')
    {
        $_fn = $fn == 'first' ? 'first' : 'last';

        return $this->getModelImagesByAttr($attr, $value)->{$_fn}();
    }

    public function getModelImagesByAttr($attr, $value)
    {
        return $this->modelImages->where($attr, $value);
    }

    public function getImagesByKey($key)
    {
        return $this->modelImages->where('key', $key);
    }

    public function getImageByKey($key)
    {
        return $this->modelImages->where('key', $key)->first();
    }

    public function generateModelImages()
    {

        $relationString = modelImagesRelationString($this);

        if(empty($relationString))
            throw new Exception('The Obj ' . $this->__toString() . ' must have a property to relation with model Images', 1);

        $modelImages = ModelImage::where('rel', $relationString)
                    ->where('rel_id', $this->id)
                    ->orderBy('order', 'asc')
                    ->orderBy('key', 'asc')
                    ->get();

        $model_id = $this->id;

        return view('model-images::form', compact(['modelImages', 'relationString', 'model_id']));

    }

    public function modelImages()
    {

        $relationString = modelImagesRelationString($this);

        if(empty($relationString))
            throw new Exception('The Obj ' . $this->__toString() . ' must have a property to relation with model Images', 1);

        return $this->hasMany('\ClaudiusNascimento\ModelImages\Models\ModelImage', 'rel_id')
                    ->where('rel', $this->modelImagesRelationString);
    }


}
