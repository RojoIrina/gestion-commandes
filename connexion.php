
<?php
//{ }  < > 

class connect extends PDO{

    const HOST="localhost";
    const DB="gestioncommandes";
    const USER="root";
    const PSW="";

    public function __construct(){
    try {
        parent::__construct("mysql:host=" . self::HOST . ";dbname=" . self::DB, self::USER, self::PSW);
        echo "Connexion réussie";
    } catch (PDOException $e ) {
        echo $e->getMessage()."".$e->getFile()."".$e->getLine();
    }    
    }
}




?> 