<?php

class User extends DB {

    public function getInfo() {
        try {
            $sql = "SELECT * FROM data";
            $stmt = $this->pdo->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo "Error fetching data: " . $e->getMessage();
            return null;
        }
    }

    public function getInfoById($id) {
        try {
            $sql = "SELECT * FROM data WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo "Error fetching data: " . $e->getMessage();
            return null;
        }
    }

    public function addInfo($name, $age) {
        try {
            $sql = "INSERT INTO data (name, rows) VALUES (:name, :rows)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':rows', $rows, PDO::PARAM_INT);
            $stmt->execute();
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            echo "Error adding data: " . $e->getMessage();
            return false;
        }
    }

    public function editInfo($id, $name, $rows) {
        try {
            $sql = "UPDATE data SET name = :name, rows = :rows WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':rows', $rows, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            // Check if any rows were affected
            if ($stmt->rowCount() > 0) {
                return true; // User updated successfully
            } else {
                return false; // User not found
            }
        } catch (PDOException $e) {
            echo "Error editing data: " . $e->getMessage();
            return false;
        }
    }

    public function deleteInfo($id) {
        try {
            $sql = "DELETE FROM data WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if($stmt->rowCount() > 0) {
                return true; //User deleted succesfully
            } else {
                return false; //User not found
            }
        } catch (PDOException $e) {
            echo "Error deleting data: " . $e->getMessage();
            return false;
        }
    }
}
?>