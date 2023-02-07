<?php

$username = 'root';
$password = '';


try {
    $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db->beginTransaction();

    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */

    $sql = " INSERT INTO utilisateur (nom, prenom, email, password, adresse, code_postal, pays)
             VALUES ('Doe', 'John', 'test@test.com', 'test', 'test', 59620, 'France')
                    ('Doe', 'John', 'test@test.com', 'test', 'test', 59620, 'France')
             ";


    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    $sql2 = " INSERT INTO produit (titre, prix, description_courte, description_longue)
             VALUES ('test', 40.56 , 'test', 'test')
                    ('test', 40.56 , 'test', 'test')
             ";

    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    $db->exec($sql);

    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    $db->exec($sql2);

    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */

    $db->commit();


    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */

    echo "Utilisateur créer !";
}
catch (PDOException $exception) {
    echo $exception->getMessage();
    
    $db->rollBack();
}
