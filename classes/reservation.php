<?php
class Reservation {
    // Database connection
    private $pdo;

    // Constructor to initialize database connection
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Create a new reservation
    public function reserve($id_car, $id_client, $start_day, $end_day) {
        // Basic input validation
        if (empty($id_car) || empty($id_client) || empty($start_day) || empty($end_day)) {
            return false;
        }

        // SQL query to insert new reservation
        $query = "INSERT INTO reservation (id_car, id_client, start_day, end_day, status) 
        VALUES (:id_car, :id_client, :start_day, :end_day, 'waiting')";
        
        try {
            $stmt = $this->pdo->prepare($query);
            
            // Bind all parameters
            $stmt->bindParam(":id_car", $id_car);
            $stmt->bindParam(":id_client", $id_client);
            $stmt->bindParam(":start_day", $start_day);
            $stmt->bindParam(":end_day", $end_day);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            // Simple error handling
            echo "Error creating reservation: " . $e->getMessage();
            return false;
        }
    }

    // Get all reservations
    public function getAllReservations() {
        try {
            $query = "SELECT * FROM reservation";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            
            // Return all reservations as an array
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error reading reservations: " . $e->getMessage();
            return false;
        }
    }

    // Delete a reservation
    public function delete($id) {
        // Basic validation
        if (empty($id)) {
            return false;
        }

        try {
            $query = "DELETE FROM reservation WHERE id_reservation = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":id", $id);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error deleting reservation: " . $e->getMessage();
            return false;
        }
    }

    // Accept a reservation
    public function accept($id) {
        // Basic validation
        if (empty($id)) {
            return false;
        }

        try {
            $query = "UPDATE reservation SET status = 'accepted' WHERE id_reservation = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(":id", $id);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error accepting reservation: " . $e->getMessage();
            return false;
        }
    }

    // Get a single reservation by ID
}
