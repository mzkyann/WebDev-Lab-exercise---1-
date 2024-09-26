<?php
// Fungsi untuk menghasilkan bilangan palindrom piramid berdasarkan input pengguna
function Palindrom1($number) {
    // Loop untuk membuat piramid dari 1 hingga $number
    for ($i = 1; $i <= $number; $i++) {
        // Membuat string dengan karakter "1" sebanyak $i kali
        $numString = str_repeat("1", $i);  
        // Menghitung hasil dari numString x numString
        $result = $numString * $numString; 

        // Menambahkan spasi untuk membuat piramid menjadi rata tengah
        echo str_repeat("&nbsp;", ($number - $i) * 2); 
        // Menampilkan bilangan palindrom dan hasil perhitungan
        echo $numString . " x " . $numString . " = " . $result . "<br>";
    }
}

// Inisialisasi variabel output
$output = "";

// Mengecek apakah tombol submit "create" diklik
if (isset($_POST['create'])) {
    // Mengambil input dari pengguna
    $number = $_POST['penerbit'];  

    // Validasi input untuk memastikan tidak lebih dari 50
    if ($number > 50) {
        $output = '<script>showAlert("Angka tidak boleh lebih dari 50!");</script>';
    } elseif ($number < 0) {
        $output = '<script>showAlert("Angka tidak boleh negatif!");</script>';
    } else {
        // Mulai buffer output untuk menyimpan hasil fungsi
        ob_start();
        Palindrom1($number); 
        $output = ob_get_clean(); // Menyimpan hasil output dalam variabel
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palindrom Piramid</title>
    
    <!-- Fungsi JavaScript untuk menampilkan pesan kesalahan melalui alert -->
    <script>
        function showAlert(message) {
            alert(message);
        }
    </script>

    <!-- CSS untuk memperbaiki tampilan -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f9; /* Warna latar belakang halaman */
            color: #333; /* Warna teks */
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #0077cc; /* Warna biru untuk judul */
        }

        form {
            background-color: #fff; /* Warna latar form */
            padding: 20px; /* Padding di dalam form */
            border-radius: 10px; /* Membuat sudut form membulat */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan */
            display: inline-block;
            margin-bottom: 20px; /* Memberikan jarak di bawah form */
        }

        input[type="number"] {
            padding: 10px; /* Padding dalam input */
            font-size: 16px; /* Ukuran font input */
            border-radius: 5px; /* Membuat sudut input membulat */
            border: 2px solid #ddd; /* Warna dan ketebalan border input */
            width: 80px; /* Lebar input */
            margin-right: 10px; /* Jarak antara input dan tombol */
        }

        button {
            padding: 10px 20px; /* Padding untuk tombol */
            background-color: #0077cc; /* Warna latar tombol */
            color: white; /* Warna teks tombol */
            border: none; /* Menghapus border default tombol */
            border-radius: 5px; /* Membuat sudut tombol membulat */
            font-size: 16px; /* Ukuran font tombol */
            cursor: pointer; /* Menjadikan tombol interaktif */
        }

        button:hover {
            background-color: #005fa3; /* Warna tombol saat hover */
        }

        .result {
            margin-top: 20px; /* Memberikan jarak atas untuk hasil */
            background-color: #eaf4fc; /* Latar belakang hasil */
            padding: 20px; /* Padding dalam kotak hasil */
            border-radius: 10px; /* Membuat sudut kotak hasil membulat */
            display: inline-block; /* Menjadikan kotak mengikuti konten */
            text-align: left; /* Rata kiri untuk hasil */
            width: auto;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>

    <!-- Form untuk memasukkan angka -->
    <h1>Palindrom Piramid Generator</h1>

    <div class="wrapper">
        <!-- Form input pengguna -->
        <form method="post" action="">
            <input type="number" name="penerbit" placeholder="Enter a number" min="1" max="50" required>
            <button type="submit" name="create">Enter</button>
        </form>

        <!-- Menampilkan hasil jika ada input -->
        <?php if ($output): ?>
            <div class="result">
                <?php echo $output; ?>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>
