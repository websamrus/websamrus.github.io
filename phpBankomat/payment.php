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

            <?php
            if($_POST['money'] != null) {
                $value = $_POST['money'];
                if (ctype_digit($value) && (int)$value > 0)
                {
                    $money = (int) $value;
                    if ($money <= 1000000)
                    {
                        $bills = array(500 => 0, 200 => 0, 100 => 0, 50 => 0, 20 => 0, 10 => 0, 5 => 0);
                        $rating = array(500, 200, 100, 50, 20, 10, 5);

                        echo "<h3>Заказано ".$value." грн.</h3>";

                        $i = 0;
                        while ($money>=5){
                            if($money/$rating[$i]>=1){
                                $temp = (int)($money/$rating[$i]);
                                if($temp >=500) $temp =500;
                                $money -= $rating[$i]*$temp;
                                countBill ($rating[$i],$temp, $bills);
                            }
                            $i++;
                            if ($i == count($rating)) $i=0;
                        }

                        $sum=0;
                        echo "<table>";
                        echo '<tr><td>Номинал купюры</td><td>Количество</td></tr>';
                        foreach ($bills as  $key => $b) {
                            if ($b != 0) {
                                echo '<tr><td>' . $key . '</td><td>' . $b . '</td></tr>';
                                $sum += $key * $b;
                            }
                        }
                        echo "</table>";
                        echo "<h2>Выдано  {$sum} грн. </h2>";
                    }else {
                        echo "<h3>Ошибка!! Вы заказали: {$money}. В банкомате недостаточно денег.</h3>";
                        echo '<h4>Нажмите кнопку "Вернуться" и введите меньшую суму(до 1 000 000грн)</h4>';
                    }

                }else {
                    echo "<h3>Ошибка!! Вы ввели:  {$value}  </h3>";
                    echo '<h4>Нажмите кнопку "Вернуться" и введите только цифры</h4>';
                }
            }

            echo "<button class='btn'><a href='index.php'>Вернуться</a></button>";
            function countBill ($c, $r, &$arrStr){
                foreach ($arrStr as  $key => &$b){
                    if($key == $c) $b+=$r;
                }
            }
            ?>
        </div>
    </div>
</body>
</html>

