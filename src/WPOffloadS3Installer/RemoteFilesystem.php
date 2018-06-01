<?php namespace Outlandish\WPOffloadS3Installer;

use Composer\Config;
use Composer\IO\IOInterface;

/**
 * A composer remote filesystem for WP Offload S3
 *
 * Makes it possible to copy files from a modified file url
 */
class RemoteFilesystem extends \Composer\Util\RemoteFilesystem
{
    /**
     * The file url that should be used instead of the given file url in copy
     *
     * @access protected
     * @var string
     */
    protected $wpOffloadS3FileUrl;

     /**
     * Constructor
     *
     * @access public
     * @param string $wpOffloadS3FileUrl The url that should be used instead of fileurl
     * @param IOInterface $io The IO instance
     * @param Config $config The config
     * @param array $options The options
     * @param bool $disableTls
     */
    public function __construct(
        $wpOffloadS3FileUrl,
        IOInterface $io,
        Config $config = null,
        array $options = [],
        $disableTls = false
    ) {
        $this->wpOffloadS3FileUrl = $wpOffloadS3FileUrl;
        parent::__construct($io, $config, $options, $disableTls);
    }

     /**
     * Copy the remote file in local
     *
     * Use $wpOffloadS3FileUrl instead of the provided $fileUrl
     *
     * @param string $originUrl The origin URL
     * @param string $fileUrl   The file URL (ignored)
     * @param string $fileName  the local filename
     * @param bool   $progress  Display the progression
     * @param array  $options   Additional context options
     *
     * @return bool true
     */
    public function copy(
        $originUrl,
        $fileUrl,
        $fileName,
        $progress = true,
        $options = []
    ) {
        return parent::copy(
            $originUrl,
            $this->wpOffloadS3FileUrl,
            $fileName,
            $progress,
            $options
        );
    }
}
