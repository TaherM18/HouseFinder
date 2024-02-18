<?php
require_once("../../Database/Connect.php");

if ( isset($_POST["numHouseId"]) ) {
    $houseId = $_POST["numHouseId"];
    try {
        $fetchHouse = "SELECT house.*, first_name, last_name, contact, city_name, state_name, country_name, 
                category_name, level_name
            FROM house
            INNER JOIN user ON house.landlord_id = user.user_id
            INNER JOIN city_master ON house.city_id = city_master.city_id
            INNER JOIN state_master ON city_master.state_id = state_master.state_id
            INNER JOIN country_master ON city_master.country_id = country_master.country_id
            INNER JOIN house_category ON house.category_id = house_category.category_id
            INNER JOIN furnishing_level ON house.level_id = furnishing_level.level_id
            WHERE house.house_id = ?";
        $stmt = $conn->prepare($fetchHouse);
        $stmt->bind_param("i", $houseId);
        if ( $stmt->execute() ) {
            $rs = $stmt->get_result();
            if ( $rs->num_rows == 1 ) {
                // House found
                $row = $rs->fetch_assoc();

                $response = [
                    "status" => 200,
                    "message" => "House Fetch Success",
                    "data" => $row
                ];

                echo json_encode($response);
            }
            else {
                // House not found
                $response = [
                    "status" => 404,
                    "message" => "House Not Found"
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