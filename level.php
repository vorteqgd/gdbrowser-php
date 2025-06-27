<!--
Typical response:
    "name": "1st level",
    "id": "128",
    "description": "(No description provided)",
    "author": "real storm",
    "playerID": "30144023",
    "accountID": "6338004",
    "difficulty": "Hard",
    "downloads": 3136276,
    "likes": 266356,
    "disliked": false,
    "length": "Medium",
    "platformer": false,
    "stars": 0,
    "orbs": 0,
    "diamonds": 0,
    "featured": false,
    "epic": false,
    "epicValue": 0,
    "legendary": false,
    "mythic": false,
    "gameVersion": "2.1",
    "editorTime": 0,
    "totalEditorTime": 0,
    "version": 1,
    "copiedID": "128",
    "twoPlayer": false,
    "officialSong": 5,
    "customSong": "0",
    "coins": 0,
    "verifiedCoins": false,
    "starsRequested": 2,
    "ldm": false,
    "objects": 208,
    "large": false,
    "cp": 0,
    "partialDiff": "hard",
    "difficultyFace": "hard",
    "songName": "Base After Base",
    "songAuthor": "DJVI",
    "songSize": "0MB",
    "songID": "Level 5"
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
            echo "<p>No Level ID provided.</p>";
            exit;
        }
        $level_id = urlencode($_GET["id"]); // get id
        $url = "https://gdbrowser.com/api/level/$level_id";

        $response = file_get_contents($url); // get api responce
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

        // display data
        echo "<h1>" . $out["name"] ."</h1>";
        echo "<h3><a class='gold' href='./user.php?id=" . $out["accountID"] . "'>" . " By " . $out["author"] . "</a></h3>";

        echo "<div class='stat_box'>"; // stat box
        echo "<img src='../assets/faces/" . $out["difficultyFace"] .".png' class='difficulty-face'>";
        echo "<p class='stat-text' style='font-size:25px;margin:0;'>" . $out["difficulty"] . "</p>";
        if ($out["stars"] != "0") { // check if the level has stars
            echo "<p class='stat-text' style='font-size:25px;margin:0;'><img class='stat-img' style='width:25px;margin-bottom:4px;' src='assets/star.png'>" . $out["stars"] ."</p>";
        }

        echo "<p class='stat-text'><img class='stat-img' src='assets/download.png'>" . $out["downloads"] . "</p>";
        echo "<p class='stat-text'><img class='stat-img' src='assets/like.png'>" . $out["likes"] . "</p>";
        echo "<p class='stat-text'><img class='stat-img' src='assets/clock.png'>" . $out["length"] . "</p>";
        /* i don't think i need this code but im keeping it bc it's cool
        if ($out["cp"] != 0) {
            $rate = match ($out["cp"]) {
                "1" => "Rated",
                "2" => "Featured",
                "3" => "Epic",
                "4" => "Legendary",
                "5" => "Mythic"
            };
        } */
        echo "</div>"; // end stat box
        echo "<div class='description-box'>";
        echo "<p>". $out["description"] ."</p>";
        echo "</div>";
    ?>
</body>
</html>