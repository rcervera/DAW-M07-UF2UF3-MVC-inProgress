<?php
include_once 'Model.php';

class Usuaris extends Model{
	
    protected $taula ="usuaris";
    
    public function afegir($nom,$cognoms,$email,$username,$password) {
		$sql ="insert into usuaris(nom,cognoms,email,username,password) values 
				 (:nom,:cognoms,:email,:username,:password)";
		$ordre = $this->bd->prepare($sql);	 
		$ordre->bindValue(':nom',$nom);
		$ordre->bindValue(':cognoms',$cognoms);
		$ordre->bindValue(':email',$email);
		$ordre->bindValue(':username',$username);
		$ordre->bindValue(':password',md5($password));
		$res = $ordre->execute(); 
        return $res;

    }


    public function actualitzar($codi,$nom,$cognoms,$email,$username) {
		$sql ="update usuaris set nom=:nom,cognoms=:cognoms, email=:email, username=:username 
				 where codi=:codi";
		$ordre = $this->bd->prepare($sql);	 
			$ordre->bindValue(':codi',$codi);
		$ordre->bindValue(':nom',$nom);
		$ordre->bindValue(':cognoms',$cognoms);
		$ordre->bindValue(':email',$email);
		$ordre->bindValue(':username',$username);
		
		$res = $ordre->execute(); 
        return $res;

    }





}

?>

