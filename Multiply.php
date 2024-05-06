<!DOCTYPE html>
<html>
<head>
    <title>Умножение чисел</title>
</head>
<body>
    <form method="post">
        <p>Введите первое число: <input type="text" name="num1"></p>
        <p>Введите второе число: <input type="text" name="num2"></p>
        <input type="submit" value="Умножить">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        if (!is_numeric($num1) || !is_numeric($num2)) {
            echo "Пожалуйста, введите корректные числа.";
        } else {
            $product = $num1 * $num2;
            $maxLength = max(strlen($num1), strlen($num2), strlen($product), 15);

            echo "<h3>Процесс умножения:</h3>";
            echo str_pad($num1, 100 - $maxLength, "&nbsp;") . "<br>";
            echo str_pad("*" . $num2, 100 - $maxLength - 1, "&nbsp;") . "<br>";
            echo str_pad("———————————————————", 100 - $maxLength, "&nbsp;") . "<br>";

            if ($num2 < 10) {
                echo str_pad($product, 100 - $maxLength, "&nbsp;") . "<br>";
            } else {
                $result = 0;
                $multiplier = 1;

                foreach (str_split($num2) as $digit) {
                    $partialProduct = $num1 * $digit * $multiplier;
                    echo str_pad("+" . $partialProduct, 100 - $maxLength - 1, "&nbsp;") . "<br>";
                    $result += $partialProduct;
                    $multiplier *= 10;
                }

                echo str_pad("———————————————————", 100 - $maxLength, "&nbsp;") . "<br>";
                echo str_pad($result, 100 - $maxLength, "&nbsp;") . "<br>";
            }
        }
    }
    ?>
</body>
</html>
