<?php

    $username = 'root';
    $password = '';


try {
    $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /**
     * 1. Insérez un nouvel utilisateur dans la table utilisateur.
     */
    $dt = new DateTime();
    $date = $dt->format('Y-m-d');

    $sql = `
        INSERT INTO utilisateurs (id, nom, prenom, email, password, adresse, code_postal, pays, $date)
        VALUES ('Doe', 'John', 'Arlette Corrente', 5, 59610, 'France', 'j.doe@gondation.org', '$date')
        `;


    /**
     * 2. Insérez un nouveau produit dans la table produit
     */

    $sql2 = `
        INSERT INTO utilisateurs (id, titre, prix, description_courte, description_longue)
        VALUES ('1', 'Article 1', '60,80', voiture, voiture de 2006 lorem lorem lorem')
        `;

    /**
     * 3. En une seule requête, ajoutez deux nouveaux utilisateurs à la table utilisateur.
     */

    $result = $db->exec($sql & $sql);

    /**
     * 4. En une seule requête, ajoutez deux produits à la table produit.
     */

    $result2 = $db->exec($sql2 & $sql2);
    }
        catch (PDOException $exception) {
        echo $exception->getMessage();
    }

    /**
     * 5. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux utilisateurs dans la table utilisateur.
     */

    try {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $db->beginTransaction();

        $insert = `
        INSERT INTO utilisateurs (id, nom, prenom, email, password, adresse, code_postal, pays, $date)
        `;

        $sql3 = $insert . "('Doe', 'John', 'Arlette Corrente', 5, 59610, 'France', 'j.doe@gondation.org', '$date')";
        $db->exec($sql3);
        $sql4 = $insert . "('Doe', 'John', 'Arlette Corrente', 5, 59610, 'France', 'j.doe@gondation.org', '$date')";
        $db->exec($sql4);
        $sql5 = $insert . "('Doe', 'John', 'Arlette Corrente', 5, 59610, 'France', 'j.doe@gondation.org', '$date')";
        $db->exec($sql5);

        $db->commit();
    }
    catch (PDOException $exception) {
        echo $exception->getMessage();

        $db->rollBack();
    }

    /**
     * 6. A l'aide des méthodes beginTransaction, commit et rollBack, insérez trois nouveaux produits dans la table produit.
     */

try {
    $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db->beginTransaction();

    $insert = `
        INSERT INTO utilisateurs (id, titre, prix, description_courte, description_longue)
        `;

    $sql6 = $insert . "('1', 'Article 1', '60,80', voiture, voiture de 2006 lorem lorem lorem')";
    $db->exec($sql6);
    $sql7 = $insert . "('1', 'Article 1', '60,80', voiture, voiture de 2006 lorem lorem lorem')";
    $db->exec($sql7);
    $sql8 = $insert . "('1', 'Article 1', '60,80', voiture, voiture de 2006 lorem lorem lorem')";
    $db->exec($sql8);

    $db->commit();
}
catch (PDOException $exception) {
    echo $exception->getMessage();

    $db->rollBack();
}
