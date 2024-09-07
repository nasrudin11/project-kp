<!DOCTYPE html>
<html>
<head>
    <title>PDF Report</title>
    <style>
        @page {
            margin: 20mm;
        }

        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2>Keterangan :</h2>


    @php
        $no = 1;
    @endphp

    @foreach($keterangan as $desc)
        <p>{{ $no++ }}. {{ $desc }}</p>
    @endforeach

   
</body>
</html>
