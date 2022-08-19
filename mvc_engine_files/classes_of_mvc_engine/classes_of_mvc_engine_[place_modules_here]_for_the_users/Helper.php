<?php



class Helper

{

// private constructor

    public function __construct()
    {

    }

    public function getMemoryUsage()
    {

        return memory_get_usage();

    }

    public function getMemoryPeakUsage()
    {

        return memory_get_peak_usage();

    }

    public function getCPUUsage()
    {

    return getrusage();
    }


    public function generateUniqueId()
    {

        return uniqid();

    }

    public function serializeVariable($var)
    {

        return serialize($var);

    }

    public function unserializeVariable($var)
    {

        return unserialize($var);

    }

    public function compressString($string)
    {

        return gzcompress($string);

    }


    public function uncompressString($string)
    {


        return gzuncompress($string);
    }



}//End Request class

