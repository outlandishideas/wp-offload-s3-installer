<?php namespace Outlandish\WPOffloadS3Installer\Test\Exceptions;

use Outlandish\WPOffloadS3Installer\Exceptions\MissingKeyException;

class MissingKeyExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testMessage()
    {
        $message = 'FIELD';
        $e = new MissingKeyException($message);
        $this->assertEquals(
            'Could not find a key for WP Offload S3. ' .
            'Please make it available via the environment variable ' .
            $message,
            $e->getMessage()
        );
    }
}
