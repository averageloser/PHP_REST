<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Rest source for MySQL database.</title>
    </head>
    <body>
        <?php
        require_once 'resources.php';
        
        $model = null;
        $request = 0;

        //If this is not empty, something was requested.
        if (isset($_GET['id'])) {
            $request = $_GET['id'];

            //A valid request was received. 
            if (is_numeric($request) || strtolower($request == "all")) {
                //Create an instance of the DAO that will access the database.
                $model = new DbModel(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                
                if (is_numeric($request)) {
                    echo $model->get_item($request);
                }else {
                    echo $model->get_all_items();
                }
            }
        } else {
            echo "Get single item: http://localhost/Shop/index.php?id=x  (Where x is the 'id' number representing a row in the database).
                <p>
                Get all items:http://localhost/Shop/index.php?id=all";    
        }
        ?>
    </body>
</html>
