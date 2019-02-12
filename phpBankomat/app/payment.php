<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bankomat</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="wrapper">
        <div class="bankomat">

            <?php
            if($_POST['money'] != null) {
                $money = (int)$_POST['money'];
                    if ($money%5 == 0 && $money <=1000000) {
                        $bills = array(500 => 0, 200 => 0, 100 => 0, 50 => 0, 20 => 0, 10 => 0, 5 => 0);
                        $rating = array(500, 200, 100, 50, 20, 10, 5);

                        $i = 0;
                        while ($money>=5){
                            if($money/$rating[$i]>=1){
                                $temp = (int)($money/$rating[$i]);
                                //if($temp >=500) $temp =500;
                                $money -= $rating[$i]*$temp;
                                countBill ($rating[$i],$temp, $bills);
                            }
                            $i++;
                            //if ($i == count($rating)) $i=0;
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
                    }else if($money < 5){
                        echo "<h3>Выдача невозможна: сумма меньше 5грн.</h3>";
                        echo '<h4>Нажмите кнопку "Вернуться" и введите сумма больше 5грн</h4>';
                    }else if($money > 1000000){
                        echo "<h3>Ошибка!! Вы заказали: {$money}, в банкомате недостаточно купюр</h3>";
                        echo '<h4>Нажмите кнопку "Вернуться" и введите меньшую суму(до 1 000 000грн)</h4>';
                    }else if($money%5 != 0){
                        echo "<h3>Выдача невозможна: сумма не кратна 5грн.</h3>";
                        echo '<h4>Нажмите кнопку "Вернуться" и введите сумма кратной 5грн</h4>';
                    }
            }

            echo "<button class='btn'><a href='../index.html'>Вернуться</a></button>";
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

