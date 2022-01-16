<?php

$csvData = file_get_contents('Sheet.csv');
$lines = explode(PHP_EOL, $csvData);
$csv = array();
$i = 0;
foreach ($lines as $line) {
    $csv[] = str_getcsv($line); //Parses a string input for fields in CSV format and returns an array containing the fields read.
    //print_r($array[$i]);
    $i++;
}
$arraySize = $i;
$i = 0;
$whileRun = $arraySize / 100; //Divide by  100.
$whileRun = (int) $whileRun;
$runAfter = $arraySize - $whileRun * 100;
$run = $arraySize - $runAfter;
//echo $run."<br>".$runAfter."<br>"; 
$size = 0;
$ifSize = 0;
while ($size <= $whileRun + 1) {

    //DataBase
    $conn = new mysqli("localhost", "root", "", "massupload");
    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: " . $conn->connect_error . "<br>";
        exit();
    }
    if ($ifSize <= $run) {
        for ($forSize = 0; $forSize <= 100; $forSize++)  // Runing Array inside Array.
        {
            $forCsv = $csv[$i];
            $sql = "INSERT INTO csvUpload VALUES ('', '$forCsv[0]', '$forCsv[1]')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully till => " . $i . ' From => ' . $arraySize . '<br>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $i++;
            $ifSize++;
        }
    } else {
        if ($i <= $arraySize) {
            for ($forSize = 0; $forSize <= $runAfter; $forSize++) {
                if ($i == $arraySize) {
                    break;
                }
                $forCsv = $csv[$i];
                $sql = "INSERT INTO csvUpload VALUES ('', '$forCsv[0]', '$forCsv[1]')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully till => " . $i . ' From => ' . $arraySize . '<br>';
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $i++;
            }
        }
    }
    $size++;
}
