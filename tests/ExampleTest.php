<?php

namespace ClaudiusNascimento\HtmlBlocks\Tests;

use Orchestra\Testbench\TestCase;
use ClaudiusNascimento\HtmlBlocks\HtmlBlocksServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [HtmlBlocksServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
