<?php

class UsersController {
    private $dataModel;

    public function __construct() {
        $this->dataModel = new Info();
    }

    public function getAllInfo() {
        // Send response with status code 200
        http_response_code(200);
        echo json_encode($this->dataModel->getAllInfo());
    }

    public function getInfo($id) {
        // Find user by ID
        $data = $this->dataModel->getdataById($id);
            if ($user) {
                // Send response with status code 200
                http_response_code(200);
                echo json_encode($data);
                return;
            }

        // Send response with status code 404 if user not found
        http_response_code(404);
        echo '404 Not Found';
    }

    public function updateInfo($id) {
         // Get the JSON data from the request body
         $json_data = file_get_contents('php://input');
         $data = json_decode($json_data, true);
     
         // Check if JSON data is valid
         if ($data === null) {
             // Send response with status code 400 for invalid JSON
             http_response_code(400);
             echo json_encode(['error' => 'Invalid JSON data']);
             return;
         }
     
         // Define the required fields
         $required_fields = ['name', 'rows'];
     
         // Check if all required fields are present in the JSON data
         foreach ($required_fields as $field) {
             if (!array_key_exists($field, $data)) {
                 // Send response with status code 400 for missing fields
                 http_response_code(400);
                 echo json_encode(['error' => 'Missing required field: ' . $field]);
                 return;

             }
         }

        $result = $this->dataModel->editInfo($id, $data['name'], $data['rows']);


        //You can be more thorough with error codes for example and include the 204 no content
        if($result) {
            // Send response with status code 200 if user was updated
            http_response_code(200);
            echo json_encode(['message' => 'User updated succesfully']);
        } else {
            // Send response with status code 404 if user not found
            http_response_code(404);
            echo json_encode(['error' => 'User not found']);
        }
        
    }

    public function createInfo() {
        // Get the JSON data from the request body
        $json_data = file_get_contents('php://input');
        $data = json_decode($json_data, true);

    
        // Check if JSON data is valid
        if ($data === null) {
            // Send response with status code 400 for invalid JSON
            http_response_code(400);
            echo json_encode(['error' => 'Invalid JSON data']);
            return;
        }
    
        // Define the required fields
        $required_fields = ['name', 'rows'];
    
        // Check if all required fields are present in the JSON data
        foreach ($required_fields as $field) {
            if (!array_key_exists($field, $data)) {
                // Send response with status code 400 for missing fields
                http_response_code(400);
                echo json_encode(['error' => 'Missing required field: ' . $field]);
                return;
            }
        }
    
        $newUserId = $this->dataModel->addUser($data['name'],$data['rows']);
    
        // Send response with status code 201 and location header
        http_response_code(201);
        header('Location: http://' .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $newUserId);
        echo json_encode(['message' => 'User created successfully']);
    }

    public function deleteInfo($id) {
        $success = $this->dataModel->deleteInfo($id);

        if ($success) {
            // Remove the user from the users array

            // Send response with status code 200
            http_response_code(200);
            echo json_encode(['message' => 'User deleted successfully']);
        } else {
            // Send response with status code 404 if user not found
            http_response_code(404);
            echo json_encode(['error' => 'User not found']);
        }
    }
}

?>