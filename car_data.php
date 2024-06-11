<?php
// car_data.php

$cars = [
    ['id' => 1, 'name' => 'Toyota Corolla', 'price' => 40, 'status' => 'available'],
    ['id' => 2, 'name' => 'Honda Civic', 'price' => 50, 'status' => 'booked'],
    ['id' => 3, 'name' => 'Ford Mustang', 'price' => 70, 'status' => 'available'],
    ['id' => 4, 'name' => 'Chevrolet Impala', 'price' => 60, 'status' => 'available']
];

function getCarById($id) {
    global $cars;
    foreach ($cars as $car) {
        if ($car['id'] == $id) {
            return $car;
        }
    }
    return null;
}