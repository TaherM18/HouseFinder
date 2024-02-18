<?php
require_once("../../Database/Connect.php");

if ( isset($_POST["userId"]) ) {
    $userId = $_POST["userId"];
    try {
        $fetchUserData = "SELECT users.*, city_name
            FROM users
            INNER JOIN cities ON users.city_id = cities.id
            WHERE user_id = ?";
        $stmt = $conn->prepare($fetchUserData);
        $stmt->bind_param("i", $userId);
        if ( $stmt->execute() ) {
            $rs = $stmt->get_result();
            if ( $rs->num_rows == 1 ) {
                // User Data found
                $row = $rs->fetch_assoc();

                $response = [
                    "status" => 200,
                    "message" => "User Data Fetch Success",
                    "data" => $row
                ];

                echo json_encode($response);
            }
            else {
                // User Data Not Found
                $response = [
                    "status" => 404,
                    "message" => "User Data Not Found"
                ];

                echo json_encode($response);
            }
        }
        else {
            // Failed to execute query
            $response = [
                "status" => 500,
                "message" => "Failed to Execute Query"
            ];

            echo json_encode($response);
        }
    } catch (Exception $e) {
        $response = [
            "status" => 500,
            "message" => $e->getMessage()
        ];

        echo json_encode($response);
    }
}
else {
    $response = [
        "status" => 400,
        "message" => "Bad Request"
    ];
    
    echo json_encode($response);
}