<?php

?>

<!DOCTYPE html>
<html>
<head>
    <title>Account Created - TechZone</title>
    <link rel="stylesheet" href="css/auth-style.css">  <!-- SAME CSS AS SIGNUP PAGE -->

    <style>
        .success-glass-box {
            max-width: 520px;
            margin: 120px auto;
            padding: 40px;
            background: rgba(255, 255, 255, 0.10);
            backdrop-filter: blur(15px);
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.25);
            text-align: center;
            color: white;
        }
        .success-title {
            font-size: 28px;
            font-weight: 700;
            color: #5cf080;
            margin-bottom: 10px;
        }
        .success-box p {
            font-size: 17px;
            opacity: 0.9;
        }
        .success-btn {
            margin-top: 20px;
            padding: 12px 24px;
            background: #1a73ff;
            color: white;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            transition: 0.25s;
        }
        .success-btn:hover {
            background: #0d5ae0;
            transform: translateY(-2px);
        }
        .link-home {
            margin-top: 18px;
            display: block;
            color: #cfe3ff;
            text-decoration: underline;
        }
    </style>
</head>

<body>

<link rel="stylesheet" href="css/auth-style.css">

<div class="success-wrapper">

    <div class="glass-box" style="max-width:500px; text-align:center;">

        <h2 style="color:#4ade80; font-size:28px;">
            Account Created Successfully!
        </h2>

        <p style="margin-top:10px; font-size:16px;">
            Your TechZone account is now ready.
        </p>

        <a href="login.php">
            <button style="margin-top:20px;">Login Now</button>
        </a>

        <p style="margin-top:15px;">
            <a href="index.php">Back to Home</a>
        </p>

    </div>

</div>


</body>
</html>
