<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Solon Papageorgiou
 * Date: 12/8/2013
 * Time: 7:44 μμ
 * Template for producing CSVs.
 */

final class TemplateCSV
{

    private $CSV_data;

    public function buildCSV($CSV_name, $headers, $data)
    {



        // Add CSV headers.
        foreach($headers as $header)
        {
           $this->CSV_data .= $header . ",";
        }

        $this->CSV_data = substr_replace($this->CSV_data ,"",-1);

        $this->CSV_data .= PHP_EOL;

        // Add CSV rows.
        foreach($data as $row)
        {

            foreach($row as $item)
            {

                $this->CSV_data .= $item . ",";

            }

            $this->CSV_data = substr_replace($this->CSV_data ,"",-1);

            $this->CSV_data .= PHP_EOL;

        }

        file_put_contents("../CSV_files/" . $CSV_name . ".csv", $this->CSV_data);

    }


}