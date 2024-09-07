<!DOCTYPE html>
<html>
<head>
    <style>
        .chart-container {
            width: 100%;
            max-width: 297mm; /* Lebar A3 potrait */
            height: auto;
            margin: 0 auto;
        }
        img.chart-image {
            width: 100%; /* Menyesuaikan lebar gambar dengan container */
            height: auto; /* Menjaga proporsi gambar */
        }
    </style>
</head>
<body>
    <div class="chart-container">
        <img src="{{ storage_path('app/public/images/' . $chartImageFilename) }}" class="chart-image" alt="Chart Image">
    </div>
</body>
</html>
