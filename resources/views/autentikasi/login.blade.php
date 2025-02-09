<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('https://bengkelqu.id/storage/photos/28/fungsi%20manajemen%20bengkel%202%20(1).jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        form {
            position: relative;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            padding: 30px;
            z-index: 1;
        }
        form h3 {
            font-size: 28px;
            font-weight: 500;
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-size: 16px;
            margin-top: 15px;
        }
        input {
            width: 100%;
            height: 45px;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        button {
            width: 100%;
            height: 50px;
            background-color: #ff512f;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #e04a29;
        }
        .register-link {
            text-align: center;
            margin-top: 20px;
        }
        .register-link a {
            color: #ff512f;
            text-decoration: none;
            font-weight: bold;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <form action="/login" method="POST">
        @csrf
        <h3>Login</h3>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Email" required>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>

        <div class="register-link">
            <p>Belum punya akun? <a href="/register">Daftar di sini</a></p>
        </div>
    </form>
</body>
</html>
