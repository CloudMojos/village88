<?php 
    require('database.php');
    require('query_builder.php');
    require('sites.php');
    require('clients.php');
    $database = new Database();
    $query_builder = new QueryBuilder("lead_gen_business");
    $sites = new Sites();
    $sites->connection = $query_builder->connection;

    var_dump($sites->connection);
    
    $result = $sites->select(["client_id", "COUNT(*) as count "])
                    ->group_by('client_id')
                    ->having("count", ">", 5)
                    ->get();
    var_dump($result);

    
    $clients = new Clients();
    $clients->connection = $query_builder->connection;

    $result = $clients->select([])->where(array("last_name" => "Owen"))->get();
    var_dump($result);

    // $database->fetch_all('SELECT *');
?>