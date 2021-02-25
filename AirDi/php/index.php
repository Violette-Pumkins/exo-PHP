<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        spl_autoload_register(function($classe){
        include "class/" . $classe . ".class.php";
        });


        // $airdb=new DBAirDi;
        // $airdb->getConnexion();
        // var_dump($airdb);

        // $r=PiloteMgr::getListePilotes();
        // var_dump($r);
        // $r=PiloteMgr::getPiloteById("1");
        // var_dump($r);

        // PiloteMgr::getPilotesByName("u", PDO::FETCH_CLASS);


        $benoit=new Pilote (24, "Benoit", "Caen");
        // PiloteMgr::addPilote($benoit);
        // PiloteMgr::deletePilote($benoit);
        PiloteMgr::updatePilote($benoit);
        // PiloteMgr::getListePilotes();

    
    ?>
</body>
</html>