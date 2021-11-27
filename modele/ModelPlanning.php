<?php

require_once 'ModelPdo.php';

class ModelPlanning extends ModelPdo {

	public static function GetIdBatimentsByNomVille($nomville) {
		try
        {
			$sql="SELECT IdB FROM mlo_batiment WHERE NomV = '$nomville';";
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
    public static function GetIdSalleByIdBatiment($idbatiment) {
		try
        {
			$sql="SELECT IdS FROM mlo_salle WHERE IdB = '$idbatiment';";
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

    public static function GetDbDateByAllInfo($jour,$mois,$an) {
		try
        {
			$sql="SELECT db_date FROM mlo_calendar WHERE day = '$jour' AND month = '$mois' AND year = '$an';";
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

   public static function GetId2ByAllInfo($jour,$mois,$an) {
		try
        {
			$sql="SELECT id2 FROM mlo_calendar WHERE day = '$jour' AND month = '$mois' AND year = '$an';";
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

       public static function GetNomBatimentByIdBatiment($idbatiment) {
		try
        {
			$sql="SELECT NomB FROM mlo_batiment WHERE IdB = '$idbatiment';";
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
            die("Erreur dans la BDD basename()");
        }

   }
        public static function GetNomSalleByIdSalle($idsalle) {
		try
        {
			$sql="SELECT NomS FROM mlo_salle WHERE IdS = '$idsalle';";
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
            die("Erreur dans la BDD basename()");
        }

   }
        public static function GetAnneeByIdDate($iddate) {
		try
        {
			$sql="SELECT year FROM mlo_calendar WHERE id2='$iddate';";
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
            die("Erreur dans la BDD basename()");
        }

   }
        public static function GetMoisByIdDate($iddate) {
		try
        {
			$sql="SELECT month FROM mlo_calendar WHERE id2='$iddate';";
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
            die("Erreur dans la BDD basename()");
        }

   }
        public static function GetJourByIdDate($iddate) {
		try
        {
			$sql="SELECT day FROM mlo_calendar WHERE id2='$iddate';";
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
            die("Erreur dans la BDD basename()");
        }

   }
        public static function GetSemaineByIdDate($iddate) {
		try
        {
			$sql="SELECT week FROM mlo_calendar WHERE id2='$iddate';";
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
            die("Erreur dans la BDD basename()");
        }

   }
        public static function GetDbDateJour() {
		try
        {
			$sql="SELECT DATE( NOW() )";
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
            die("Erreur dans la BDD basename()");
        }

   }
        public static function GetId2EtDayByDbDate($dbdate) {
		try
        {
			$sql="SELECT DAYOFWEEK('$dbdate'), id2 FROM mlo_calendar WHERE db_date='$dbdate'";
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
            die("Erreur dans la BDD basename()");
        }

   } 
        public static function DelBatimentById($idbatiment) {
		try
        {
			$sql="DELETE FROM mlo_batiment WHERE IdB='$idbatiment'";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD basename()");
        }

   }   
        public static function DelSalleById($idsalle) {
		try
        {
			$sql="DELETE FROM mlo_salle WHERE IdS='$idsalle'";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD basename()");
        }

   } 

        public static function DelAssociationById($idassociation) {
		try
        {
			$sql="DELETE FROM mlo_association WHERE IdAs='$idassociation'";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD basename()");
        }

   }
        public static function DelLocataireById($idlocataire) {
		try
        {
			$sql="DELETE FROM mlo_locataire WHERE IdL='$idlocataire'";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD basename()");
        }

   }
        public static function DelManifestationByIdManif($idmanif) {
		try
        {
			$sql="DELETE FROM mlo_manifestation WHERE IdM='$idmanif'";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

   }
        public static function DelVilleById($nomville) {
			try
	        {
				$sql="DELETE FROM mlo_ville WHERE nomV='$nomville'";
				$result=ModelPdo::$pdo->query($sql);
				$liste=$result->fetchAll();
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD basename()");
	        }
   		}

   		public static function GetIdAsso() {
			try
	        {
				$sql="SELECT IdAs FROM mlo_association;";
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
		
		public static function GetIdTp() {
			try
	        {
				$sql="SELECT * FROM mlo_tarif_part;";
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
		
		public static function GetIdTa() {
			try
	        {
				$sql="SELECT * FROM mlo_tarif_asso;";
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
		
		public static function GetVille() {
			try
	        {
				$sql="SELECT DISTINCT NomV FROM mlo_batiment;";
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
		
		public static function GetSalles() {
			try
	        {
				$sql="SELECT NomS FROM mlo_salle ORDER BY NomS;";
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

		public static function GetBatiment() {
			try
	        {
				$sql="SELECT * FROM mlo_batiment ORDER BY NomB;";
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

	    public static function GetIdTypeManif() {
			try
	        {
				$sql="SELECT IdT FROM mlo_type_manif;";
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

	    public static function GetNomAsByIdAs($idas) {
			try
	        {
				$sql="SELECT NomAs FROM mlo_association WHERE IdAs='$idas' ORDER BY NomAs;";
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
	            die("Erreur dans la BDD basename()");
        	}
        }

	    public static function GetCapaciteById($idsalle) {
			try
	        {
				$sql="SELECT idS FROM mlo_salle WHERE IdS='$idsalle';";
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
	            die("Erreur dans la BDD basename()");
        	}
        }

	    public static function GetNomTypeManifByIdTypeManif($idtypemanif) {
			try
	        {
				$sql="SELECT LibelleT FROM mlo_type_manif WHERE IdT='$idtypemanif';";
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
	            die("Erreur dans la BDD basename()");
        	}
        } 

		public static function GetAdresseManif($idmanif) {
			try
	        {
				$sql="SELECT * FROM mlo_association MA, mlo_manifestation MM WHERE MA.IdAs=MM.IdAs and IdM=$idmanif;";
				$result=ModelPdo::$pdo->query($sql);
				$liste=$result->fetchAll();
				return $liste;
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD basename()");
        	}
        }

public static function GetnomVille($idmanif) {
			try
	        {
				$sql="SELECT * FROM mlo_salle MS, mlo_batiment MB, mlo_manifestation MM WHERE MS.idS=MM.IdS and MS.idB=MB.idB and IdM='$idmanif';";
				$result=ModelPdo::$pdo->query($sql);
				$liste = $result->fetchAll();
				return $liste;
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD basename()");
        	}
        }
		
		public static function GetSalle($idmanif) {
			try
	        {
				$sql="SELECT * FROM mlo_salle MS, mlo_batiment MB, mlo_manifestation MM WHERE MS.idS=MM.IdS and MS.idB=MB.idB and IdM=$idmanif;";
				$result=ModelPdo::$pdo->query($sql);
				$liste = $result->fetchAll();
				return $liste;
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD basename()");
        	}
        }         
public static function GetPeriode($idmanif) {
			try
	        {
				$sql="SELECT * FROM   mlo_manifestation MM, mlo_calendar MC  WHERE MM.Id2=MC.Id2 and  IdM=$idmanif;";
				$result=ModelPdo::$pdo->query($sql);
				$liste = $result->fetch();
				return $liste;
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD basename()");
        	}
        } 
		
		public static function GetRecup($ville) {
			try
	        {
				$sql="SELECT recup FROM   mlo_ville  WHERE  NomV='$ville';";
				$result=ModelPdo::$pdo->query($sql);
				$liste = $result->fetch();
				return $liste;
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD basename()");
        	}
        }         
public static function GetNote($ville) {
			try
	        {
				$sql="SELECT note FROM   mlo_ville  WHERE  NomV='$ville';";
				$result=ModelPdo::$pdo->query($sql);
				$liste = $result->fetch();
				return $liste;
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD basename()");
        	}
        }
		
		public static function GetTarif($ville) {
			try
	        {
				$sql="SELECT tarif FROM   mlo_tarif_asso  WHERE  ville='$ville';";
				$result=ModelPdo::$pdo->query($sql);
				$liste=$result->fetch();
				return $liste;
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD basename()");
        	}
        }  
		public static function GetPayant($idmanif) {
			try
	        {
				$sql="SELECT Payant FROM   mlo_manifestation MM, mlo_type_manif MTM WHERE MM.IdT=MTM.IdT and  IdM=$idmanif;";
				$result=ModelPdo::$pdo->query($sql);
				$liste=$result->fetch();
				return $liste;
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD basename()");
        	}
        }  

		public static function GetBut($idmanif) {
			try
	        {
				$sql="SELECT NomM FROM   mlo_manifestation  WHERE  idM=$idmanif;";
				$result=ModelPdo::$pdo->query($sql);
				$liste = $result->fetch();
				return $liste;
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD basename()");
        	}
        }	
		
		public static function GetMaire($ville) {
			try
	        {
				$sql="SELECT maire FROM   mlo_ville  WHERE  NomV='$ville';";
				$result=ModelPdo::$pdo->query($sql);
				$liste = $result->fetch();
				return $liste;
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD basename()");
        	}
        }         

	   public static function AddManifA($nommanifestation, $publique, $nombrepersonne, $heuredebut, $heurefin, $idtypemanif, $idassociation, $idsalle, $id2) {
	        try
	        {
	        	$sql="INSERT INTO mlo_manifestation (IdM, NomM, Publique, NombrePersonne, HeureDebut, HeureFin, IdT, IdAs, IdS, Id2)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
				$result=ModelPdo::$pdo->prepare($sql);
				print_r(array(NULL, $nommanifestation, $publique, $nombrepersonne, $heuredebut, $heurefin, $idtypemanif, $idassociation, $idsalle, $id2));
				$result->execute(array(NULL, $nommanifestation, $publique, $nombrepersonne, $heuredebut, $heurefin, $idtypemanif, $idassociation, $idsalle, $id2));
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }

	   }

 		public static function AddManifP($nommanifestation, $publique, $nombrepersonne, $heuredebut, $heurefin, $idtypemanif, $idparticulier, $idsalle, $id2) {
	        try
	        {
	        	$sql="INSERT INTO mlo_manifestation (IdM, NomM, Publique, NombrePersonne, HeureDebut, HeureFin, IdT, IdP, IdS, Id2)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
				$result=ModelPdo::$pdo->prepare($sql);
				$result->execute(array(NULL, $nommanifestation, $publique, $nombrepersonne, $heuredebut, $heurefin, $idtypemanif, $idparticulier, $idsalle, $id2));
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }

	   }

	    public static function GetAllManifById2AndIdS($id2,$ids) {
			try
	        {
				$sql="SELECT * FROM mlo_manifestation WHERE id2='$id2'AND IdS='$ids' ORDER BY  HeureFin;";
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
	            die("Erreur dans la BDD basename()");
        	}
        } 

	    public static function GetNomVilleByIdS($ids) {
			try
	        {
				$sql="SELECT NomV FROM mlo_batiment, mlo_salle WHERE mlo_batiment.IdB=mlo_salle.IdB AND IdS='$ids'";
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
	            die("Erreur dans la BDD basename()");
        	}
        }

    public static function AddAssociation($nomas, $adruesiegeadmin,
                                          $adruesiegesocial, $nomvsa, $nomvss, $codepostalvsa,
                                          $codepostalvss, $site, $activite, $forum, $invit, $com,
                                          $nomPre, $prenompre, $numpre, $mailpre, $nomautre,
                                          $prenomautre, $numautre, $mailautre, $nomautre1,
                                          $prenomautre1, $numautre1, $mailautre1, $villeIntervention1, $villeIntervention2, $villeIntervention3, $villeIntervention4, $villeIntervention5) {
        try
        {
            $sql="INSERT INTO mlo_association (NomAs, AdrueSiegeAdmin, AdrueSiegeSocial, NomVSA, NomVSS, CodePostalVSA, CodePostalVSS, Site, Activite, forum, invit, NomPre, Com, PrenomPre, NumPre, MailPre, NomAutre, PrenomAutre, NumAutre, MailAutre, NomAutre1, PrenomAutre1, NumAutre1, MailAutre1, `Veneux-les-Sablons`, `Moret-sur-Loing`, Ecuelles, Episy, Montarlot)
				VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
				echo $sql;
            $result=ModelPdo::$pdo->prepare($sql);
            $result->execute(array($nomas, $adruesiegeadmin, $adruesiegesocial, $nomvsa, $nomvss, $codepostalvsa, $codepostalvss, $site, $activite, $forum, $invit, $com, $nomPre, $prenompre, $numpre, $mailpre, $nomautre, $prenomautre, $numautre, $mailautre, $nomautre1, $prenomautre1, $numautre1, $mailautre1, $villeIntervention1, $villeIntervention2, $villeIntervention3, $villeIntervention4, $villeIntervention5));
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        }
    } 

    public static function AddTarifP($ville, $salles,$tarif) {
	        try
	        {
	        	//$sql="INSERT INTO mlo_batiment (IdB, NomB, NomV, adresse)
				//VALUES (?, ?, ?,?);";
				//echo $sql;
				$sql="INSERT INTO mlo_tarif_part (ville, salle, tarif) VALUES ('$ville', '$salles', $tarif);";
				//$result=ModelPdo::$pdo->prepare($sql);
				$result=ModelPdo::$pdo->exec($sql);
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }

	   }   

  public static function AddTarifA($ville, $salles,$tarif) {
	        try
	        {
	        	//$sql="INSERT INTO mlo_batiment (IdB, NomB, NomV, adresse)
				//VALUES (?, ?, ?,?);";
				//echo $sql;
				$sql="INSERT INTO mlo_tarif_asso (ville, salle, tarif) VALUES ('$ville', '$salles', $tarif);";
				//$result=ModelPdo::$pdo->prepare($sql);
				$result=ModelPdo::$pdo->exec($sql);
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }

	   }   
	
    public static function AddBatiment($NomB, $NomV,$adresse) {
	        try
	        {
	        	//$sql="INSERT INTO mlo_batiment (IdB, NomB, NomV, adresse)
				//VALUES (?, ?, ?,?);";
				//echo $sql;
				$sql="INSERT INTO mlo_batiment (NomB, NomV, adresse) VALUES ('$NomB', '$NomV', '$adresse');";
				//$result=ModelPdo::$pdo->prepare($sql);
				$result=ModelPdo::$pdo->exec($sql);
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }

	   }   

  public static function Addsalle($NomS, $capacite, $IdB) {
	        try
	        {
	        	//$sql="INSERT INTO mlo_batiment (IdB, NomB, NomV, adresse)
				//VALUES (?, ?, ?,?);";
				//echo $sql;
				$sql="INSERT INTO mlo_salle (NomS, capacite, IdB) VALUES ('$NomS', $capacite, $IdB);";
				echo $sql;
				//$result=ModelPdo::$pdo->prepare($sql);
				$result=ModelPdo::$pdo->exec($sql);
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }
  }

	   public static function AddParticulier($nom, $prenom, $numerotelephone, $DeuxiemeTel, $TroisiemeTel, $mail, $codepostal, $ville, $adresse) {
	        try
	        {
	        	$sql="INSERT INTO mlo_particulier (IdP, Nom, Prenom, NumeroTelephone, DeuxiemeTel, TroisiemeTel, Mail, CodePostal, Ville, Adresse)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
				$result=ModelPdo::$pdo->prepare($sql);
				$result->execute(array(NULL, $nom, $prenom, $numerotelephone, /*$DeuxiemeTel, $TroisiemeTel,*/ $mail, $codepostal, $ville, $adresse));
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }
	   }
       public static function AddCompteVisiteur($login, $passwaord){
            try
            {
                $sql="INSERT INTO mlo_users(id, login, password)
                    VALUES (?, ?, ?);";
                $result=ModelPdo::$pdo->prepare($sql);
                $result->execute(array(NULL, $login, $passwaord));
            } catch (PDOException $e){
                echo  $e->getMessage();
                die(" Erreur dans la BDD ");
            }
       }


	   public static function AddTypeManif($libellet, $payant) {
	        try
	        {
	        	$sql="INSERT INTO mlo_type_manif (IdT, LibelleT, Payant)
				VALUES (?, ?, ?);";
				$result=ModelPdo::$pdo->prepare($sql);
				$result->execute(array(NULL, $libellet, $payant));
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }
	   }

	   public static function AddVille($codepostal, $appartenancemlo) {
	        try
	        {
	        	$sql="INSERT INTO mlo_ville (NomV, CodePostal, AppartenanceMLO)
				VALUES (?, ?, ?);";
				$result=ModelPdo::$pdo->prepare($sql);
				$result->execute(array(NULL, $codepostal, $appartenancemlo));
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }
	   }

	   	   public static function AddServiceTechnique($nomresponsable, $prenomresponsable, $telephoner) {
	        try
	        {
	        	$sql="INSERT INTO mlo_service_technique (IdST, NomResponsable, PrenomResponsable)
				VALUES (?, ?, ?, ?);";
				$result=ModelPdo::$pdo->prepare($sql);
				$result->execute(array(NULL, $nomresponsable, $prenomresponsable, $telephoner));
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }
	   }

	   	   	   public static function AddLocataire($noml, $prenoml, $adruel, $courriel, $telephone, $nomv) {
	        try
	        {
	        	$sql="INSERT INTO mlo_locataire (IdL, NomL, PrenomL, Adruel, Courriel, Telephone, NomV)
				VALUES (?, ?, ?, ?, ?, ?, ?);";
				$result=ModelPdo::$pdo->prepare($sql);
				$result->execute(array(NULL, $noml, $prenoml, $adruel, $courriel, $telepone, $nomv));
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }
	   }


	   	   	   public static function AddActeEngagement($dateac, $montantfacturé, $idl) {
	        try
	        {
	        	$sql="INSERT INTO mlo_acte_engagement (IdAc, DateAc, montantfacturé, IdL)
				VALUES (?, ?, ?, ?);";
				$result=ModelPdo::$pdo->prepare($sql);
				$result->execute(array(NULL, $dateac, $montantfacturé, $idl));
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }
	   }

	   public static function GetIdParticulier() {
			try
	        {
				$sql="SELECT idP FROM mlo_particulier";
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
	            die("Erreur dans la BDD basename()");
        	}
        }

        public static function GetNomPrenomParticulierByIdP($idp) {
			try
	        {
				$sql="SELECT Nom, Prenom FROM mlo_particulier WHERE idP='$idp'";
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
	            die("Erreur dans la BDD basename()");
        	}
        }

        public static function GetAllInfoManifByIdManif($idmanif) {
			try
	        {
				$sql="SELECT * FROM mlo_manifestation WHERE idM=$idmanif;";
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
	            die("Erreur dans la BDD basename()");
        	}
        }
        public static function GetAllInfoAssoByIdAsso($idasso) {
			try
	        {
				$sql="SELECT * FROM mlo_association WHERE idAs='$idasso' ORDER BY NomAs;";
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
	            die("Erreur dans la BDD basename()");
        	}
        }
        public static function GetAllInfoTypeManifByIdTypeManif($idtypemanif) {
			try
	        {
				$sql="SELECT * FROM mlo_type_manif WHERE IdT=$idtypemanif;";
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
	            die("Erreur dans la BDD basename()");
        	}
        }
		
		 public static function GetAllSallesByIdS($idsalles, $idbatiment) {
			try
	        {
				$sql="SELECT * FROM mlo_salle, mlo_batiment WHERE IdS=$idsalles and mlo_batiment.IdB=$idbatiment;";
				$result=ModelPdo::$pdo->query($sql);
				$liste=$result->fetch();
				if(!isset($liste[0]))
				{
					return null;
				} else {
					return $liste;
				}
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD basename()");
        	}
        } 

		public static function Getpersonne($IdS) {
			try
	        {
				$sql="SELECT capacite FROM mlo_salle where IdS=$IdS;";
				$result=ModelPdo::$pdo->query($sql);
				$liste=$result->fetchAll();
				return $liste;
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD basename()");
        	}
        } 
		
		public static function GetTarifByidTa ($idtarifa) {
			try
	        {
				$sql="SELECT * FROM mlo_tarif_asso WHERE IdTa=$idtarifa ;";
				$result=ModelPdo::$pdo->query($sql);
				$liste=$result->fetch();
				if(!isset($liste[0]))
				{
					return null;
				} else {
					return $liste;
				}
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD basename()");
        	}
        } 
		
		public static function GetTarifByidTp ($idtarifp) {
			try
	        {
				$sql="SELECT * FROM mlo_tarif_part WHERE IdTp=$idtarifp ;";
				$result=ModelPdo::$pdo->query($sql);
				$liste=$result->fetch();
				if(!isset($liste[0]))
				{
					return null;
				} else {
					return $liste;
				}
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD basename()");
        	}
        }

	   public static function ModifManifA($idmanif, $nommanifestation, $publique, $nombrepersonne, $heuredebut, $heurefin, $idtypemanif, $idassociation) {
	        try
	        {
	        	$sql="UPDATE mlo_manifestation SET NomM='$nommanifestation', publique='$publique', NombrePersonne=$nombrepersonne, HeureDebut='$heuredebut', HeureFin='$heurefin', IdT=$idtypemanif, IdAs=$idassociation WHERE IdM=$idmanif;";
				$result=ModelPdo::$pdo->prepare($sql);
				$result->execute(array(NULL,$nommanifestation, $publique, $nombrepersonne, $heuredebut, $heurefin, $idtypemanif, $idassociation));
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }
	    }

	   public static function ModifManifP($idmanif, $nommanifestation, $publique, $nombrepersonne, $heuredebut, $heurefin, $idtypemanif, $idparticulier) {
	        try
	        {
	        	$sql="UPDATE mlo_manifestation SET NomM='$nommanifestation', Publique=$publique, NombrePersonne=$nombrepersonne, HeureDebut='$heuredebut', HeureFin='$heurefin', IdT=$idtypemanif, IdP=$idparticulier WHERE IdM=$idmanif;";
				$result=ModelPdo::$pdo->prepare($sql);
				$result->execute(array(NULL, $nommanifestation, $publique, $nombrepersonne, $heuredebut, $heurefin, $idtypemanif, $idparticulier));
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }
	    }

    public static function ModifAssociation($idAs, $nomas, $adruesiegeadmin, $adruesiegesocial, $nomvsa, $nomvss, $codepostalvsa, $codepostalvss, $site, $activite, $forum, $invit, $com, $nomPre, $prenompre, $numpre, $mailpre, $nomautre, $prenomautre, $numautre, $mailautre, $nomautre1, $prenomautre1, $numautre1, $mailautre1,$villeIntervention1, $villeIntervention2, $villeIntervention3, $villeIntervention4, $villeIntervention5) {
        try
        {
            $sql="UPDATE mlo_association SET NomAs='$nomas', AdrueSiegeAdmin='$adruesiegeadmin', AdrueSiegeSocial='$adruesiegesocial', NomVSA='$nomvsa', NomVSS='$nomvss', CodePostalVSA=$codepostalvsa, CodePostalVSS=$codepostalvss, Site='$site', Activite='$activite', forum=$forum, invit=$invit, Com='$com', NomPre='$nompre', PrenomPre='$prenompre', NumPre=$numpre, MailPre='$mailpre', NomAutre='$nomautre', PrenomAutre='$prenomautre', NumAutre=$numautre, MailAutre='$mailautre', NomAutre1='$nomautre1', PrenomAutre1='$prenomautre1', NumAutre1=$numautre1, MailAutre1='$mailautre1', `Veneux-les-Sablons`='$villeIntervention1', `Moret-sur-Loing`='$villeIntervention2', Ecuelles='$villeIntervention3', Episy='$villeIntervention4', Montarlot='$villeIntervention5' WHERE IdAs=$idAs";
            $result=ModelPdo::$pdo->prepare($sql);
            $result->execute(array(NULL, $nomas, $adruesiegeadmin, $adruesiegesocial, $nomvsa, $nomvss, $codepostalvsa, $codepostalvss, $site, $activite, $forum, $invit, $com, $nomPre, $prenompre, $numpre, $mailpre, $nomautre, $prenomautre, $numautre, $mailautre, $nomautre1, $prenomautre1, $numautre1, $mailautre1));
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        }
    }

    public static function ModifParticulier($idP, $nom, $prenom, $numerotelephone, $deuxiemetel, $troisiemetel, $mail, $codepostal, $ville, $adresse) {

        try
        {
            $sql="UPDATE mlo_particulier SET Nom='$nom', Prenom='$prenom', NumeroTelephone=$numerotelephone, DeuxiemeTel=$deuxiemetel, TroisiemeTel=$troisiemetel, Mail='$mail', CodePostal='$codepostal', Ville='$ville', Adresse='$adresse' WHERE IdP=$idP";
            $result=ModelPdo::$pdo->prepare($sql);
            $result->execute(array(NULL, $nom, $prenom, $numerotelephone, $deuxiemetel, $troisiemetel, $mail, $codepostal, $ville, $adresse));
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        }
    }

	   public static function ModifBatiment($idB, $nomb, $adresse) {
	        try
	        {
	        	$sql="UPDATE mlo_batiment SET NomB='$nomb', adresse='$adresse' WHERE IdB=$idB";
				$result=ModelPdo::$pdo->exec($sql);
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }
	    } 
		
		public static function ModifSalle($idS, $capacite) {
	        try
	        {
	        	$sql="UPDATE mlo_salle SET capacite=$capacite WHERE IdS=$idS";
				echo $sql;
				$result=ModelPdo::$pdo->exec($sql);
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }
	    }	
		
		public static function Modiftarifa($idTa, $ville, $salle, $tarif) {
	        try
	        {
	        	$sql="UPDATE mlo_tarif_asso SET ville='$ville', salle='$salle', tarif=$tarif WHERE idTa=$idTa";
				echo $sql;
				$result=ModelPdo::$pdo->exec($sql);
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }
	    }	
		
		public static function Modiftarifp($idTp, $ville, $salle, $tarif) {
	        try
	        {
	        	$sql="UPDATE mlo_tarif_part SET ville=$ville and salle=$salle and tarif=$tarif WHERE IdTp=$idTp";
				echo $sql;
				$result=ModelPdo::$pdo->exec($sql);
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }
	    }

	   public static function ModifDemandeIntervention($idDI, $idl, $idst) {
	        try
	        {
	        	$sql="UPDATE mlo_demande_intervention SET IdL=$idl, IdST=$idst WHERE IdDL=$idDI";
				$result=ModelPdo::$pdo->prepare($sql);
				$result->execute(array(NULL, $idl, $idst));
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }
	    }

	    public static function GetDbDateById2($id2) {
			try
	        {
				$sql="SELECT db_date FROM mlo_calendar WHERE id2='$id2';";
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
		
	    public static function GetId2ByMois($mois,$jour,$lannee) {
			try
	        {
				$sql="SELECT Id2 FROM mlo_calendar WHERE month=$mois and day=$jour and year=$lannee;";
				$result=ModelPdo::$pdo->query($sql);
				$liste=$result->fetch();
				return $liste;
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	       	}
		}
		
    public static function GetAllAssoType($tville,$type) {
        try
        {
			if($type=="Forum des Associations")
			{
				$sql="SELECT * FROM mlo_association WHERE '$tville[0]'=1";
				for($i=1;$i<count($tville);$i++){ 
					$sql=$sql." AND '".$tville[$i]."'=1";
					} 
					$sql=$sql." AND forum=1 ORDER BY 1";
			}
			if($type=="Invitation Réunion Salles")
			{
				$sql="SELECT * FROM mlo_association WHERE '$tville[0]'=1";
				for($i=1;$i<count($tville);$i++){ 
					$sql=$sql." AND '".$tville[$i]."'=1";
					} 
					$sql=$sql." AND invit=1 ORDER BY 1";
			}
			if($type=="aucune")
			{
				$sql="SELECT * FROM mlo_association WHERE `$tville[0]`=1";
				for($i=1;$i<count($tville);$i++){ 
					$sql = $sql. " AND `".$tville[$i]."`=1";
					} 
					$sql=$sql." AND forum=0 and invit=0 ORDER BY 1";
			}
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
	    public static function GetAllAsso() {
			try
	        {
				$sql="SELECT * FROM mlo_association order BY NomAs;";
				
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

	    public static function GetAllTypeManif() {
			try
	        {
				$sql="SELECT * FROM mlo_type_manif ORDER BY LibelleT;";
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
	       	}
		}
		
		public static function GetAllSalles() {
			try
	        {
				$sql="SELECT * FROM mlo_salle, mlo_batiment where mlo_salle.IdB=mlo_batiment.IdB ORDER BY NomV;";
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
	       	}
		}
         public static function GetAllVist() {
            try
            {
                $sql="SELECT * FROM mlo_users;";
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

	    public static function GetAllPart() {
			try
	        {
				$sql="SELECT * FROM mlo_particulier ORDER BY Nom, Prenom;";
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

        public static function DelTypeManifByIdTypeManif($idtypemanif) {
		try
        {
			$sql="DELETE FROM mlo_type_manif WHERE IdT='$idtypemanif'";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD basename()");
        }
   } 
   
   public static function DelsallesByIdsalles($idsalles) {
		try
        {
			$sql="DELETE FROM mlo_salle WHERE IdS=$idsalles";
			$result=ModelPdo::$pdo->exec($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD basename()");
        }
   }
   
   public static function DeltarifAbyIdA($idtarifa) {
		try
        {
			$sql="DELETE FROM mlo_tarif_asso WHERE IdTa=$idtarifa";
			$result=ModelPdo::$pdo->exec($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD basename()");
        }
   }
   
   public static function DeltarifPbyIdP($idtarifp) {
		try
        {
			$sql="DELETE FROM mlo_tarif_part WHERE IdTp=$idtarifp";
			$result=ModelPdo::$pdo->exec($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD basename()");
        }
   }

	    public static function GetAllPartById($idpart) {
			try
	        {
				$sql="SELECT * FROM mlo_particulier WHERE IdP='$idpart';";
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

        public static function DelVisiteurById($id) {
            try
            {
                $sql="DELETE FROM mlo_users WHERE Id='$id'";
                $result=ModelPdo::$pdo->query($sql);
                $liste=$result->fetchAll();
            } catch (PDOException $e) {
                echo $e->getMessage();
                die("Erreur dans la BDD basename()");
            }

        }


    public static function DelParticulierById($idparticulier) {
		try
        {
			$sql="DELETE FROM mlo_particulier WHERE IdP='$idparticulier'";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD basename()");
        }

   }
         public static function DelCompteById($idvisiteur) {
            try
            {
                $sql="DELETE FROM mlo_users WHERE IdV='$idvisiteur'";
                $result=ModelPdo::$pdo->query($sql);
                $liste=$result->fetchAll();
            } catch (PDOException $e) {
                echo $e->getMessage();
                die("Erreur dans la BDD basename()");
            }

        }

	    public static function GetAllPeriodeScolaire() {
			try
	        {
				$sql="SELECT * FROM mlo_periode_scolaire;";
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
	   public static function ModifTypemanif($idtype, $libelle, $payant) {
	        try
	        {
	        	$sql="UPDATE mlo_type_manif SET LibelleT='$libelle', Payant='$payant' WHERE IdT=$idtype;";
				$result=ModelPdo::$pdo->prepare($sql);
				$result->execute(array(NULL,$libelle, $payant));
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }
	    }
	   public static function GetAllManifByAllInfoA($nom, $heuredebut, $heurefin, $publique, $nombrepersonne, $typemanif, $asso, $idsalle) {
			try
	        {

				$sql="SELECT * FROM mlo_manifestation WHERE NomM='$nom' AND Publique='$publique' AND NombrePersonne=$nombrepersonne AND HeureDebut='$heuredebut' AND HeureFin='$heurefin' AND IdT='$typemanif' AND IdAs='$asso' AND IdS='$idsalle';";
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

		public static function GetAllManifByAllInfoP($nom, $heuredebut, $heurefin, $publique, $nombrepersonne, $typemanif, $part, $idsalle) {
			try
	        {

				$sql="SELECT * FROM mlo_manifestation WHERE NomM='$nom' AND Publique='$publique' AND NombrePersonne=$nombrepersonne AND HeureDebut='$heuredebut' AND HeureFin='$heurefin' AND IdT='$typemanif' AND idP='$part' AND IdS='$idsalle';";
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

	   public static function GetDayById2($id2) {
			try
	        {
				$sql="SELECT day_name FROM mlo_calendar WHERE id2='$id2'";
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
	            die("Erreur dans la BDD basename()");
        	}
        }
        public static function AddPeriodeScolaire($datedebut, $vac1debut, $vac1fin, $vac2debut, $vac2fin, $vac3debut, $vac3fin, $vac4debut, $vac4fin, $datefin) {
	        try
	        {
	        	$sql="INSERT INTO mlo_periode_scolaire (IdPS, DateDebut, Vac1Debut, Vac1Fin, Vac2Debut, Vac2Fin, Vac3Debut, Vac3Fin, Vac4Debut, Vac4Fin, DateFin)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
				$result=ModelPdo::$pdo->prepare($sql);
				$result->execute(array(NULL, $datedebut, $vac1debut, $vac1fin, $vac2debut, $vac2fin, $vac3debut, $vac3fin, $vac4debut, $vac4fin, $datefin));
	        } catch (PDOException $e) {
	            echo $e->getMessage();
	            die("Erreur dans la BDD ");
	        }

	   }
	   public static function DelPeriodeScolaireById($periode) {
		try
        {
			$sql="DELETE FROM mlo_periode_scolaire WHERE IdPS='$periode'";
			$result=ModelPdo::$pdo->query($sql);
			$liste=$result->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD basename()");
        }

   }   

   public static function countSalleVille($ville) 
   {
    try
        {
      $sql="SELECT count(idS) as nbrSalle FROM mlo_salle MS, mlo_batiment MB WHERE MS.idB = MB.idB AND NomV = '".$ville."' ";
      $result=ModelPdo::$pdo->query($sql);
      $liste=$result->fetch();
      return $liste;
        } catch (PDOException $e) 
        {
            echo $e->getMessage();
            die("Erreur dans la BDD basename()");
        }
   }

   public static function getAllNomSalle($ville) 
   {
    try
        {
      $sql="SELECT IdS,NomS FROM mlo_salle MS, mlo_batiment MB WHERE MS.idB = MB.idB AND NomV = '".$ville."' ";
      $result=ModelPdo::$pdo->query($sql);
      $liste=$result->fetchAll();
      return $liste;
        } catch (PDOException $e) 
        {
            echo $e->getMessage();
            die("Erreur dans la BDD basename()");
        }
   } 

   public static function TranslateDay($jour_an) 
   {
    $jour_en=array("Monday", "Tuesday", "Wednesday", "Thursday","Friday", "Saturday", "Sunday");
	$jour_fr=array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
	$jour = str_replace($jour_en, $jour_fr, $jour_an);
	return $jour;
   } 
   
   
   public static function TranslateMonth($mois_an) 
   {
    $mois_en=array("January","February", "March", "April", "May","June", "July", "August", "September","October", "November", "December");
	$mois_fr=array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre");
	$mois = str_replace($mois_en, $mois_fr, $mois_an);
	return $mois;
   }


}


?>