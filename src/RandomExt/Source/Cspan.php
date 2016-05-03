<?php

namespace RandomExt\Source;

class Cspan extends ByteStream
{
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