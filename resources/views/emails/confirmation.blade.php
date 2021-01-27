<!DOCTYPE html>
<html>
<hed>
    <title></title>
     <body>
            <table>
                <tr>
                    <td>Hi {{$name }}</td>
                </tr>
                <tr>
                    <td>Please Click on below link to acctive your account:</td>
                </tr>
                <tr>
                    <td><a href="{{url('confirm/'.$code)}}">Confirm Account</a> </td>
                </tr>
                <tr>
                    <td>Thanks regard</td>
                </tr>
                <tr>
                    <td>Narstyle shop</td>
                </tr>
            </table>
    </body>
</hed>

</html>
