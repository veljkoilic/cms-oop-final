<?php
 
namespace App\Controllers;
use \App\Core\App;

class Authenticate {
    public function signup()
    {
        return view('signup');
    }

    public function createuser(){
        $credentials = $_POST;
        $credentials['password'] = $this->hash($credentials);
        App::get('database')->addNew("trainers", $credentials);
        return redirect('/admin/login');
    }
    private function hash($credentials){
        $password = $credentials['password'];
        $password = crypt($password, '$1$rasmusle$') . "\n";
        return $password;
        
    }

    public function login()
    {

        return view('login');
    }
    public function validate(){
        $credentials = $_POST;
        $email = $credentials['email'];
        $user = App::get('database')->getOneUser("trainers", $email);
        if(!$user){
            return redirect("/admin/login");
        }

        $password = $this->hash($credentials);

        if($password === $user->password) {
            $_SESSION['auth'] = $user;
            return redirect('/admin/clubs');
            
        }else{
            return redirect('/admin/login');
        }


    }
    public function logout()
    {
        unset($_SESSION["auth"]);
        return redirect('/admin/login');
    }

}