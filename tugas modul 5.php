<?php
// Inisialisasi variabel
$nama = $email = $pesan = "";
$errors = [];
$success = false;

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil dan bersihkan input
    $nama = htmlspecialchars(trim($_POST["nama"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $pesan = htmlspecialchars(trim($_POST["pesan"]));

    // Validasi sederhana
    if (empty($nama)) {
        $errors[] = "Nama lengkap wajib diisi.";
    }
    if (empty($email)) {
        $errors[] = "Alamat email wajib diisi.";
    }
    if (empty($pesan)) {
        $errors[] = "Pesan atau komentar wajib diisi.";
    }

    if (empty($errors)) {
        $success = true;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buku Tamu Digital STITEK Bontang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f7;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 60%;
            margin: 30px auto;
            background: #fff;
            padding: 25px;
            box-shadow: 0 0 10px #ccc;
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
        }

        button {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #2980b9;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #1f618d;
        }

        .error {
            background-color: #f8d7da;
            color: #842029;
            padding: 10px;
            border-left: 5px solid #f44336;
            margin-top: 10px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-left: 5px solid #28a745;
            margin-top: 10px;
        }

        .submitted-data {
            margin-top: 20px;
        }

        .submitted-data p {
            margin: 5px 0;
        }

    </style>
</head>
<body>
<div class="container">
    <h1>Buku Tamu Digital STITEK Bontang</h1>

    <?php
    // Tampilkan pesan error
    if (!empty($errors)) {
        echo '<div class="error"><ul>';
        foreach ($errors as $err) {
            echo "<li>$err</li>";
        }
        echo '</ul></div>';
    }

    // Tampilkan pesan sukses
    if ($success) {
        echo '<div class="success">Terima kasih! Pesan Anda telah dikirim.</div>';
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>">

        <label for="email">Alamat Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>">

        <label for="pesan">Pesan / Komentar:</label>
        <textarea id="pesan" name="pesan" rows="5"><?php echo $pesan; ?></textarea>

        <button type="submit">Kirim Pesan</button>
    </form>

    <?php if ($success): ?>
        <div class="submitted-data">
            <h3>Data yang Dikirim:</h3>
            <p><strong>Nama:</strong> <?php echo $nama; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Pesan:</strong> <?php echo nl2br($pesan); ?></p>
        </div>
    <?php endif; ?>
</div>
</body>
</html>