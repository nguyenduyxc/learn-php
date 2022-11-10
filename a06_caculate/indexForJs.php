<?php
// require_once('process_form_for_js.php');
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
    <form action="" method="get" id="myForm" style="display: none">
        <input type="number" name="a" placeholder="Nhap A" value="" required>
        <input type="number" name="b" placeholder="Nhap B" value="" required>
        <input type="text" name="cal" placeholder="Nhap cal" value="" required>
        <input type="submit" value="=">
        <br>
        <span>
            ketqua:
            <input type="text" name="result_test" id="result_test">
        </span>

    </form>
    <table>
        <tr>
            <th colspan="5">
                <input type="text" id="result" class="btn" value="" style="display: block" disabled>
                <input type="text" id="result2" class="btn" value="" style="display: block" disabled>
            </th>
        </tr>
        <tr>
            <td><input type="button" class="btn" onclick="setValueNum(this.value)" value="7"></td>
            <td><input type="button" class="btn" onclick="setValueNum(this.value)" value="8"></td>
            <td><input type="button" class="btn" onclick="setValueNum(this.value)" value="9"></td>
            <td><input type="button" class="btn" onclick="setCal(this.value)" value="/"></td>
            <td><input type="button" class="btn" onclick="reset()" value="C"></td>
        </tr>
        <tr>
            <td><input type="button" class="btn" onclick="setValueNum(this.value)" value="4"></td>
            <td><input type="button" class="btn" onclick="setValueNum(this.value)" value="5"></td>
            <td><input type="button" class="btn" onclick="setValueNum(this.value)" value="6"></td>
            <td><input type="button" class="btn" onclick="setCal(this.value)" value="*"></td>
            <td><input type="button" class="btn" onclick="reset()" value="AC"></td>
        </tr>
        <tr>
            <td><input type="button" class="btn" onclick="setValueNum(this.value)" value="1"></td>
            <td><input type="button" class="btn" onclick="setValueNum(this.value)" value="2"></td>
            <td><input type="button" class="btn" onclick="setValueNum(this.value)" value="3"></td>
            <td><input type="button" class="btn" onclick="setCal(this.value)" value="-"></td>
            <td rowspan="2"><input id="equ" onclick="result()" type="button" class="btn" value="="></td>
        </tr>
        <tr>
            <td colspan="2"><input type="button" id="zero" class="btn" onclick="setValueNum(this.value)" value="0"></td>
            <td><input type="button" class="btn" onclick="setValueNum(this.value)" value=","></td>
            <td><input type="button" class="btn" onclick="setCal(this.value)" value="+"></td>
        </tr>
    </table>
    <script type="text/javascript">
        var option = 1;


        function buildPhaTinhToan(){
            $('#result').val($('[name=a]').val() + $('[name=cal]').val() + $('[name=b]').val());
        }

        function setValueNum(value) {
            console.log(value);
            // $('[name=pheptinh]').val(value);
            if (option == 1) {
                $('[name=a]').val($('[name=a]').val() + value);
                buildPhaTinhToan();
            } else {
                $('[name=b]').val($('[name=b]').val() + value);
                buildPhaTinhToan();
            }
        }

        function setCal(cal) {
            if ($('[name=a]').val() == '') {
                return;
            }
            $('[name=cal]').val(cal);
            option = 2;
            buildPhaTinhToan();
        }

        function result() {
            // console.log($('[name=a]').val());
            // $('#result').val($('[name=a]').val());
            var cal = $('[name=cal]').val();
            switch (cal) {
                case '+':
                    $('#result_test').val(parseFloat($('[name=a]').val()) + parseFloat($('[name=b]').val()));
                    break;
                case '-':
                    $('#result_test').val(parseFloat($('[name=a]').val()) - parseFloat($('[name=b]').val()));
                    break;
                case '*':
                    $('#result_test').val(parseFloat($('[name=a]').val()) * parseFloat($('[name=b]').val()));
                    break;
                case '/':
                    $('#result_test').val(parseFloat($('[name=a]').val()) / parseFloat($('[name=b]').val()));
                    break;

                default:
                    break;
            }
            $('#result2').val( $('#result_test').val());
            $('[name=a]').val( $('#result_test').val());
            $('[name=b]').val('');
        }


        function reset() {
            $('[name=a]').val('');
            $('[name=b]').val('');
            $('[name=cal]').val('');
            $('[name=result_test]').val('');
            $('#result').val('');
            $('#result2').val('');
            option = 1;
        }
    </script>
</body>

</html>