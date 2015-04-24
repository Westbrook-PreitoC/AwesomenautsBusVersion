<?php

class Database {

    private $connection;
    private $host;
    private $username;
    private $password;
    private $database;
    public $error;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->connection = new mysqli($host, $username, $password);

        if ($this->connection->connect_error) {
            die("<p> Error: " . $this->connection->connect_error . "</p>");
        }

        $exists = $this->connection->select_db($database);

        if (!$exists) {
            $query = $this->connection->query("CREATE DATABASE $database");

            if ($query) {
                echo "<p>Successfully created database: " . $database . "</p>";
            }
        } else {
            echo "<p>Database already exists.</p>";
        }
    }

    //this part of code tells us that we have an open connection
    public function openconnection() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("<p>Error: " . $connection->connect_error . "</p>");
        }
    }

    //this part of code tells us that we have a closed connection
    public function closeconnection() {
        if (isset($this->connection)) {
            $this->connection->close();
        }
    }

    //this part of code lets us know that the blogs connection works
    public function query($string) {
        $this->openconnection();

        $query = $this->connection->query($string);

        if (!$query) {
            $this->error = $this->connection->error;
        }

        $this->closeConnection();

        return $query;
    }

}
