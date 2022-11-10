<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php + jquery: caculate</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <table>
        <tr>
            <th colspan="5"><input type="text" id="result" class="btn"  disabled></th>
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
            <td><input type="button" class="btn" value="."></td>
            <td><input type="button" class="btn" value="+"></td>
        </tr>
    </table>
    <script type="text/javascript">
        var a=b=pheptinh='';
        // $(document).ready(function() {
            $("input").click(function() {
                // console.log($(this).val());
                var value = $(this).val();
                switch (value) {
                    case "+":
                    case "-":
                    case "*":
                    case "/":
                        if(a == ""){
                            return;
                        }
                        pheptinh=value;
                        break;
                    case "AC":
                    case "C":
                        a='';
                        b='';
                        pheptinh='';
                        break;
                    case "=":
                        // submit data
                        onSubmit();
                        break;
                    default:
                        if(pheptinh != ''){
                            b+=value;
                        }else{
                            a+=value;
                        }
                        break;
                }

                $('#result').val(a + pheptinh + b);
            });
        // });


        function onSubmit(){
            console.log(a+pheptinh+b);
            // onSubmitPost();
            onsubmitGet();
        }

        function onSubmitPost(){
            $.post(
                "process_form_for_jquery.php",
                {
                    'a':a,
                    'b':b,
                    'cal':pheptinh
                },
                function(data, status){
                    console.log(data);
                    console.log('status: ', status);
                    $('#result').val(a+pheptinh+b+"="+data);
                }
            )
        }

        function onsubmitGet(){
            $.get("process_form_for_jquery.php?a="+a+"&b="+b+"&cal="+encodeURIComponent(pheptinh), function(data, status){
                console.log(data);
                console.log(status);
                $('#result').val(a+pheptinh+b+"="+data);
            })
        }
    </script>
</body>

</html>