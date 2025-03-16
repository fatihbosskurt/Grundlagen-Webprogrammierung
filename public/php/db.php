   <?php 
   $db_server = getenv("MYSQL_SERVER");
    $db_user = getenv("MYSQL_USER");
    $db_password = getenv("MYSQL_PASSWORD");
    $db_database = getenv("MYSQL_DATABASE");

        $mysqli = new mysqli($db_server, $db_user, $db_password, $db_database);
        if ($mysqli->connect_error) {
            echo "<p><strong>Fehler bei der Verbindung:</strong> " . mysqli_connect_error() . "</p>\n";
        }
    
