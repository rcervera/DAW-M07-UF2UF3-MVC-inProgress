<?php
include_once 'Model.php';

class Usuaris extends Model{
	
    protected $taula ="usuaris";
    
    public function afegir($nom,$cognoms,$email,$username,$password,$rol) {
		$sql ="insert into usuaris(nom,cognoms,email,username,password,rol) values 
				 (:nom,:cognoms,:email,:username,:password,:rol)";
		$ordre = $this->bd->prepare($sql);	 
		$ordre->bindValue(':nom',$nom);
		$ordre->bindValue(':cognoms',$cognoms);
		$ordre->bindValue(':email',$email);
		$ordre->bindValue(':username',$username);
		$ordre->bindValue(':password',md5($password));
                $ordre->bindValue(':rol',$rol);
		$res = $ordre->execute(); 
        return $res;

    }


    public function actualitzar($codi,$nom,$cognoms,$email,$username,$rol) {
		$sql ="update usuaris set nom=:nom,cognoms=:cognoms, email=:email, username=:username, rol=:rol
				 where codi=:codi";
		$ordre = $this->bd->prepare($sql);	 
			$ordre->bindValue(':codi',$codi);
		$ordre->bindValue(':nom',$nom);
		$ordre->bindValue(':cognoms',$cognoms);
		$ordre->bindValue(':email',$email);
		$ordre->bindValue(':username',$username);
		$ordre->bindValue(':rol',$rol);
		$res = $ordre->execute(); 
        return $res;

    }


    public function valida($user,$pwd){
        $sql = "SELECT username,password from usuaris where 
                username = :nom AND password = :pwd";
		$sentencia = $this->bd->prepare($sql);
		$sentencia->bindValue(':nom',$user);
		$sentencia->bindValue(':pwd', md5($pwd));
		$sentencia->execute();
		$resultat = $sentencia->fetch();
		if ($resultat==null)
			return false;
		else
			return true;

  }
  
  public function getRol($nom){
       $sql = "SELECT * from usuaris where username = :nom";
       $sentencia = $this->bd->prepare($sql);
       $sentencia->bindValue(':nom',$nom);
       $sentencia->execute();
       $tipus = $sentencia->fetch(PDO::FETCH_ASSOC);
	
       return $tipus['rol'];
  }




}

?>

