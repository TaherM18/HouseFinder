<?php
require_once("../../Database/Connect.php");


try {
    $fetchAllHouses = 
    "SELECT houses.*, city_name, state_name, country_name, 
        category_name, level_name
    FROM houses
    INNER JOIN cities ON houses.city_id = cities.id
    INNER JOIN states ON cities.state_id = states.id
    INNER JOIN countries ON states.country_id = countries.id
    INNER JOIN house_category ON houses.category_id = house_category.category_id
    INNER JOIN furnishing_level ON houses.level_id = furnishing_level.level_id";

    $rs = $conn->query($fetchAllHouses);
    if ($rs->num_rows > 0) {
        // Houses found
        $data = [];
        while ($row = $rs->fetch_assoc()) {
            array_push($data, $row);
        }

        $response = [
            "status" => 200,
            "message" => "Houses Fetch Success",
            "data" => $data
        ];

        echo json_encode($response);
    } else {
        // No House not found
        $response = [
            "status" => 404,
            "message" => "No House Found"
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
