<?php
$xml = simplexml_load_file('http://www.cbr.ru/scripts/XML_daily.asp');
$int = 0;
$arrCurrency = [];

foreach ($xml as $index => $value) {
    foreach ($value as $index2 => $value2) {
        $arrCurrency[] = [(string)$value->Value[0],(string)$value->CharCode[0],(int)$value->Nominal[0]];
        break;
    }
}

if ($_POST['currency'] && $_POST['amount']) {
    $currency = $_POST['currency'];
    $amountCurrency = $_POST['amount'];
    foreach ($arrCurrency as $arr) {
        if (in_array($currency, $arr, true)) {
            $arr[0] = preg_replace('/,/', '.', $arr[0]);
            $int = (float)$arr[0] * ($amountCurrency / $arr[2]);
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="main">
        <div class="main_block">
            <form action="/task_two/index.php" method="post" class="form">
                <label>
                    Количество:
                    <input type="number" name="amount" value="<?php echo $_POST['amount'] ? $_POST['amount'] : 0?>">
                </label>
                <label>
                    Валюта:    
                    <select name="currency" id="currency">
                        <?php foreach ($arrCurrency as $currency) :?>
                            <?php if ($_POST['currency'] == $currency[1]) :?>
                                    <option value="<?php echo $_POST['currency']?>" selected><?php echo $_POST['currency']?></option>
                                <?php else :?>
                                    <option value="<?php echo $currency[1]?>"><?php echo $currency[1]?></option>
                                <?php endif?>
                        <?php endforeach?>
                    </select>
                </label>
                <button type="submit" class="button">Узнать курс</button>
            </form>
            <div class="display-currency">
                <span style="font-size: 26px">Курс:</span>
                <input type="text" disabled value="<?php echo $int?> руб" class="display-currency__value">
            </div>
        </div>
    </section>
</body>
</html>