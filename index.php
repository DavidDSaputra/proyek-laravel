<?php
// Set default timezone
date_default_timezone_set('Asia/Jakarta');

// Get current time and date
$time = date("H:i:s");
$date = strftime("%A, %d %B %Y", time());

// Announcement data
$announcements = [
    "Mahasiswa berhasil meraih prestasi juara desain nasional!",
    "Wisuda Angkatan 2024 akan dilaksanakan...",
];

// Schedule data
$class_schedule = [
    ["course" => "Matematika", "time" => "07:00 - 12:00 WIB"],
    ["course" => "Pemrograman Dasar", "time" => "14:00 - 17:00 WIB"]
];

// Today’s detailed schedule
$detailed_schedule = [
    [
        "course" => "Matematika 1",
        "lecturer" => "Prof. Andi",
        "time" => "07:00 - 10:00 WIB"
    ],
    [
        "course" => "Pemrograman Dasar",
        "lecturer" => "Dr. Budi",
        "time" => "14:00 - 17:00 WIB"
    ],
    [
        "course" => "Statistik Lanjutan",
        "lecturer" => "Prof. Siska",
        "time" => "10:30 - 12:30 WIB"
    ]
];

// Attendance statistics
$attendance = [
    "Hadir" => 93,
    "Izin" => 5,
    "Sakit" => 2
];

// Divide the schedule into three parts
$total = count($detailed_schedule); // Count total data
$third = ceil($total / 3); // Divide data into 3 parts

$first_part = array_slice($detailed_schedule, 0, $third);
$second_part = array_slice($detailed_schedule, $third, $third);
$third_part = array_slice($detailed_schedule, $third * 2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papan Informasi</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="header-left">
            <img src="assets/logo2.png" alt="Logo" class="logo">
        </div>
        <div class="header-center">
            <h1>Papan Informasi</h1>
        </div>
        <div class="header-right">
            <p class="time"><?= $time ?></p>
            <p class="date"><?= $date ?></p>
        </div>
        <marquee class="announcement">
            <?= implode(' | ', $announcements); ?>
        </marquee>
    </header>

    <main>
        <!-- Slideshow Section -->
        <div class="slideshow-container">
            <!-- Slides -->
          
            <div class="slide fade">
                <img src="assets/poto2.jpg" alt="Slide 2">
            </div>
            <div class="slide fade">
                <img src="assets/gedung2.jpg" alt="Slide 3">
            </div>

            <!-- Navigation Buttons -->
            <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
            <a class="next" onclick="changeSlide(1)">&#10095;</a>
        </div>

        <!-- Dots for Manual Navigation -->
        <div class="dots">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>

        <!-- Content Below Slideshow -->
        <div class="grid">
            <div class="card">
                <h2>Informasi Terkini</h2>
                <ul>
                    <li>Ujian Tengah Semester (20-21 Desember)</li>
                    <li>Lomba Desain Nasional (20 April)</li>
                </ul>
            </div>
            <div class="card">
                <h2>Guru Piket Hari Ini</h2>
                <ul>
                    <li><strong>Ibu Puan Mahasiswa:</strong> 07.00 - 08.00 WIB</li>
                    <li><strong>Bapak Aditia Rusdi:</strong> 09.00 - 10.00 WIB</li>
                </ul>
            </div>
            <div class="card">
                <h2>Statistik Kehadiran Hari Ini</h2>
                <div class="stats-bar">
                    <div class="bar hadir" style="width: 93%;">Hadir: 93%</div>
                    <div class="bar izin" style="width: 5%;">Izin: 5%</div>
                    <div class="bar sakit" style="width: 2%;">Sakit: 2%</div>
                </div>
            </div>
        </div>

        <!-- Jadwal Mata Kuliah -->
        <div class="grid">
            <!-- First Card -->
            <div class="card">
                <h2>Jadwal Mata Kuliah (Bagian 1)</h2>
                <ul class="class-schedule">
                    <?php foreach ($first_part as $detail): ?>
                        <li>
                            <strong>Mata Kuliah:</strong> <?= $detail['course'] ?><br>
                            <strong>Dosen:</strong> <?= $detail['lecturer'] ?><br>
                            <strong>Jam:</strong> <?= $detail['time'] ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Second Card -->
            <div class="card">
                <h2>Jadwal Mata Kuliah (Bagian 2)</h2>
                <ul class="class-schedule">
                    <?php foreach ($second_part as $detail): ?>
                        <li>
                            <strong>Mata Kuliah:</strong> <?= $detail['course'] ?><br>
                            <strong>Dosen:</strong> <?= $detail['lecturer'] ?><br>
                            <strong>Jam:</strong> <?= $detail['time'] ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Third Card -->
            <div class="card">
                <h2>Jadwal Mata Kuliah (Bagian 3)</h2>
                <ul class="class-schedule">
                    <?php foreach ($third_part as $detail): ?>
                        <li>
                            <strong>Mata Kuliah:</strong> <?= $detail['course'] ?><br>
                            <strong>Dosen:</strong> <?= $detail['lecturer'] ?><br>
                            <strong>Jam:</strong> <?= $detail['time'] ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </main>

    <script src="script.js"></script>
</body>
</html>
