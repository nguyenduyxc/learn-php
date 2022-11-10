<?php
require_once('process_form_for_php_js.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php + js: caculate</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <form action="" method="get" id="myForm" style="display: none;">
    <!-- <form action="" method="get" id="myForm" style=""> -->
        <input type="text" name="a" placeholder="Nhap A" value="<?= $result ?>" required>
        <input type="text" name="b" placeholder="Nhap B" value="" required>
        <select name="cal" required="True" id="">
            <option value="">Chon phep tinh</option>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="%">%</option>
        </select>
        <input type="submit" value="=">
        <p>
            ketqua: <?= $result ?>
        </p>
    </form>
    <table>
        <tr>
            <th colspan="5">
                <input type="text" id="result" class="btn" style="display: block" value="<?= $a . $cal . $b ?>" disabled>
                <input type="text" id="result2" class="btn" style="display: block" value="<?= $result != '' ? "=" . $result : '=0' ?>" disabled>
            </th>
        </tr>
        <tr>
            <td><input type="button" class="btn" onclick="setValueNum(this.value)" value="7"></td>
            <td><input type="button" class="btn" onclick="setValueNum(this.value)" value="8"></td>
            <td><input type="button" class="btn" onclick="setValueNum(this.value)" value="9"></td>
            <td><input type="button" class="btn" onclick="cal(this.value)" value="/"></td>
            <td><input type="button" class="btn" onclick="kyTuC()" value="C"></td>
        </tr>
        <tr>
            <td><input type="button" class="btn" onclick="setValueNum(this.value)" value="4"></td>
            <td><input type="button" class="btn" onclick="setValueNum(this.value)" value="5"></td>
            <td><input type="button" class="btn" onclick="setValueNum(this.value)" value="6"></td>
            <td><input type="button" class="btn" onclick="cal(this.value)" value="*"></td>
            <td><input type="button" class="btn" onclick="resetCalAll()" value="AC"></td>
        </tr>
        <tr>
            <td><input type="button" class="btn" onclick="setValueNum(this.value)" value="1"></td>
            <td><input type="button" class="btn" onclick="setValueNum(this.value)" value="2"></td>
            <td><input type="button" class="btn" onclick="setValueNum(this.value)" value="3"></td>
            <td><input type="button" class="btn" onclick="cal(this.value)" value="-"></td>
            <td rowspan="2"><input id="equ" type="button" class="btn" onclick="result()" value="="></td>
        </tr>
        <tr>
            <td colspan="2"><input type="button" id="zero" class="btn" onclick="setValueNum(this.value)" value="0"></td>
            <td><input type="button" class="btn" onclick="setValueNum(this.value)" value="."></td>
            <td><input type="button" class="btn" onclick="cal(this.value)" value="+"></td>
        </tr>
    </table>
    <script type="text/javascript">
        var option = 1;

        function setValueNum(num) {
            // console.log(typeof(num));
            if (option == 1) {
                $('[name=a]').val($('[name=a]').val() + num);
            } else {
                $('[name=b]').val($('[name=b]').val() + num);
            }
            buildCal();
        }

        function kyTuC() {
            if (option == 1) {
                var a = $('[name=a]').val();
                a = xoaPhanTuCuoi(a);
                $('[name=a]').val(a);
                buildCal();

                // khi nao a het ky tu -> result2 tu dong ve '=0'
                if ($('[name=a]').val().length == 0) {
                    
                    $('#result2').val('=0');
                }

            }else if (option == 2) {
                var b = $('[name=b]').val();
                b = xoaPhanTuCuoi(b);
                $('[name=b]').val(b);
                option = 3;
                buildCal();
            }else{
                option = 1;
                $('[name=cal]').val('');
                buildCal();
            }
        }

        function xoaPhanTuCuoi(str) {
            var arr = str.split("");
            var char = arr.pop();
            var originalString = arr.join("");
            return originalString;
        }

        function resetCalAll() {
            option = 1;
            $('[name=a]').val('');
            $('[name=b]').val('');
            $('[name=cal]').val('');
            $('#result').val('');
            $('#result2').val('=0');
        }

        function cal(c) {
            if ($('[name=a]').val() == '') {
                return;
            }
            $('[name=cal]').val(c);
            option = 2;
            buildCal();
        }

        function buildCal() {
            $('#result').val($('[name=a]').val() + $('[name=cal').val() + $('[name=b]').val())
        }

        function result() {
            $('#myForm').submit();
        }
    </script>
</body>

</html>