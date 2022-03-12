<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\BaseTestCase;
use WpCliFileManager\Exceptions\FileDoesNotExist;
use WpCliFileManager\FileManager;
use Tests\Helpers\FileHelper;

final class FileExistTest extends BaseTestCase {

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testItShouldReturnFalseIfFileDoesNotExist(): void {
        $fileManager = new FileManager('/something/that/does/not/exist.txt');
        $this->assertFalse($this->callMethod($fileManager, 'fileExist'));
    }

    public function testItShouldReturnTrueIfFileDoesExist() : void {
        $file = FileHelper::create('nginx.conf', 0775);
        $this->root->addChild($file);

        $fileManager = new FileManager($file->url());

        $this->assertTrue($this->callMethod($fileManager, 'fileExist'));
    }
}