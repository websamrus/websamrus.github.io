<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper">
        <div class="bankomat">
            <h1>Банкомат</h1>
            <h3>Введите сумму, которою хотите снять(только цифры):</h3>
            <form action="payment.php" method="POST">
                <div><input type="text" name="money" required></div>
                <div><button class="btn" type="submit" value="Выдать" >Выдать</button></div>
            </form>
        </div>

    </div>
</body>
</html>