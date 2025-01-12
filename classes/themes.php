<?php
class Themes {  // Class names should be capitalized by convention
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function read() {
        try {
            $qry = "SELECT * FROM theme";
            $stmt = $this->pdo->prepare($qry);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle or log error
            return false;
        }
    }

    public function create($theme, $description) {
        try {
            $qry = "INSERT INTO theme (theme, description) 
                    VALUES (:theme, :description)";
            $stmt = $this->pdo->prepare($qry);
            $stmt->bindParam(":theme", $theme);
            $stmt->bindParam(":description", $description);
            
            $stmt->execute();

        } catch (PDOException $e) {
            return false;
        }
    }

    public function update($id, $theme, $description) {
        try {
            $qry = "UPDATE theme 
                    SET theme = :theme, 
                        description = :description 
                    WHERE id_theme = :id";
                    
            $stmt = $this->pdo->prepare($qry);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":theme", $theme);
            $stmt->bindParam(":description", $description);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($id) {
        try {
            $qry = "DELETE FROM theme WHERE id_theme = :id";
            $stmt = $this->pdo->prepare($qry);
            $stmt->bindParam(":id", $id);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
}