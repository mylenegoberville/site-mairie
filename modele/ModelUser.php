<?php

require_once 'ModelPdo.php';

class ModelUser extends ModelPdo {

	public static function connectUser($nick, $pwd) {
		try
        {
			$sql="SELECT * FROM mlo_users WHERE login = '$nick' AND password = '$pwd' ;";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
			if(!isset($liste[0]))
			{
				return null;
			} else {
				return $liste;
			}
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        }

   }

}

?>