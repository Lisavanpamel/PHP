
<?php

class User {
  private $firstname;
  private $lastname;
  private $username;
  private $email;
  private $password;
  private $password_confirm;
  private $birthdate;
  private $user_id; //is nodig om profiel aan te passen

  //temp voor IMAGE UPLOAD
  private $ImageName;
  private $ImageSize;
  private $ImageTmpName;



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
    throw new Exception("Invalid Email");

  }
  if(strlen($this->password) < 8){
    throw new Exception("Your password needs at leats 8 characters");

  }
  if($this->password != $this->password_confirm){
    throw new Exception("Passwords don't match");
  }
  else{
  // voor register 2
  $options = [
    "cost" => 12 // 2^12
    ];
  $password = password_hash($this->password,PASSWORD_DEFAULT,$options);
  try{
    $conn = Db::getInstance();
    //$statement = $conn->prepare("insert into users(first_name, last_name, user_name, email, birthdate, password) values('$this->firstname','$this->lastname','$this->username', '$this->email', '$this->birthdate', '$password')");
    $statement = $conn->prepare("insert into users(first_name, last_name, user_name, email, birthdate, password) values(:firstname, :lastname, :username, :email, :birthdate, :password)");
    /*
    $statement->bindParam(':firstname', $this->firstname);
    $statement->bindParam(':lastname', $this->lastname);
    $statement->bindParam(':username', $this->username);
    $statement->bindParam(':email', $this->email);
    $statement->bindParam(':birthdate', $this->birthdate);
    $statement->bindParam(':password', $password);
    */
    $statement->bindValue(':firstname', $this->getFirstname());
    $statement->bindValue(':lastname', $this->getLastname());
    $statement->bindValue(':username', $this->getUsername());
    $statement->bindValue(':email', $this->getEmail());
    $statement->bindValue(':birthdate', $this->getBirthdate());
    $statement->bindValue(':password', $password);


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


///////// PROFIEL AANPASSEN FEATURE 3
      public function getUser_id()
      {
        return $this->user_id;
      }

      public function setUser_id($user_id)
      {
        $this->user_id = htmlspecialchars($user_id);
        return $this;
      }


      public function getUserInfo() {
        //DB CONNECTIE
        $conn = Db::getInstance();

        //QUERY WHERE USER = $_SESSION
        $statement = $conn->prepare("SELECT * FROM users WHERE id = :user_id LIMIT 1");
        $statement->bindParam(":user_id", $this->user_id);
        $statement->execute();
        $result = $statement->fetch();
        return $result;
      }


      public function getImageName()
      {
        return $this->ImageName;
      }

      public function setImageName($ImageName)
      {
        $this->ImageName = $ImageName;

        return $this;
      }

      public function getImageSize()
      {
        return $this->ImageSize;
      }

      public function setImageSize($ImageSize)
      {
        $this->ImageSize = $ImageSize;

        return $this;
      }

      public function getImageTmpName()
      {
        return $this->ImageTmpName;
      }

      public function setImageTmpName($ImageTmpName)
      {
        $this->ImageTmpName = $ImageTmpName;

        return $this;
      }

      //sla profielafbeelding op in mapprofiel
      public function SaveProfileImg() {
        $file_name = $_SESSION['user_id'] . "-" . time() . "-" . $this->ImageName;
        $file_size = $this->ImageSize;
        $file_tmp = $this->ImageTmpName;
        $tmp = explode('.', $file_name);
        $file_ext = end($tmp);
        $expensions = array("jpeg", "jpg", "png", "gif");

        if (in_array($file_ext, $expensions) === false) {
                throw new Exception("extension not allowed, please choose a JPEG or PNG or GIF file.");
        }

        if ($file_size > 2097152) {
                throw new Exception('File size must be excately 2 MB');
        }

        if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "data/profile/" . $file_name);
                return "data/profile/" . $file_name;
        } else {
                echo "Error";
        }
}

        //check if email exists --> for update
        public function emailExists($email)
        {
        $conn = Db::getInstance();
        $statement = $conn->prepare("select * from users where email = :email");
        $statement->bindParam(":email", $email);
        $statement->execute();
        $count = $statement->rowCount();
        if ($count > 0) {
        return true;
        }
        else {
        return false;
        }
        }





    }

?>
