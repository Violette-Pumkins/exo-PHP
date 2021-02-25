<?php

class PiloteMgr{

    /**
     * @param $choix
     * @return void
     */
    public static function getListePilotes($choix=PDO::FETCH_ASSOC){
        $sql=' SELECT * FROM pilote ORDER BY pilNom ASC'; 
        try{
        $res=DBAirDi::getConnexion()->query($sql);
            var_dump($res);
            
            switch($choix){
                case PDO::FETCH_CLASS:
                $res->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'pilote', ['pil', 'pilNom', 'adr']);
                break;
            }

            $records=$res->fetchAll();
            // var_dump($records);
            $res->closeCursor();
            DBAirDi::disconnect();


        }catch(PDOException $e){
            die('<h1>Erreur lecture en BDD</h1>'. $e->getMessage());
        }
        return $records;
    }
    /**
     * @param $pil
     * @return $record
     */
    public static function getPiloteById($pil)
    {   
        $sql= 'SELECT * FROM pilote WHERE pil=? ORDER BY pil ASC';

        try{

            $res=DBAirDi::getConnexion()->prepare($sql);

            $res->execute([$pil]);

            $res->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'pilote', ['pil', 'pilNom', 'adr']);
            $record=$res->fetchAll();
            // var_dump($record);
            $res->closeCursor();
            DBAirDi::disconnect();

        }catch(PDOException $e){
            die('<h1>Erreur de lecture en base de donnée</h1>'.$e->getMessage());
            
        }

        return $record; 
    }
    /**
     * @param $pilNom
     * @param$choix
     * @return $record
     */
    public static function getPilotesByName($pilNom, $choix=PDO::FETCH_ASSOC )
    {
        $sql= 'SELECT * FROM pilote WHERE pilNom=:pilNom ORDER BY pil ASC';

        try{

            $res=DBAirDi::getConnexion()->prepare($sql);

            $res->execute([':pilNom'=>'%'.$pilNom.'%']);

            $res->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'pilote', ['pil', 'pilNom', 'adr']);
            $record=$res->fetchAll();
            var_dump($record);
            $res->closeCursor();
            DBAirDi::disconnect();

        }catch(PDOException $e){
            die('<h1>Erreur de lecture en base de donnée</h1>'.$e->getMessage());
            
        }
        
        return $record; 
    
    }
    /**
     * @param Pilote
     * @return $nombre
     */
    public static function addPilote(Pilote $pilote)
    { 
        $sql= "INSERT into pilote (pil, pilNom, adr) VALUES (?,?,?);";
        
        try{

            $res=DBAirDi::getConnexion();  
            $res=DBAirDi::getConnexion()->prepare($sql);

            $pil=$pilote->getPil();
            $pilNom=$pilote->getPilNom();
            $adr=$pilote->getAdr();

            $res->execute([$pil,$pilNom,$adr]);

            $nombre =$res->rowCount();
            $res->closeCursor();
            DBAirDi::disconnect();


        }catch(PDOException $e){
            die('<h1>Erreur de lecture en base de donnée</h1>'.$e->getMessage());
        }
        echo "ok add";
        return $nombre;
    }

    /**
     * @param Pilote
     * @return void
     */
    public static function deletePilote(Pilote $pilote)//avec tous les param.
    {
        // on fait notre requête sql...
        
            $pil=$pilote->getPil(); 
            return self::deletePilote2($pil);
    }

        /**
         * 
         */
    public static function deletePilote2(int $pil)//avec identifiant
    {
        $sql= "DELETE from pilote WHERE pil=?;"; // on fait notre requête sql...

        try{
            $res=DBAirDi::getConnexion();  //on ouvre la connexion
            $res=DBAirDi::getConnexion()->prepare($sql); // on prépare notre requête
            $res->execute([$pil]); // on execute la requête
            $nombre=$res->rowCount();
            $res->closeCursor();
            DBAirDi::disconnect(); // on ferme la connexion et le curseur.


        }catch(PDOException $e){
            // on fait mourir le programme et on affiche le message d'erreur.
            die('<h1>Erreur de lecture en base de donnée</h1>'.$e->getMessage());
        }
        echo "ok delete";
        return $nombre;
    }

    public static function updatePilote(Pilote $pilote)
    {
        $sql= "UPDATE pilote SET pilNom=?, adr=? WHERE pil=?;";
        try{
            $res=DBAirDi::getConnexion()->prepare($sql); // on prépare notre requête

            $pil=$pilote->getPil();
            $pilNom=$pilote->getPilNom();
            $adr=$pilote->getAdr();

            $res->execute([$pil, $pilNom, $adr]); // on execute la requête
            $nombre=$res->rowCount();
            $res->closeCursor();
            DBAirDi::disconnect(); // on ferme la connexion et le curseur.
            echo "ok update";
            echo $nombre;

        }catch(PDOException $e){
            die('<h1>Erreur de lecture en base de donnée</h1>'.$e->getMessage());
        }
        
        return $nombre;
    }



}
?>