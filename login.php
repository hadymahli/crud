<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                        url('https://statik.tempo.co/data/2020/07/29/id_956098/956098_720.jpg') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 12px;
            width: 100%;
            max-width: 400px;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 30px;
            color: #fff;
        }

        .message {
            background-color: rgba(255, 0, 0, 0.3);
            padding: 10px;
            border-radius: 6px;
            text-align: center;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        .input-field::placeholder {
            color: #ddd;
        }

        .input-field:focus {
            outline: none;
            background-color: rgba(255, 255, 255, 0.3);
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #00bfff;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            margin-top: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #009acd;
        }

        .signup1 {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .signup1 a {
            color: #00bfff;
            text-decoration: none;
            font-weight: bold;
        }

        .signup1 a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php
        if (isset($_GET['pesan'])) {
            echo "<div class='message'>";
            if ($_GET['pesan'] == "gagal") {
                echo "Login gagal! Email dan password salah!";
            } else if ($_GET['pesan'] == "logout") {
                echo "Anda telah berhasil logout";
            } else if ($_GET['pesan'] == "belum_login") {
                echo "Anda harus login untuk mengakses halaman admin";
            }
            echo "</div>";
        }
        ?>
        <form method="post" action="login_proses.php">
            <input type="email" name="email" placeholder="Masukkan email" class="input-field" required>
            <input type="password" name="password" placeholder="Masukkan password" class="input-field" required>
            <input type="submit" value="LOGIN" class="btn-submit">
        </form>

        <div class="signup1">
            Belum punya akun? <a href="signup.php">Sign up di sini</a>
        </div>
    </div>
</body>
</html>
