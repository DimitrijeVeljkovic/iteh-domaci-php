<?php

    class Model{
        private $server = "localhost";
        private $username = "root";
        private $password;
        private $db = "laptops";
        private $conn;

        public function __construct(){
            try {
                $this->conn = new PDO("mysql:host=$this->server;dbname=$this->db", $this->username, $this->password);
            } catch (Exception $e) {
                echo "Connection failed" . e.getMessage();
            }
        }

        public function insertModel(){
            if (isset($_POST['submit_model'])) {
                if (isset($_POST['laptop_model'])) {
                    if (!empty($_POST['laptop_model'])) {
                        $laptop_model = $_POST['laptop_model'];
                        $query = "INSERT INTO laptop_models (model) VALUES ('$laptop_model')";
                        if ($sql = $this->conn->exec($query)) {
                            echo "<p style='color: #228b22;'> Laptop model added successfully! </p>";
                        }
                        else {
                            echo "<p style='color: #b22222;'> Failed to add laptop model! </p>";
                        }
                    } else {
                        echo "<p style='color: #b22222;'> Empty field(s)! </p>";
                    }
                }
            }
        }

        public function insertLaptop(){
            if (isset($_POST['submit_laptop'])) {
                if (isset($_POST['brand']) && isset($_POST['price']) && isset($_POST['selected_model'])) {
                    if (!empty($_POST['brand']) && !empty($_POST['price']) && !empty($_POST['selected_model'])) {
                        $brand = $_POST['brand'];
                        $price = $_POST['price'];
                        $selected_model = $_POST['selected_model'];
                        $query = "INSERT INTO laptops (brand, price, model_id) VALUES ('$brand', '$price', '$selected_model')";
                        if ($sql = $this->conn->exec($query)) {
                            echo "<p style='color: #228b22;'> Laptop added successfully! </p>";
                        }
                        else {
                            echo "<p style='color: #b22222;'> Failed to add laptop! </p>";
                        }
                    } else {
                        echo "<p style='color: #b22222;'> Empty field(s)! </p>";
                    }
                }
            }
        }

        public function fetch() {
            $data = null;
            $stmt = $this->conn->prepare("SELECT laptops.id, laptops.brand, laptops.price, laptop_models.model FROM laptops JOIN laptop_models on laptops.model_id = laptop_models.id");
            $stmt->execute();
            $data = $stmt->fetchAll();
            return $data;
        }

        public function fetchModels() {
            $data = null;
            $stmt = $this->conn->prepare("SELECT * FROM laptop_models");
            $stmt->execute();
            $data = $stmt->fetchAll();
            return $data;
        }

    }

?>