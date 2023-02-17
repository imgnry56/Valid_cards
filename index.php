<?php
include('validation_cards.php');
?>


<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Card Validation</title>
</head>
<body>
<form method="post">
    <input type="text" name="cardNumber" autofocus>
    <button type="submit">Validate</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cardNumber'])) {
    $cardValidation = new CardValidation();
    $result = $cardValidation->validate($_POST['cardNumber']);


}
?>
<p class="result">Карта <?php echo $result[0]; ?> эмитент: <span><?php echo $result[1]; ?></span></p>

</body>
</html>