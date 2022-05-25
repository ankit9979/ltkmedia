<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\IndexController;

class FileSumCalculationTest extends TestCase
{
    /**
     * Check IndexController extractFile method
     *
     * @return void
     */
    public function test_file_cal()
    {
        $indexController = new IndexController();

        $this->assertNotNull($indexController->extractFile('A.txt')); // Check return as something or not
        $this->assertFalse($indexController->extractFile('BB.txt')); // File Not Found
    }
}
