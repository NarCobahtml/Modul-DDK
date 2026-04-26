<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f4f4f4;
    }

    .box {
        width: 360px; /* diperbesar */
        padding: 35px; /* lebih lega */
        background: white;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        text-align: center;
    }

    .subtitle {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 8px;
    }

    h1 {
        font-size: 16px;
        color: #777;
        margin-bottom: 25px;
        font-weight: normal;
    }

    input {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        outline: none;
    }

    input:focus {
        border-color: #555;
    }

    button {
        width: 100%;
        padding: 12px;
        background: #333;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    button:hover {
        background: #111;
    }
</style>
</head>

<body>

<div class="box">
    <div class="subtitle">Biodata Siswa RPL</div>
    <h1>Login</h1>

    <form action="submit.php" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Masuk</button>
    </form>
</div>

</body>
</html>