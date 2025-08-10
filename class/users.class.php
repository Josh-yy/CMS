<?php 
session_start();
require_once 'db.class.php';
require '../helpers/signup.helper.php';

class Users extends myDB {
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $userRole;

    public function __construct() {
        parent::__construct();
    }

    public function signupUser($data) {
        if ($_POST['password'] !== $_POST['confirm_password']) {
          $_SESSION["signup_error"] = "Passwords do not match, please try again!";
          header("Location: /signup");
        } else{
          $userRole = "RegisteredUser";
          $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
          $data = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'email' => $_POST['email'],
            'password' => $hashed_password,
            'user_role' => $userRole
          ];
          $this->insert('tbl_users', $data);
          $_SESSION['signup_success'] = 'Congratulation, you are all set!';
        }
      }

      public function loginUser($email) {
        $this->select('tbl_users', '*' , $email);
        if ($this->res->num_rows > 0) {
            $row = $this->res->fetch_assoc();
            if (password_verify($_POST['password'], $row['password']) && $row["user_role"] == "admin") {
                $_SESSION['loggedIn'] = $row['email'];
                $_SESSION['admin'] = 'admin';
                $_SESSION['user_id'] = $row['id'];
                header("Location: ../admin");
                exit;
              } else if(password_verify($_POST['password'], $row['password']) && $row["user_role"] == "RegisteredUser"){
                $_SESSION['loggedIn'] = $row['email'];
                $_SESSION['user_id'] = $row['id'];
                header("Location: /");
                exit;
              } else {
                $_SESSION["login_error"] = "Invalid credentials, please try again!";
                
                header("Location: /login");
            }
        } else {
          $_SESSION["login_error"] = "Invalid credentials, please try again!";
          
          header("Location: /login");
        }

        $this->conn->close();
    }

    // // Method to fetch user details by ID
    // public function getUserById($id) {
    //     try {
    //         $sql = "SELECT * FROM users WHERE id = ?";
    //         $stmt = $this->prepare($sql);  // Prepare SQL query
    //         $stmt->bind_param("i", $id);  // "i" means integer type
    //         $stmt->execute();
    //         $result = $stmt->get_result();

    //         return $result->fetch_assoc();  // Return the user's details

    //     } catch (Exception $e) {
    //         return $e->getMessage();  // Return error message
    //     }
    // }

    // // Method to check if a user is logged in (helper method)
    // public static function isUserLoggedIn() {
    //     session_start();
    //     return isset($_SESSION['user_id']);  // Check if user session exists
    // }
}
