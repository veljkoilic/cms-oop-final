<?php
 
namespace App\Controllers;
use \App\Core\App;

class Authenticate {
    public function signup()
    {
        return view('signup');
    }

    /**
     * Creates takes given POST data , validates it , hashes the
     * password and adds the user to the database
     */
    public function createuser(){
        $credentials = $_POST;
        $credentials['password'] = $this->hash($credentials);
        $credentials['email'] = filter_var($credentials['email'], FILTER_SANITIZE_EMAIL);
        App::get('database')->addNew("trainers", $credentials);
        return redirect('/admin/login');
    }

    /**
     * @param $credentials
     * @return mixed|string
     * Encrypts the validated password when creating the user and logging in
     */
    private function hash($credentials){
        $password = $credentials['password'];
        $password = crypt($password, '$1$rasmusle$') . "\n";
        $password = filter_var($password, FILTER_SANITIZE_STRING);
        return $password;
        
    }

    public function login()
    {
        return view('login');
    }

    /**
     * Validates the user input for logging in and checks if a user with the said email exists
     * and if the password is corresponding, if true creates the $_SESSION['auth'] where logged in
     * users information is stored
     */
    public function validate(){
        $credentials = $_POST;
        $email = $credentials['email'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
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

    /**
     * logs out the user deleting the previously set $_SESSION['auth']
     */
    public function logout()
    {
        unset($_SESSION["auth"]);
        return redirect('/admin/login');
    }

}