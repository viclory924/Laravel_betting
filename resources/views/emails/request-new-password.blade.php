<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>

Hi {{ $player['username'] }}, You requested for a new password.

Your new password is <b>{{ $player['new_password'] }}</b>
<br>
<br>
Have a nice day <br>
Lepreconcasino team.
</body>
</html>