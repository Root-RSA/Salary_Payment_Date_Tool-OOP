<?php


class CsvWriter
{
    public function write_to_csv(array $dates)
    {
        //Create a new or write to already existing csv file the data
        $fp = fopen('dates.scv', 'w');
        foreach ($dates as $line) {
            fputcsv($fp, $line);
        }
        fclose($fp);
    }
}
