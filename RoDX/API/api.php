<?php
header("Content-Type: application/json");

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "test";
// Creare conexiune
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificare conexiune
if ($conn->connect_error) {
    die(json_encode(array("error" => "Connection failed: " . $conn->connect_error)));
}

// Listează toate tabelele
$tables = [
    "2020_diseases",
    "2020_medical_emergencies_administrare",
    "2020_medical_emergencies_age",
    "2020_medical_emergencies_diagnostic",
    "2020_medical_emergencies_gender",
    "2020_treatment_admission_age",
    "2020_treatment_admission_gen",
    "2020_treatment_admission_locuinta",
    "2020_treatment_admission_occupation",
    "2020_treatment_admission_regime",
    "2020_treatment_admission_studii",
    "2020_treatment_admission_sursa"
    
];

$data = [];

foreach ($tables as $table) {
    $sql = "SELECT * FROM $table";
    $result = $conn->query($sql);

    if ($result) {
        $table_data = [];
        while ($row = $result->fetch_assoc()) {
            $table_data[] = $row;
        }
        $data[$table] = $table_data;
    } else {
        $data[$table] = "Error: " . $conn->error;
    }
}

echo json_encode($data);

$conn->close();
?>
