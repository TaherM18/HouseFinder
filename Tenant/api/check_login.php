<?php
require_once("../../Database/Connect.php");

if (isset($_POST["txtEmail"]) && isset($_POST["txtPass"]) ) {
    $txtEmail = $_POST["txtEmail"];
    $txtPass = $_POST["txtPass"];
    try {
        $fetchUser = "SELECT user_id FROM users WHERE email = ? AND pass = ? LIMIT 1";
        $stmt = $conn->prepare($fetchUser);
        $stmt->bind_param("ss", $txtEmail, $txtPass);
        if ( $stmt->execute() ) {
            $rs = $stmt->get_result();
            if ( $rs->num_rows == 1 ) {
                // User found
                $row = $rs->fetch_array();
                $userId = $row["user_id"];
                $_SESSION["userId"] = $userId;

                if ($_POST["chkRemember"]) {
                    define("emailCookie", "ckEmail");
                    define("passCookie", "ckPass");
                    setcookie(emailCookie, $txtEmail, time() + (86400 * 30)); // 86400 = 1 day
                    setcookie(passCookie, $txtPass, time() + (86400 * 30));
                }

                $response = [
                    "status" => 200,
                    "message" => "User Fetch Success",
                    "data" => $userId
                ];

                echo json_encode($response);
            }
            else {
                // User not found
                $response = [
                    "status" => 404,
                    "message" => "User Not Found"
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