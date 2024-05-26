<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    h3{
        text-align: center;
        color: red;
    }
</style>
<body>
    <h3>MAIL grazie per aver compilato il form</h3>
    <ul>
        <!--  -->
        <li>Nome e cognome : {{$name}} </li>
        <li>Email : {{$email}}</li>
        <li>Messaggio : {{$msg}}</li>
    </ul>
</body>
</html>