<?php
class Reservation {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function delete($id) {
        

        $query = "DELETE FROM avis WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id", $id);
        
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
        
            echo "Error: " . $e->getMessage();
            return false;
        }
    }


    
    

    public function read(){
        $qry="select * from avis";
        $stmt = $this->pdo->prepare($qry);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        
    }
}