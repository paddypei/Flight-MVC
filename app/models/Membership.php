<?php namespace models;

use models\DB\Users as User;

// Create the Users model 
class Membership {
    
    public $login;
    public $AuthToken;
    
    public function __construct()
    {
        $this->login = $this->checkCurrentLogin();
        $this->AuthToken = rand(1000000, 9999999);
    }
    
    private function checkCurrentLogin()
    {
        if(isset($_SESSION["Membership"]["UserID"]) && isset($_SESSION["Membership"]["AuthToken"])){
            $user = (new User)->find($_SESSION["Membership"]["UserID"]);
            if (!$user) return false;
            else {
                if ($user->auth_token == $_SESSION["Membership"]["AuthToken"]) return true;
            }
        }
        return false;
    }
    
    public function validateLogin($email, $password)
    {
        $user = (new User)->where('email', '=', $email)->first();
        if (!$user) return false;
        else
        {
            if (password_verify($password, $user->password))
            {
                $_SESSION["Membership"]["AuthToken"] = $this->AuthToken;
                $_SESSION["Membership"]["Name"] = $user->name;
                $_SESSION["Membership"]["UserID"] = $user->id;
                $user->auth_token = $this->AuthToken;
                $user->save();
                
                return true;
            }
        }
        return false;
    }
    
    public function validateRegister($name, $email, $password, $passwordCheck)
    {
        if ($password != $passwordCheck)
        {
            $array["pass"] = false;
            $array["error"] = "Passwords do not match!";
            return $array;
        }
        $user = (new User)->where('email', '=', $email)->first();
        if ($user)
        {
            $array["pass"] = false;
            $array["error"] = "This email is already in use!";
            return $array;
        }
        $user = (new User)->where('name', '=', $name)->first();
        if ($user)
        {
            $array["pass"] = false;
            $array["error"] = "This username is already in use!";
            return $array;
        }
        
        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->auth_token = $this->AuthToken;
        $user->save();
        
        $_SESSION["Membership"]["AuthToken"] = $this->AuthToken;
        $_SESSION["Membership"]["Name"] = $user->name;
        $_SESSION["Membership"]["UserID"] = $user->id;
        
        $array["pass"] = true;
        return $array;
    }
    
    public function getProfile($name)
    {
        $array["pass"] = false;
        $user = (new User)->where('name', '=', $name)->first();
        if (!$user) return $array;
        
        $array["pass"] = true;
        $array["data"]["name"] = $user->name;
        $array["data"]["email"] = $user->email;
        return $array;
    }
    
    public function editProfile($name)
    {
        $array["pass"] = false;
        if ($this->checkCurrentLogin() == false) return $array;
        
        $user = (new User)->find($_SESSION["Membership"]["UserID"]);
        if (!$user) return $array;
        else if (strtolower($name) !== strtolower($user->name)) return $array;
        else if (strval($_SESSION["Membership"]["AuthToken"]) == $user->auth_token) return $this->getProfile($name);
            
        return $array;
    }
    
    public function validateProfileEdit($name, $email, $password)
    {
        if (!isset($_SESSION['Membership']['UserID']))
        {
            $array["pass"] = false;
            $array["error"] = "Invalid Session! Please Logout and try again.";
            return $array;
        }
        $user = (new User)->where('email', '=', $email)->where('id', '!=', $_SESSION['Membership']['UserID'])->first();
        if ($user)
        {
            $array["pass"] = false;
            $array["error"] = "This email is already in use by another user!";
            return $array;
        }
        $user = (new User)->where('name', '=', $name)->where('id', '!=', $_SESSION['Membership']['UserID'])->first();
        if ($user)
        {
            $array["pass"] = false;
            $array["error"] = "This username is already in use by another user!";
            return $array;
        }
        
        $user = (new User)->find($_SESSION['Membership']['UserID']);
        if (!password_verify($password, $user->password))
        {
            $array["pass"] = false;
            $array["error"] = "Invalid Password!";
            return $array;
        }
            
        $user->name = $name;
        $user->email = $email;
        $user->auth_token = $this->AuthToken;
        $user->save();
        
        $_SESSION["Membership"]["AuthToken"] = $this->AuthToken;
        $_SESSION["Membership"]["Name"] = $user->name;
        
        $array["pass"] = true;
        return $array;
    }
}
