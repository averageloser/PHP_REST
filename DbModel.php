<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *
 * Database Structure below:
 *
 */
 
 /*
  id 	int(11)	NO 	PRI 	NULL	auto_increment
 price 	decimal(7,2)	NO 		0.00	
 name 	varchar(50)	NO 		NULL	
 description 	text	YES 		NULL	
 */

class DbModel {

    private $table = "items";
    private $connection;
    //Prepared statements for queries.
    private $get_item_statement = null;
    private $get_all_statement = null;

    public function __construct($host, $user, $pass, $database) {
        $this->connection = new mysqli($host, $user, $pass, $database);

        if ($this->connection->connect_error) {
            die($this->connection->connect_error);

            exit();
        }

        //Initialize the prepared statements.
        $this->get_item_statement = $this->connection->prepare("SELECT * FROM items WHERE id = ?");

        $this->get_all_statement = $this->connection->prepare("SELECT * FROM $this->table");
    }

    public function __destruct() {
        $this->connection->close();
    }

    //Returns json data representing a specic row.
    public function get_item($id) {

        //bind date to the statement.
        $this->get_item_statement->bind_param('i', $id);

        //execute the statement.
        $this->get_item_statement->execute();

        $result = $this->get_item_statement->get_result();

        $row = $result->fetch_array(MYSQLI_ASSOC);

        if ($row != null) {
            return json_encode($row);
        } else {
            return '{error: "not a valid item"}';
        }
    }

    //Returns json data for all database items.
    public function get_all_items() {
        $this->get_all_statement->execute();

        $result = $this->get_all_statement->get_result();

        $rows = $result->fetch_all(MYSQLI_ASSOC);

        return json_encode($rows);
    }

}
