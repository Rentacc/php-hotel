<?php
$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];

// Filtri
$filteredHotels = $hotels;

if (isset($_GET['parking']) && $_GET['parking'] !== 'all') {
    $filteredHotels = array_filter($filteredHotels, function ($hotel) {
        return $hotel['parking'] === ($_GET['parking'] === 'yes');
    });
}

if (isset($_GET['vote'])) {
    $filteredHotels = array_filter($filteredHotels, function ($hotel) {
        return $hotel['vote'] >= $_GET['vote'];
    });
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
            color: #333;
        }

        .table {
            background-color: #fff;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PHP Hotel</h1>

        <form action="" method="get" class="mb-4">
            <div class="row align-items-end">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="parking">Parking</label>
                        <select name="parking" id="parking" class="form-control">
                            <option value="all">All</option>
                            <option value="yes" <?php if (isset($_GET['parking']) && $_GET['parking'] === 'yes') echo 'selected'; ?>>Yes</option>
                            <option value="no" <?php if (isset($_GET['parking']) && $_GET['parking'] === 'no') echo 'selected'; ?>>No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="vote">Vote</label>
                        <select name="vote" id="vote" class="form-control">
                            <option value="">All</option>
                            <option value="1" <?php if (isset($_GET['vote']) && $_GET['vote'] === '1') echo 'selected'; ?>>1 or above</option>
                            <option value="2" <?php if (isset($_GET['vote']) && $_GET['vote'] === '2') echo 'selected'; ?>>2 or above</option>
                            <option value="3" <?php if (isset($_GET['vote']) && $_GET['vote'] === '3') echo 'selected'; ?>>3 or above</option>
                            <option value="4" <?php if (isset($_GET['vote']) && $_GET['vote'] === '4') echo 'selected'; ?>>4 or above</option>
                            <option value="5" <?php if (isset($_GET['vote']) && $_GET['vote'] === '5') echo 'selected'; ?>>5</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Apply Filters</button>
                    </div>
                </div>
            </div>
        </form>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Parking</th>
                    <th>Vote</th>
                    <th>Distance to Center</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filteredHotels as $hotel) : ?>
                    <tr>
                        <td><?php echo $hotel['name']; ?></td>
                        <td><?php echo $hotel['description']; ?></td>
                        <td><?php echo $hotel['parking'] ? 'Yes' : 'No'; ?></td>
                        <td><?php echo $hotel['vote']; ?></td>
                        <td><?php echo $hotel['distance_to_center']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
