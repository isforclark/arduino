
<?php
$mysqli = new mysqli('localhost', 'root', '', 'databasearduino');

/*
 * This is the "official" OO way to do it,
 * BUT $connect_error was broken until PHP 5.2.9 and 5.3.0.
 */
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

/*
 * Use this instead of $connect_error if you need to ensure
 * compatibility with PHP versions prior to 5.2.9 and 5.3.0.
 */
if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

echo 'Success... ' . $mysqli->host_info . "\n";

$mysqli->close();
?>


<?php

        $link = mysqli_connect("localhost", "username", "password", "test");
        $result = mysqli_query($link, "select * from city");
        $results_arr = fetch_all_assoc($result,array('hemisphere','country','region','city'));

function fetch_all_assoc(& $result,$index_keys) {

  
  $assoc = array();             // The array we're going to be returning

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        $pointer = & $assoc;            // Start the pointer off at the base of the array

        for ($i=0; $i<count($index_keys); $i++) {
        
                $key_name = $index_keys[$i];
                if (!isset($row[$key_name])) {
                        print "Error: Key $key_name is not present in the results output.\n";
                        return(false);
                }

                $key_val= isset($row[$key_name]) ? $row[$key_name]  : "";
        
                if (!isset($pointer[$key_val])) {               

                        $pointer[$key_val] = "";                // Start a new node
                        $pointer = & $pointer[$key_val];                // Move the pointer on to the new node
                }
                else {
                        $pointer = & $pointer[$key_val];            // Already exists, move the pointer on to the new node
                }

        } // for $i

        // At this point, $pointer should be at the furthest point on the tree of keys
        // Now we can go through all the columns and place their values on the tree
        // For ease of use, include the index keys and their values at this point too

        foreach ($row as $key => $val) {
                        $pointer[$key] = $val;
        }

  } // $row

  /* free result set */
  $result->close();

  return($assoc);               
}

?>


