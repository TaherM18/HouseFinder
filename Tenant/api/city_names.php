<?php
require_once("../../Database/Connect.php");


try {
    $fetchCityNames = "SELECT city_name FROM cities";
    $rs = $conn->query($fetchCityNames);

    if ($rs->num_rows > 0) {
        // Cities found
        $data = [];
        while ( $row = $rs->fetch_array() ) {
            $cityName = strtolower($row[0]);
            array_push($data, $cityName);
        }

        $response = [
            "status" => 200,
            "message" => "Cities Fetch Success",
            "data" => $data
        ];

        echo json_encode($response);
    } else {
        // Cities not found
        $response = [
            "status" => 404,
            "message" => "No City Found"
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
