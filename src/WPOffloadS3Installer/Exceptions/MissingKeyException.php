<?php namespace Outlandish\WPOffloadS3Installer\Exceptions;

/**
 * Exception thrown if the WP Offload S3 key is not available in the environment
 */
class MissingKeyException extends \Exception
{
    public function __construct(
        $message = '',
        $code = 0,
        \Exception $previous = null
    ) {
        parent::__construct(
            'Could not find a key for WP Offload S3. ' .
            'Please make it available via the environment variable ' .
            $message,
            $code,
            $previous
        );
    }
}
