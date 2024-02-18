<?php
require_once("../../Database/Connect.php");

if (
    isset($_POST["txtFname"]) && isset($_POST["txtLname"]) && isset($_POST["txtContact"])
    && isset($_POST["selCity"]) && isset($_POST["txtAddress"]) && isset($_POST["selUser"])
    && isset($_POST["txtEmail"]) && isset($_POST["txtPass"])
) {
    $txtFname = $_POST["txtFname"];
    $txtLname = $_POST["txtLname"];
    $txtContact = $_POST["txtContact"];
    $selCity = $_POST["selCity"];
    $txtAddr = $_POST["txtAddress"];
    $selUser = $_POST["selUser"];
    $txtEmail = $_POST["txtEmail"];
    $txtPass = $_POST["txtPass"];

    try {

        $fetchUser = "SELECT user_id FROM users WHERE email = ? AND user_type = ?";
        $stmt = $conn->prepare($fetchUser);
        $stmt->bind_param("ss", $txtEmail, $selUser);

        if ($stmt->execute()) {
            $rs = $stmt->get_result();
            if ($rs->num_rows > 0) {
                // Registered user found with given email and user_type
                // 406 = Not Acceptable
                $response = [
                    "status" => 406,
                    "message" => "Email already registered"
                ];

                echo json_encode($response);
            } else {
                // No registered user found, so insert new user
                $insertUser = "INSERT INTO users (first_name, last_name, user_type, contact, email, pass, city_id, address) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($insertUser);
                $stmt->bind_param("ssssssis", $txtFname, $txtLname, $selUser, $txtContact, $txtEmail, $txtPass, $selCity, $txtAddr);

                if ($stmt->execute()) {
                    // 201 = Created
                    // The request succeeded, and a new resource was created as a result.
                    $response = [
                        "status" => 201,
                        "message" => "User Created"
                    ];

                    echo json_encode($response);
                } else {
                    // Failed to execute query
                    $response = [
                        "status" => 500,
                        "message" => "Failed to Execute Insert Query"
                    ];

                    echo json_encode($response);
                }
            }
        } else {
            // Failed to execute query
            $response = [
                "status" => 500,
                "message" => "Failed to Execute Fetch Query"
            ];

            echo json_encode($response);
        }
    } catch (Exception $e) {
        // 500 = Internal Server Error
        // The server has encountered a situation it does not know how to handle.
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
