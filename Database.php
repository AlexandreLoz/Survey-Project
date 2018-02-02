 <?php
    //Connection to the database, username and password are by default in PhpMyAdmin
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    else{
        // Create database
        $sql = "CREATE DATABASE surveyproject";
        if ($conn->query($sql) === TRUE) {
            echo "Database created successfully <br/>";
        } 
        else {
            echo "Error creating database: <br/>" . $conn->error;
            echo "<br/> <br/>";
        }
    }
    $conn->close();
    $dbname = "surveyproject";
    $conn = mysqli_connect($servername, $username, $password, $dbname);    
        // sql to create table
        $sql = "CREATE TABLE Questionnaire (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(50) NOT NULL,
        question VARCHAR(50) NOT NULL,
        answer VARCHAR(50) NOT NULL
        )"; 
        if ($conn->query($sql) === TRUE) {
            echo "Table Questionnaire created successfully <br/>";
        } 
        else {
            echo "Error creating table: <br/>" . $conn->error;
            echo "<br/>";
        }   
        $conn->close();

?>