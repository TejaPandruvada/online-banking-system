<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="loginstyle.css">
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <span class="details">
        <h4>Welcome to </h4>
        <nbsp>
            <h1>Quintet Banking</h1>
            <nbsp><br>
                <h3>A hassle free banking with us.</h3>
                Too lazy to go to a bank?
                Try our online banking system, <b>banking made easier.</b>
                <p>Quintet bank provides best and simple payment interface, a secure way for transacting your funds and
                    many options for you to choose</p>
                <br>
    </span>
    <p class="left">Your money is safe with us</p>
    <form action="loginvalidate.php" method="post">
        <h3>Login Here</h3>
        <label>ACCOUNT NUMBER</label>
        <input type="text" placeholder="Account number" name="accnum" required>
        <label>Password</label>
        <input type="password" placeholder="Password" name="password" required>
        <button type="submit" name="submit" id="submit">Log In</button>
    </form>
</body>

</html>

