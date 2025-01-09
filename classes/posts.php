<?php
class Posts {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($id_user, $title, $content, $description, $id_theme) {
        // Validate required fields
        if (empty($id_user) || empty($title) || empty($content) || empty($description) || empty($id_theme)) {
            return false;
        }
    
        $query = "INSERT INTO post (id_user, title, content, id_theme, status, description) 
                VALUES (:id_user, :title, :content, :id_theme, 'waiting', :description)";
        
        try {
            $stmt = $this->pdo->prepare($query);
            
            $stmt->bindParam(":id_user", $id_user);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":content", $content);
            $stmt->bindParam(":id_theme", $id_theme);
            $stmt->bindParam(":description", $description);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Error creating post: " . $e->getMessage());
            return false;
        }
    }

    public function getAllPosts() {
        try {
            $query = "SELECT * FROM post";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Error reading reservations: " . $e->getMessage();
            return false;
        }
    }


    public function getPostsByTheme($Theme) {
        try {
            $query = "SELECT * FROM post where id_theme = :id_theme";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error reading reservations: " . $e->getMessage();
            return false;
        }
    }

    public function delete($id) {
        // Basic validation
        if (empty($id)) {
            return false;
        }

        try {
            $query = "DELETE FROM post WHERE id_post = :id_post";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":id_post", $id);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error deleting post: " . $e->getMessage();
            return false;
        }
    }

    public function accept($id) {
        if (empty($id)) {
            return false;
        }

        try {
            $query = "UPDATE post SET status = 'accepted' WHERE id_post= :id_post";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":id_post", $id);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error accepting post: " . $e->getMessage();
            return false;
        }
    }

    public function ReadMore($id) {
        try {
            $query = "SELECT * FROM post where id_post = :id_post";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":id_post", $id);

            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Error reading reservations: " . $e->getMessage();
            return false;
        }
    }

    public function ReadByTheme($id_theme) {
        try {
            $query = "SELECT * FROM post where id_theme = :id_theme";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":id_theme", $id_theme);

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Error reading reservations: " . $e->getMessage();
            return false;
        }
    }



  

}
