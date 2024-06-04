<?php
class validate
{

  // concatenate two strings in PHP : Use . (dot)
  // $msg .= "<p>$key field empty</p>" == $msg = msg."<p>$key field empty</p>"
  public function checkEmpty($data)
  {
    $msg = null;
    foreach ($data as $key => $value) {
      if (empty($value)) {
        $msg .= "<p>$key field empty</p>";
      }
    }
    return $msg;
  }
  // check our age field
  public function validAge($age)
  {
    // check to see if the age is between 1 to 100
    if($age > 0 && $age <= 100){
      return true;
    }
    // Use this if my input type is "text"
    // if (preg_match("/^[0-9]+$/", $age)) {
    //   return true;
    // }
    return false;
  }
  // check to see if our email follows the email format
  public function validEmail($email)
  {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return true;
    }
    return false;
  }

  public function validContact($contact){
    $length = strlen($contact);
    if($length > 0 && $length <= 10){
      return true;
    }
    return false;
  }

}
?>