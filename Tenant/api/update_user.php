<?php
require_once("../../Database/Connect.php");

// var_dump($_PUT);

if (isset($_POST["userId"]) && $_POST["field"] && $_POST["value"]) {
    $userId = $_POST["userId"];
    $field = $_POST["field"];
    $value = $_POST["value"];
    try {
        if ($field == "full_name") {
            $names = explode(" ", $value);
            $updateUser = "UPDATE users set first_name = ?, last_name = ? WHERE user_id = ?";
            $stmt = $conn->prepare($updateUser);
            $stmt->bind_param("ssi", $names[0], $names[1], $userId);
        }
        else if ($field == "email") {
            $updateUser = "UPDATE users set email = ? WHERE user_id = ?";
            $stmt = $conn->prepare($updateUser);
            $stmt->bind_param("si", $value, $userId);
        }
        else if ($field == "contact") {
            $updateUser = "UPDATE users set contact = ? WHERE user_id = ?";
            $stmt = $conn->prepare($updateUser);
            $stmt->bind_param("si", $value, $userId);
        }
        else if ($field == "address") {
            $updateUser = "UPDATE users set address = ? WHERE user_id = ?";
            $stmt = $conn->prepare($updateUser);
            $stmt->bind_param("si", $value, $userId);
        }
        else {
            $updateUser = "UPDATE users set ? = ? WHERE user_id = ?";
            $stmt = $conn->prepare($updateUser);
            $stmt->bind_param("si", $field, $value, $userId);
        }
        
        if ($stmt->execute()) {

            $response = [
                "status" => 200,
                "message" => "User Update Success"
            ];

            echo json_encode($response);
        } else {
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
} else {
    $response = [
        "status" => 400,
        "message" => "Bad Request"
    ];

    echo json_encode($response);
}
