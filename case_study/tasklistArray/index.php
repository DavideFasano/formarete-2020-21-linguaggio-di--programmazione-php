<?php

//print_r($_GET);


//carico dipendenze
require "./lib/JSONReader.php";
require "./lib/searchFunctions.php";

//model (gestisce i dati dell'applicazione) JSONReder
$taskList = JSONReader('./dataset/TaskList.json');
//controller () $taskList
//$searchText = isset($_GET['searchText']) trim(filter_var($_GET['searchText'],FILTER_SANITIZE_STRING));
if (isset($_GET['searchText']) && trim($_GET['searchText'])!=='') {
    $searchText=trim(filter_var($_GET['searchText'], FILTER_SANITIZE_STRING));
    //versione dichiarativa
    $taskList=array_filter($taskList,_searchText($searchText));
    //versione imperativa 
    //$taskList=searchText($searchText,$taskList);
}else{
    $searchText='';
}

if (isset($_GET['status'])){
    $status=($_GET['status']);
    $taskList=array_filter($taskList,searchStatus($status));
}


//var_dump($searchText);


?>



<!-- view(vista)  visualizzazione / intercetta azioni utente-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/style.css">
    <title>Tasklist</title>
</head>

<body>
    <form action="./index.php">
        <input type="text" value="<?= $searchText ?>" name="searchText">
        <button type="submit">Cerca</button>
        <div id="status">
            <input type="radio" name="status" value="progress" id="progress">
            <label for="progress">Progress</label>
            <input type="radio" name="status" value="done" id="done">
            <label for="done">Done</label>
            <input type="radio" name="status" value="todo" id="todo">
            <label for="todo">To Do</label>
        </div>
    </form>
    <ul>
        <?php
        foreach ($taskList as $key => $task) {
            $status = $task['status'];
            $taskName = $task['taskName'];
        ?>

            <li class="tasklist-item tasklist-item--<?= $status ?>">
                <?= $taskName ?>
                <b><?= $status ?></b>
            </li>

        <?php } ?>

        <!-- <li class="tasklist-item tasklist-item--done">uova <b>done</b></li>
        <li class="tasklist-item tasklist-item--todo">pane <b>todo</b></li> -->
        
    </ul>

</body>

</html>
