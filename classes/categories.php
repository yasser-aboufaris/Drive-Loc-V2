<?php
class Categories {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Fetch all categories
    public function read(){
        try {
            $qry = "SELECT * FROM categories";
            $stmt = $this->pdo->prepare($qry);
            $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $th) {
            throw new Exception("Error jay mn hna: " . $th->getMessage());
        }
    }

    // Insert a new category
    public function create( $categorieName) {
        $qry = "INSERT INTO categories (
        categorieName) VALUES ( :categorieName)";
        $stmt = $this->pdo->prepare($qry);

        $stmt->bindParam(":categorieName", $categorieName);
        $stmt->execute();
        echo "Category created successfully.";
    }
}

