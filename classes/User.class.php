
<?php

class User {
  private $firstname;
  private $lastname;
  private $username;
  private $email;
  private $password;
  private $password_confirm;
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
// voor register2
public function getPassword_confirm(){
  return $this->password_confirm;
}

public function setPassword_confirm($password_confirm){
  $this->password_confirm = $password_confirm;
  return $this;
}



public function register(){
  // form validation
  // voor register 2
  if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
    return false;
    $email_error = "Invalid e-mail";
  }
  if(strlen($this->password) < 8){
    return false;
    $strong_password_error = "Your password need at least 8 characters";
  }
  if($this->password != $this->password_confirm){
    return false;
    $unequal_password_error = "Passwords don't match";
  }
  else{
  // voor register 2
  $options = [
    "cost" => 12 // 2^12
    ];
  $password = password_hash($this->password,PASSWORD_DEFAULT,$options);
  try{
    $conn = Db::getInstance();
    $statement = $conn->prepare("insert into users(first_name, last_name, user_name, email, birthdate, password) values('$this->firstname','$this->lastname','$this->username', '$this->email', '$this->birthdate', '$password')");
    /*
    $statement->bindParam(':firstname', $this->firstname);
    $statement->bindParam(':lastname', $this->lastname);
    $statement->bindParam(':username', $this->username);
    $statement->bindParam(':email', $this->email);
    $statement->bindParam(':birthdate', $this->birthdate);
    $statement->bindParam(':password', $password);
    */
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


}

?>



