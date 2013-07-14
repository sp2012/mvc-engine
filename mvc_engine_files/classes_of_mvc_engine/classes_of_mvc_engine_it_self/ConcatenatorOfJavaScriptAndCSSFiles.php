<?php
/**
 * Created by JetBrains PhpStorm.
 * User: user
 * Date: 8/7/2013
 * Time: 7:12 μμ
 * To change this template use File | Settings | File Templates.
 */

/*
The call to Files::combine should go in a file that is called on each request. On the first request to this file, the files are combined into one, on subsequent requests nothing is done, the only overhead is a call to file_exists.

Ideally the name of the output filename should contain a version number, so that an updated CSS file is not taken from the browser cache. This can easily be supported by reading the build number from somewhere and appending it to the output filename:

Files::combine("css/*.css", "css/all-v$version.css");
Now all you have to do is add this to your HTML:

<link rel="stylesheet" type="text/css" href="/css/all-v<?php echo $version ?>.css" media="screen" />
This also works for JavaScript files. Note that I don’t make an effort to minify anything as GZIP usually does a great job at minimizing bandwidth costs.
*/
class ConcatenatorOfJavaScriptAndCSSFiles
{
    private static function process($files, $output, $base_dir = '')
    {
        $contents 	= '';

        # If this is a string then it's a search pattern
        if(is_string($files))
        {
            $files = glob($files);
        }

        foreach ($files as $file)
        {
            $contents .= file_get_contents($base_dir.$file) . "\n\n";
        }

        # TODO locking
        if ($fp = fopen($output, 'wb'))
        {
            fwrite($fp, $contents);
            fclose($fp);
        }

        return $contents;
    }

    #
    # Combine all CSS files in the css directory:
    #
    #	echo Files::combine("css/*.css", "css/all.css");
    #
    # Combine only specified files in the given order:
    #
    #	echo Files::combine(array("css/core.css", "css/default.css"), "css/all.css");
    #
    #
    static function combine($files, $output_filename, $base_dir = '')
    {
        # Combine the files
        if(!file_exists($output_filename))
        {
            self::process($files, $output_filename, $base_dir);
        }
    }
}

