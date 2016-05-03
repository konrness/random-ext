<?php


namespace RandomExt\Source;

use SecurityLib\Strength;

/**
 * The Byte Stream Number Source
 *
 * This uses any byte stream to generate medium strength numbers
 *
 */
abstract class ByteStream implements \RandomLib\Source
{

    /**
     * File pointer to the opened byte stream to prevent opening/closing unnecessarily
     *
     * @var resource
     */
    private $fp;

    /**
     * @return string
     */
    abstract protected function getPath();

    /**
     * Generate a random string of the specified size
     *
     * @param int $size The size of the requested random string
     * @return string A string of the requested size
     */
    public function generate($size)
    {
        $file = $this->getStream();

        if (false === $file) {
            return str_repeat(chr(0), $size);
        }

        $result = fread($file, $size);

        return $result;
    }

    /**
     * Allow reusing an already opened stream
     *
     * @return resource
     */
    protected function getStream()
    {
        if (! $this->fp) {
            $this->fp = @fopen($this->getPath(), 'rb');
        }

        return $this->fp;
    }

    /**
     * Close stream file pointer
     */
    public function __destruct()
    {
        if ($this->fp) {
            fclose($this->fp);
            $this->fp = null;
        }
    }

}