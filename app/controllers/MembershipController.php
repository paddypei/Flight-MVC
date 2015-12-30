<?php namespace controllers;

use Flight; 
use models\Membership as Membership;

class MembershipController extends BasicController {

    public static function login()
    {
        if((new Membership)->login == true) return Flight::redirect('index');
        return parent::blade('membership.login');
    }
    
    public static function logout()
    {
        session_destroy();
        return Flight::redirect('index');
    }
    
    public function loginAttempt()
    {
        $email = isset($_POST["email"]) ? $_POST["email"] : null;
        $password = isset($_POST["password"]) ? $_POST["password"] : null;
        if ($email == null || $password == null) return $this->invalid('membership.login', [
                'error'=>'Invalid Post Data!', 
                'email'=>$email
            ]);
        
        $validate = (new Membership)->validateLogin($email, $password);
        if ($validate == true) return Flight::redirect('index');
        else return $this->invalid('membership.login', [
                'error'=>'Login Attempt Failed!', 
                'email'=>$email
            ]);
    }
    
    public function register()
    {
        if((new Membership)->login == true) return Flight::redirect('index');
        return parent::blade('membership.register');
    }
    
    public function registerAttempt()
    {
        $name = isset($_POST["name"]) ? $_POST["name"] : null;
        $email = isset($_POST["email"]) ? $_POST["email"] : null;
        $password = isset($_POST["password"]) ? $_POST["password"] : null;
        $passwordCheck = isset($_POST["passwordCheck"]) ? $_POST["passwordCheck"] : null;
        if ($name == null || $email == null || $password == null || $passwordCheck == null) return $this->invalid('membership.register', [
                'error'=>'Invalid Post Data', 
                'name'=>$name,
                'email'=>$email
            ]);
        
        $validate = (new Membership)->validateRegister($name, $email, $password, $passwordCheck);
        if ($validate["pass"] == true) return Flight::redirect('index');
        else return $this->invalid('membership.register', [
                'error'=>$validate["error"], 
                'name'=>$name,
                'email'=>$email
            ]);
    }
    
    public function profile($name)
    {
        $validate = (new Membership)->getProfile($name);
        if ($validate["pass"] == false) return Flight::redirect('index');
        else return parent::blade('membership.profile', [
                'name'=>$validate["data"]["name"],
                'email'=>$validate["data"]["email"]
            ]);
    }
    
    public function profileEdit($name)
    {
        $validate = (new Membership)->editProfile($name);
        if ($validate["pass"] == false) return Flight::redirect('index');
        else return parent::blade('membership.profile-edit', [
                'name'=>$validate["data"]["name"],
                'email'=>$validate["data"]["email"]
            ]);
    }
    
    public function profileEditAttempt($name)
    {
        $validate = (new Membership)->editProfile($name);
        if ($validate["pass"] == false) return Flight::redirect('index');
        
        $name = isset($_POST["name"]) ? $_POST["name"] : null;
        $email = isset($_POST["email"]) ? $_POST["email"] : null;
        $password = isset($_POST["password"]) ? $_POST["password"] : null;
        if ($name == null || $email == null || $password == null) return $this->invalid('membership.profile-edit', [
                'error'=>'Invalid Post Data', 
                'name'=>$name,
                'email'=>$email
            ]);
        
        $validate = (new Membership)->validateProfileEdit($name, $email, $password);
        if ($validate["pass"] == true) return Flight::redirect('index');
        else return $this->invalid('membership.profile-edit', [
                'error'=>$validate["error"], 
                'name'=>$name,
                'email'=>$email
            ]);
    }
    
    private function invalid($tempalte, $data = null)
    {
        return parent::blade($tempalte, $data);
    }
}
