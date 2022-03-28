<?php
include_once(__DIR__.'/objectXML.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
</head>
<body>
    <section class="main">
        <div class="main_block">
            <form action="" id="form" class="form">
                <label>
                    Количество:
                    <input type="number" name="amount" value="0">
                </label>
                <label>
                    Валюта:    
                    <select name="currency" id="currency">
                        <?php foreach ($arrCurrency as $currency) :?>                    
                                    <option value="<?php echo $currency[1]?>"><?php echo $currency[1]?></option>
                        <?php endforeach?>
                    </select>
                </label>
                <button type="submit" class="button">Узнать курс</button>
            </form>
            <div class="display-currency">
                <span style="font-size: 26px">Курс:</span>
                <input type="text" disabled value="0 руб" id="display-currency__value">
            </div>
        </div>
    </section>
</body>
</html>