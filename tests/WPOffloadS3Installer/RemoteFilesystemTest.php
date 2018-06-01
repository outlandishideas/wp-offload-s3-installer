<?php namespace Outlandish\WPOffloadS3Installer\Test;

use Outlandish\WPOffloadS3Installer\RemoteFilesystem;

class RemoteFilesystemTest extends \PHPUnit_Framework_TestCase
{
    protected $io;
    protected $config;

    protected function setUp()
    {
        $this->io = $this->getMock('Composer\IO\IOInterface');
    }

    public function testExtendsComposerRemoteFilesystem()
    {
        $this->assertInstanceOf(
            'Composer\Util\RemoteFilesystem',
            new RemoteFilesystem('', $this->io)
        );
    }

    // Inspired by testCopy of Composer
    public function testCopyUsesWpOffloadS3FileUrl()
    {
        $wpOffloadS3FileUrl = 'file://'.__FILE__;
        $rfs = new RemoteFilesystem($wpOffloadS3FileUrl, $this->io);
        $file = tempnam(sys_get_temp_dir(), 'pb');

        $this->assertTrue(
            $rfs->copy('http://example.org', 'does-not-exist', $file)
        );
        $this->assertFileExists($file);
        unlink($file);
    }
}
