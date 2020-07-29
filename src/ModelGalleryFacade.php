<?php

namespace ClaudiusNascimento\ModelGallery;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ClaudiusNascimento\HtmlBlocks\Skeleton\SkeletonClass
 */
class ModelGalleryFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'model-images';
    }
}
