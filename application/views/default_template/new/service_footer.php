<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Counter Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        .counter {
            background-color: #333;
            padding: 50px 0;
        }
        .text-white {
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container-fluid counter py-5">
    <div class="container py-5">
        <div class="row g-5">
            <?php
            // Array of counter data
            $counters = [
                [
                    'icon' => 'fas fa-thumbs-up',
                    'count' => 829,
                    'label' => 'Happy Clients',
                    'delay' => '0.1s'
                ],
                [
                    'icon' => 'fas fa-car-alt',
                    'count' => 56,
                    'label' => 'Number of Cars',
                    'delay' => '0.3s'
                ],
                [
                    'icon' => 'fas fa-building',
                    'count' => 127,
                    'label' => 'Car Center',
                    'delay' => '0.5s'
                ],
                [
                    'icon' => 'fas fa-clock',
                    'count' => 589,
                    'label' => 'Total Kilometers',
                    'delay' => '0.7s'
                ]
            ];

            // Render counters
            foreach ($counters as $counter): ?>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="<?= htmlspecialchars($counter['delay']) ?>" style="visibility: visible; animation-delay: <?= htmlspecialchars($counter['delay']) ?>; animation-name: fadeInUp;">
                    <div class="counter-item text-center">
                        <div class="counter-item-icon mx-auto">
                            <i class="<?= htmlspecialchars($counter['icon']) ?> fa-2x"></i>
                        </div>
                        <div class="counter-counting my-3">
                            <span class="text-white fs-2 fw-bold" data-toggle="counter-up"><?= htmlspecialchars($counter['count']) ?></span>
                            <span class="h1 fw-bold text-white">+</span>
                        </div>
                        <h4 class="text-white mb-0"><?= htmlspecialchars($counter['label']) ?></h4>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
    new WOW().init();
</script>
</body>
</html>
