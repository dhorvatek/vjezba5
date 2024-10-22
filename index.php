<?php
//rng
$myRandomNumber = rand(1, 9);

$result; //var za spremanje 
$button_class = "submit";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_input = $_POST['guess'];

    if (is_numeric($user_input) && $user_input >= 1 && $user_input <= 9) {
        if ($user_input == $_POST['myRandomNumber']) {
            $result = "Pogodak! Pokušaj ponovo!";
            $button_class = "success"; 
        } else {
            $result = "Krivo, pokušaj ponovo!";
            $button_class = "error"; 
        }
    } 
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pogađanje</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Igra: Pogodi broj</h1>

    <form method="POST" action="">
        <label for="guess">Unesite broj od 1 do 9:</label>
        <input type="number" id="guess" name="guess" min="1" max="9" class="form-input" required>
        <input type="hidden" name="myRandomNumber" value="<?php echo $myRandomNumber; ?>">
        <br><br>

        <button type="submit" class="button <?php echo $button_class; ?>">
            <?php 
            if (!empty($result)) {
                echo $result;
            } else {
                echo "Pošalji"; 
            }
            ?>
        </button>
    </form>

    <br>

    <?php if (!empty($result)) { ?>
        <p>Zamišljeni broj je bio: <?php echo $_POST['myRandomNumber']; ?></p>
    <?php } ?>
</body>
</html>
