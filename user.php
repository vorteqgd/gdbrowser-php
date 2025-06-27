    <!--{
    "username": "RobTop",
    "playerID": "16",
    "accountID": "71",
    "rank": 160049,
    "stars": 4054,
    "diamonds": 7075,
    "coins": 20,
    "userCoins": 273,
    "demons": 7,
    "moons": 1129,
    "cp": 1,
    "icon": 298,
    "friendRequests": false,
    "messages": "off",
    "commentHistory": "all",
    "moderator": 2,
    "youtube": "UCz_yk8mDSAnxJq0ar66L4sw",
    "twitter": "RobTopGames",
    "twitch": "robtopgames",
    "ship": 28,
    "ball": 91,
    "ufo": 138,
    "wave": 46,
    "robot": 44,
    "spider": 50,
    "swing": 22,
    "jetpack": 3,
    "col1": 35,
    "col2": 8,
    "colG": 0,
    "deathEffect": 1,
    "glow": false,
    "classicDemonsCompleted": {
        "easy": 2,
        "medium": 2,
        "hard": 1,
        "insane": 0,
        "extreme": 0,
        "weekly": 0,
        "gauntlet": 0
  },
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Level</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        // check if level id is provided
        if (!isset($_GET["id"])) {
            echo "<p>No account ID/name provided.</p>";
            exit;
        }

        $account = urlencode($_GET["id"]); // get id
        $url = "https://gdbrowser.com/api/profile/$account";

        $response = @file_get_contents($url); // get api responce
        if ($response === false || $response == "-1") {
            echo "<p>Error: specified user may not exist or may be a green user.</p>";
            exit;
        }

        $data = json_decode($response, true); // decode as associative array
        
        function escape_html($value) {
            if (is_array($value)) {
                return array_map('escape_html', $value);
            }
            if (is_null($value)) {
                return '';
            }
            return htmlspecialchars($value);
        }
        $out = escape_html($data);
        
        echo "<h1>" . $out['username'] ."</h1>";
        echo "<div class='user_stat_box'>"; // user stats
        echo "<p class='stat-text'><img class='stat-img' src='assets/star.png'>" . $out["stars"] . "</p>";
        echo "<p class='stat-text'><img class='stat-img' src='assets/moon.png'>" . $out["moons"] . "</p>";
        echo "<p class='stat-text'><img class='stat-img' src='assets/coin.png'>" . $out["coins"] . "</p>";
        echo "<p class='stat-text'><img class='stat-img' src='assets/silver_coin.png'>" . $out["userCoins"] . "</p>";
        echo "<p class='stat-text'><img class='stat-img' src='assets/demon.png'>" . $out["demons"] . "</p>";
        if ($out["cp"] != "0") { // checking if the user has creator points
            echo "<p class='stat-text'><img class='stat-img' src='assets/cp.png'>" . $out["cp"] . "</p>";
        }
        echo "</div>";
    ?>
</body>
</html>