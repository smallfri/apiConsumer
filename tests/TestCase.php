<?php

use Illuminate\Support\Facades\Artisan as Artisan;

class TestCase extends Laravel\Lumen\Testing\TestCase {

    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }

    public function setUp()
    {
        parent::setUp();
        \Illuminate\Support\Facades\Facade::clearResolvedInstances();
    }

    public function tearDown() {
        // Don't perform any tear down operations right now
    }
}