<?php
require_once('process_form.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php caculate</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <form action="" method="get" id="myForm" style="display: none;">
        <input type="number" name="a" placeholder="Nhap A" value="<?= $a ?>" required>
        <input type="number" name="b" placeholder="Nhap B" value="<?= $b ?>" required>
        <select name="pheptinh" required="True" id="">
            <option value="">Chon phep tinh</option>
            <option value="+" <?= ($pheptinh == "+" ? "selected" : "") ?>>+</option>
            <option value="-" <?= ($pheptinh == "-" ? "selected" : "") ?>>-</option>
            <option value="*" <?= ($pheptinh == "*" ? "selected" : "") ?>>*</option>
            <option value="/" <?= ($pheptinh == "/" ? "selected" : "") ?>>/</option>
            <option value="%" <?= ($pheptinh == "%" ? "selected" : "") ?>>%</option>
        </select>
        <input type="submit" value="=">
        <p>
            ketqua: <?= $ketqua ?>
        </p>
    </form>
    <table>
        <tr>
            <th colspan="5"><input type="text" id="result" class="btn" value="<?=$pheptinh != '' ? ($a.$pheptinh.$b."=".$ketqua) : ''?>" disabled></th>
        </tr>
        <tr>
            <td><input type="button" class="btn" value="7"></td>
            <td><input type="button" class="btn" value="8"></td>
            <td><input type="button" class="btn" value="9"></td>
            <td><input type="button" class="btn" value="/"></td>
            <td><input type="button" class="btn" value="C"></td>
        </tr>
        <tr>
            <td><input type="button" class="btn" value="4"></td>
            <td><input type="button" class="btn" value="5"></td>
            <td><input type="button" class="btn" value="6"></td>
            <td><input type="button" class="btn" value="*"></td>
            <td><input type="button" class="btn" value="AC"></td>
        </tr>
        <tr>
            <td><input type="button" class="btn" value="1"></td>
            <td><input type="button" class="btn" value="2"></td>
            <td><input type="button" class="btn" value="3"></td>
            <td><input type="button" class="btn" value="-"></td>
            <td rowspan="2"><input id="equ" type="button" class="btn" value="="></td>
        </tr>
        <tr>
            <td colspan="2"><input type="button" id="zero" class="btn" value="0"></td>
            <td><input type="button" class="btn" value=","></td>
            <td><input type="button" class="btn" value="+"></td>
        </tr>
    </table>
    <script type="text/javascript">
        $(document).ready(function() {
            $("input").click(function() {
                // console.log($(this).val());
                var value = $(this).val();
                switch (value) {
                    case "+":
                    case "-":
                    case "*":
                    case "/":
                        $('[name=pheptinh]').val(value);
                        break;
                    case "AC":
                    case "C":
                        $('[name=a]').val("");
                        $('[name=b]').val("");
                        $('[name=pheptinh]').val("");
                        $('[name=ketqua]').val("");
                        break;
                    case "=":
                        // submit data
                        $('#myForm').submit();
                        break;
                    default:
                        if($('[name=pheptinh]').val() !=''){
                            $('[name=b]').val($('[name=b]').val() + value);
                        }else{
                            $('[name=a]').val($('[name=a]').val() + value);
                        }
                        break;
                }

                $('#result').val($('[name=a]').val() +" "+ $('[name=pheptinh]').val() +" "+ $('[name=b]').val())
            });
        });
    </script>
</body>

</html>