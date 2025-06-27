<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <p>Enter a Level ID:</p>
    <form method="get" action="level.php">
        <input type="text" name="id">
        <button type="submit">Enter</button>
    </form>
    <p>Enter a Username or account ID:</p>
    <form method="get" action="user.php">
        <input type="text" name="id">
        <button type="submit">Enter</button>
    </form>
    <br>
    <h3><a class="gold" href="/level.php?id=daily">View daily</a></h3>
    <h3><a class="gold" href="/level.php?id=weekly">View weekly</a></h3>
    <h3><a class="gold" href="/level.php?id=event">View event</a></h3>
</body>
</html>