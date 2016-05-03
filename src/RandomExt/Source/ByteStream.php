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
    private static $fp;

    /**
     * @return string
     */
    abstract protected function getPath();

    /**
     * Return an instance of Strength indicating the strength of the source
     *
     * @return Strength An instance of one of the strength classes
     */
    public static function getStrength()
    {
        return new Strength(Strength::MEDIUM);
    }

    /**
     * Generate a random string of the specified size
     *
     * @param int $size The size of the requested random string
     * @return string A string of the requested size
     */
    public function generate($size)
    {
        $file = $this->getStream();

        if (!$file) {
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
        if (! self::$fp) {
            self::$fp = fopen($this->getPath(), 'rb');
        }

        return self::$fp;
    }

    /**
     * Close stream file pointer
     */
    public function __destruct()
    {
        if (self::$fp) {
            fclose(self::$fp);
            self::$fp = null;
        }
    }

}