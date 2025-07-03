<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI-Themed Registration</title>
    <style>
        :root {
            --bg: rgba(255, 255, 255, 0.05);
            --border: rgba(255, 255, 255, 0.15);
            --text: #ffffff;
            --accent: #00ffe7;
            --error: #ff4b5c;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: linear-gradient(145deg, #0f2027, #203a43, #2c5364);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text);
        }

        .form-container {
            background: var(--bg);
            backdrop-filter: blur(15px);
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 40px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 0 20px rgba(0, 255, 231, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: var(--accent);
            letter-spacing: 1px;
        }

        .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        .input-group input {
            width: 100%;
            padding: 12px 12px 12px 0;
            background: transparent;
            border: none;
            border-bottom: 2px solid var(--border);
            color: var(--text);
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s;
        }

        .input-group label {
            position: absolute;
            top: 12px;
            left: 0;
            font-size: 16px;
            color: #aaa;
            pointer-events: none;
            transition: 0.2s ease all;
        }

        .input-group input:focus + label,
        .input-group input:not(:placeholder-shown) + label {
            top: -10px;
            font-size: 13px;
            color: var(--accent);
        }

        .input-group input:focus {
            border-color: var(--accent);
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: var(--accent);
            color: #000;
            border: none;
            font-weight: bold;
            cursor: pointer;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .form-container input[type="submit"]:hover {
            background: #00d2c4;
        }

        .output,
        .error {
            margin-top: 20px;
            padding: 15px;
            border-radius: 8px;
            font-size: 14px;
        }

        .output {
            background: rgba(0, 255, 231, 0.1);
            border-left: 3px solid var(--accent);
        }

        .error {
            background: rgba(255, 75, 92, 0.1);
            border-left: 3px solid var(--error);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>AI Registration</h2>
        <form action="hello.php" method="post">
            <div class="input-group">
                <input type="text" name="username" id="username" required placeholder=" ">
                <label for="username">Name</label>
            </div>
            <div class="input-group">
                <input type="email" name="useremail" id="useremail" required placeholder=" ">
                <label for="useremail">Email</label>
            </div>
            <div class="input-group">
                <input type="number" name="userage" id="userage" min="1" required placeholder=" ">
                <label for="userage">Age</label>
            </div>
            <div class="input-group">
                <input type="password" name="userpassword" id="userpassword" required placeholder=" ">
                <label for="userpassword">Password</label>
            </div>
            <input type="submit" value="Register" name="submit">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $name = trim($_POST['username']);
            $email = trim($_POST['useremail']);
            $age = trim($_POST['userage']);
            $password = trim($_POST['userpassword']);

            if (empty($name) || empty($email) || empty($age) || empty($password)) {
                echo "<div class='error'>All fields are required.</div>";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<div class='error'>Please enter a valid email address.</div>";
            } else {
                echo "<div class='output'>";
                echo "<strong>Name:</strong> " . htmlspecialchars($name) . "<br>";
                echo "<strong>Email:</strong> " . htmlspecialchars($email) . "<br>";
                echo "<strong>Age:</strong> " . htmlspecialchars($age) . "<br>";
                echo "<strong>Password:</strong> " . htmlspecialchars($password) . "<br>";
                echo "</div>";
            }
        }
        ?>
    </div>

</body>

</html>