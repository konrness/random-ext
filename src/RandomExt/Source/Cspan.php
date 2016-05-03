<?php

namespace RandomExt\Source;

use SecurityLib\Strength;

class Cspan extends ByteStream
{
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
     * @see http://www.c-span.org/networks/?channel=radio
     *
     * @return string
     */
    protected function getPath()
    {
        return "http://stream.us.gslb.liquidcompass.net/WCSPFMMP3";
    }

}