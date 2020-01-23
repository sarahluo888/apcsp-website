<!DOCTYPE html>
<html>
  <head>
    <title>Caesar Cipher</title>
<link rel="stylesheet" href="style.css" type="text/css">
  </head>


  <body>

    <h1>Caesar Cipher Encryption</h1>
    <p>Let's encrypt!</p>
<p>The purpose of the program is to encrypt or decrypt a user’s inputted message using Caesar Cipher encryption. Caesar cipher is a type of substitution cipher and encryption tools like this one is useful for protecting messages, hence encrypting them. Each letter in the plaintext is replaced by a letter some fixed number of positions down the alphabet. This program is a convenient encryption tool.</p>

    <?php
       // define variables and set to empty values
       $arg1 = $arg2 = $arg3 = $output = $retc = "";

       if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $arg1 = test_input($_POST["arg1"]);
         $arg2 = test_input($_POST["arg2"]);
         $arg3 = test_input($_POST["arg3"]);
         exec("/usr/lib/cgi-bin/sp1a/caesar " . $arg1 . " " . $arg2 . " " . $arg3, $output, $retc); 
       }

       function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
       }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      String: <input type="text" name="arg1"><br>
      Shift: <input type="text" name="arg2"><br>
      Choose:
      <input type="radio" name="arg3" value="encrypt">Encrypt
      <input type="radio" name="arg3" value="decrypt">Decrypt
      <br><br>
      <input type="submit" value="Go!">
    </form>

    <?php
       // only display if return code is numeric - i.e. exec has been called
       if (is_numeric($retc)) {
      
         echo "<h2>Program Output:</h2>";
         foreach ($output as $line) {
           echo $line;
           echo "<br>";
         }

       }
    ?>
    
  </body>
</html>
