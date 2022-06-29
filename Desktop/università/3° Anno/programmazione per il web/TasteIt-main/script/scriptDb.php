<?php
// Invocare lo script php passando dei parametri (username, password)
//  $argc to find out how many parameters are passed
//  and $argv to access them
// $ argc :Contiene il numero di argomenti passati allo script corrente durante l'esecuzione dalla riga di comando.
// Il nome del file dello script viene sempre passato come argomento allo script, quindi il valore minimo di $argc è 1.
if($argc !== 3) {
    echo("Bisogna invocare il file passando username e password per accedere a MySQL.\n");
    echo("php scriptDb.php root password");
    return;
}

$username = $argv[1];
$password = $argv[2];

try {
    $dbh = new PDO('mysql:host=localhost', $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Se non viene specificato alcun database, viene generata un'eccezione.
    
    if (file_exists('./tasteit.sql')) {
        $fileContent = file_get_contents('./tasteit.sql');
        $dbh->exec($fileContent);
    }


} catch(PDOException $exception) {
    print_r('Non è stato possibile connettersi al dabatase. Messaggio: ' . $exception->getMessage());
}
