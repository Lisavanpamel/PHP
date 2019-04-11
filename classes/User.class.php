
<?php

class User {
  private $firstname;
  private $lastname;
  private $username;
  private $email;
  private $password;
  private $birthdate;

  // krijg de waarde van username
  public function getFirstname(){
    return $this->firstname;
  }

  public function setFirstname($firstname){
    $this->firstname = $firstname;
    return $this;
  }

  public function getLastname(){
    return $this->lastname;
  }

  public function setLastname($lastname){
    $this->lastname = $lastname;
    return $this;
  }


// krijg de waarde van username
public function getUsername(){
  return $this->username;
}

public function setUsername($username){
  $this->username = $username;
  return $this;
}

// krijg de waarde Email
public function getEmail(){
  return $this->email;
}

public function setEmail($email){
  $this->email = $email;
  return $this;
}

// krijgt de waarde van birthdate
public function getBirthdate(){
  return $this->birthdate;
}

public function setBirthdate($birthdate){
  $this->birthdate = $birthdate;
  return $birthdate;
}

// krijgt de waarde van password
public function getPassword(){
  return $this->password;
}

public function setPassword($password){
  $this->password = $password;
  return $this;
}

public function register(){
  // form validation
  $options = [
    "cost" => 12 // 2^12
    ];
  $password = password_hash($this->password,PASSWORD_DEFAULT,$options);
  try{
    $conn = Db::getInstance();
    $statement = $conn->prepare("insert into users(first_name, last_name, user_name, email, birthdate, password) values(':firstname',':lastname',':username', ':email', ':birthdate', ':password')");
    $statement->bindParam(":firstname", $this->firstname);
    $statement->bindParam(":lastname", $this->lastname);
    $statement->bindParam(":username", $this->username);
    $statement->bindParam(":email", $this->email);
    $statement->bindParam(":birthdate", $this->birthdate);
    $statement->bindParam(":password", $password);

    $result = $statement->execute();
    //return $result;
    header("Location: index.php");
  }
  catch( Throwable $t){
    echo "mislukt";
  return false;
  }


}


}

?>
