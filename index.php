<?php

require_once '_connec.php';

$pdo = new \PDO(DSN, USER, PASS);

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach($friends as $friend) {
     echo '<ul>' . $friend['firstname'] . ' ' . $friend['lastname'] . '<br>' . '</ul>';
}

$firstname = trim($_POST['firstname']); // get the data from a form
$lastname = trim($_POST['lastname']); 

$query = "INSERT INTO friend (firstname, lastname) VALUES ('$firstname', '$lastname')";
$statement = $pdo->prepare($query);


$statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
$statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);

$statement->execute();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Friends</title>
</head>
<body>
    <form action="index.php"  method="post">
        <p>
            <label for="firstname">Prénom</label>
            <input id="firstname" name="firstname" type="text"/>
        <p/>
         <p>
            <label for="lastname">Nom</label>
            <input id="lastname" name="lastname" type="text"/>
        <p/>
        <p><button id="button" class="button">Submit</button></p>
    </form>
</body>
</html>











