<?php
class themes {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function read() {
    
        $qry = "SELECT * FROM theme";
        $stmt = $this->pdo->prepare($qry);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

    public function create( $theme,$description) {
        $qry = "INSERT INTO themes (
        theme,description) VALUES ( :theme,:description)";
        $stmt = $this->pdo->prepare($qry);

        $stmt->bindParam(":theme", $theme);
        $stmt->bindParam(":description", $description);
        $stmt->execute();
        echo "Category created successfully.";
    }
}

