<?php
// index.php
include 'car_data.php';

$bookingStatus = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['car_id'])) {
    $carId = $_POST['car_id'];
    $car = getCarById($carId);
    if ($car && $car['status'] === 'available') {
        // Update the car's status to 'booked'
        foreach ($cars as &$carItem) {
            if ($carItem['id'] == $carId) {
                $carItem['status'] = 'booked';
                $bookingStatus = 'Car booked successfully!';
                break;
            }
        }
    } else {
        $bookingStatus = 'Car is already booked or not found!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Car Rental System</h1>
    <p><?php echo $bookingStatus; ?></p>
    <table>
        <thead>
            <tr>
                <th>Car Name</th>
                <th>Price per Day</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cars as $car): ?>
            <tr>
                <td><?php echo $car['name']; ?></td>
                <td><?php echo '$' . $car['price']; ?></td>
                <td><?php echo $car['status']; ?></td>
                <td>
                    <?php if ($car['status'] === 'available'): ?>
                    <form method="POST">
                        <input type="hidden" name="car_id" value="<?php echo $car['id']; ?>">
                        <button type="submit">Book Now</button>
                    </form>
                    <?php else: ?>
                    <button disabled>Booked</button>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>