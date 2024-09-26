<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['array1']) && isset($_POST['array2'])) {
        $number = array_map('intval', $_POST['array1']);
        $number1 = array_map('intval', $_POST['array2']);

        $filteredNumber = array_filter($number, fn($value) => $value !== 0);
        $filteredNumber1 = array_filter($number1, fn($value) => $value !== 0);

        $m = count($filteredNumber);
        $n = count($filteredNumber1);

        $hasil = implode('', $filteredNumber) . implode('', $filteredNumber1);

        $resultArray = str_split($hasil);
        sort($resultArray);
        $short = implode('', $resultArray);
    } else {
        $hasil = $short = '';
        $m = $n = 0;
    }
} else {
    $hasil = $short = '';
    $m = $n = 0;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Angka</title>
    <style>
        /* Warna dan gaya dasar halaman */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Latar belakang biru muda */
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Gaya kontainer form */
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #0077cc;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }

        /* Mengatur tampilan input */
        input {
            width: 40px;
            height: 40px;
            text-align: center;
            font-size: 18px;
            margin: 5px;
            border: 2px solid #ddd;
            border-radius: 5px;
        }

        input:focus {
            border-color: #0077cc;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 119, 204, 0.5);
        }

        /* Gaya tombol kirim */
        button {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #0077cc;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #005fa3;
        }

        /* Gaya hasil */
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .result h3 {
            color: #333;
        }
    </style>
</head>
<body>

    <!-- Kontainer form untuk input angka -->
    <div class="form-container">
        <h2>Masukkan Angka</h2>

        <form method="post">
            <label for="array1">Input Pertama (Maksimal 5 Digit)</label>
            <div>
                <?php for ($i = 0; $i < 5; $i++): ?>
                    <input type="text" name="array1[]" maxlength="1" placeholder="0" required>
                <?php endfor; ?>
            </div>

            <label for="array2">Input Kedua (Maksimal 5 Digit)</label>
            <div>
                <?php for ($i = 0; $i < 5; $i++): ?>
                    <input type="text" name="array2[]" maxlength="1" placeholder="0" required>
                <?php endfor; ?>
            </div>

            <!-- Tombol untuk mengirimkan form -->
            <button type="submit">Kirim</button>
        </form>

        <!-- Hasil dari input form -->
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div class="result">
            <h3>Hasil:</h3>
            <p>Gabungan dari kedua input: <?= htmlspecialchars($hasil) ?></p>
            <p>Jumlah dari array pertama (m): <?= $m ?></p>
            <p>Jumlah dari array kedua (n): <?= $n ?></p>
            <p>Hasil setelah diurutkan: <?= htmlspecialchars($short) ?></p>
        </div>
        <?php endif; ?>
    </div>

</body>
</html>
