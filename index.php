
<?php
    //credenziali per l'accesso al database
    $server= 'localhost';
    $porta= 8888;
    $username= 'root';
    $password= 'root';
    $database= 'client';

    //connessione al database
    $db= new mysqli($server, $username, $password, $database, $porta);

    if($db->connect_error){
        die('connessione fallita: '.$db->connect_error);
    }

    $db->set_charset('utf8');

    //interrogazione del db per leggere le righe della tabella client
    $query= "SELECT * FROM clienties WHERE image != ''";
    $dati= $db->query($query);

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Clienti</title>
</head>
<body>

    <div class="container">
        
        <h1>Lista Clienti</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                
            

        <?php

        while($riga= $dati->fetch_assoc()) {
            $id= $riga['id'];
            $name= $riga['name'];
            $email= $riga['email'];
            $image= $riga['image'];


            echo "<tr>"; 
                echo "<th scope='row'>$id</th>";
                echo "<th scope='row'>$name</th>";
                echo "<th scope='row'>$email</th>";
                echo "<th scope='row'>
                    <img class='image' src='$image' alt='' >
                </th>";
                
            echo "</tr>";

            //IF alternativo alla query WHERE.
            // if($image != null){
                // echo "<p> $id $name $email</p>";
            // };
            
        }

        ?>
            </tbody>
        </table>
    </div>
</body>
</html>

