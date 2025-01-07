<?php
class Authentification {
    private $pdo;


    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login($email, $password) {
        
            try {
                $qry = "SELECT id_user, name, password FROM users WHERE email = :email";
                $stmt = $this->pdo->prepare($qry);
                $stmt->bindParam(":email", $email);
                $stmt->execute();

                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user && password_verify($password, $user["password"])) {
                    session_start();
                    $id_user=$user["id_user"];
                    $_SESSION["user_id"] = $user["id_user"];
                    $_SESSION["user_name"] = $user["name"];
                    $_SESSION["user_email"] = $email;
                    $qry = "SELECT * FROM role WHERE id_user = :id_user";
                    $stmt2=$this->pdo->prepare($qry);
                    $stmt2->bindParam(":id_user", $id_user);
                    $stmt2->execute();
                    $role= $stmt->fetch(PDO::FETCH_ASSOC);

                    $_SESSION["role"]=$role["role"];
                    header('Location: ../clienVue/home.php');

                    exit;
                } else {
                    echo "Invalid email or password. Please try again.";
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    
////////////////////////////////////////////////////////////////////////////
    
    public function sign_up($email, $name, $password) {

                try {
                    // Check if user already exists
                    $qryCheck = "SELECT COUNT(email) FROM users WHERE email = ?";
                    $stmt = $this->pdo->prepare($qryCheck);
                    $stmt->execute([$email]);
                    $result = $stmt->fetchColumn();

                    if ($result == 0) {
                        // Hash password
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                        $role = 1;

                        // Insert user data
                        $qrySign = "INSERT INTO users (name, email, password,role) VALUES (:name, :email, :password,:role)";
                        $statement = $this->pdo->prepare($qrySign);
                        $statement->bindParam(":name", $name);
                        $statement->bindParam(":email", $email);
                        $statement->bindParam(":password", $hashedPassword);
                        $statement->bindParam(":role",$role);
                        $statement->execute();

                        // Insert role for user
                    
                        echo "Registration successful.";
                    } else {
                        echo "This user already exists.";
                    }
                } catch (Exception $e) {
                    echo "Error: " . $e->getMessage();
                }
            
        }
    }

