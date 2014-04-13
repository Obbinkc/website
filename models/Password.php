
<?php

class PHP_Password_Generator {

    public $password_length;
    public $password;
    private $numbers;
    private $alphabetic_chars;
    private $special_chars;
    private $password_type;

    public function __construct($type) {
        $this->password_type = $type;
        $this->numbers = '0123456789';
        $this->alphabetic_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $this->special_chars = '@#$%&!';
    }

    /*
      Generate Password
     */

    public function generate_password($length = 8) {
        $this->password_length = ($length < 1 ? 8 : $length);
        $this->password = '';
        switch ($this->password_type) {
            case 1: {//Numbers Only
                    $password_characters = $this->numbers;
                }break;
            case 2: {//Alphabetic CHaracters Only
                    $password_characters = $this->alphabetic_chars;
                }break;
            case 3: {//Numbers And Letters Only
                    $password_characters = $this->numbers . $this->alphabetic_chars;
                }break;
            case 4: {//Numbers,Letters, and Special Characters
                    $password_characters = $this->numbers . $this->alphabetic_chars . $this->special_chars;
                }break;
            default: {//Letters
                    $password_characters = $this->alphabetic_chars;
                }break;
        }
        $password_characters = str_split($password_characters);
        shuffle($password_characters);

        for ($i = 0; $i < $this->password_length; $i++) {
            $this->password.=$password_characters[rand(0, count($password_characters) - 1)];
        }
        return $this->password;
    }

    /*
      Add custom special characters to the password
     */

    public function set_special_characters($special_chars) {
        $this->special_chars = $special_chars;
    }

}

//Example 1:
/*$pwd = new PHP_Password_Generator(4); //Generate password with numbers,letters, and special characters
echo $pwd->generate_password(10); //specify password length
//Example 2:
$pwd = new PHP_Password_Generator(4);
$pwd->set_special_characters('@#$%^&*'); //Set custom special characters
echo $pwd->generate_password(10);

//Example 3:
$pwd = new PHP_Password_Generator(1); //Password will contain numbers
echo $pwd->generate_password(10);

//Example 4:
$pwd = new PHP_Password_Generator(4); //Make list of passwords
for ($x = 0; $x < 5; $x++) {
    echo $pwd->generate_password(10) . '<br/>';
}*/
?>