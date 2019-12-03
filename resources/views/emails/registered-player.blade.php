<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>

Hi {{ $player['username'] }}, thanks for your registration and welcome.
To finish your registration, you need to open <a href="{{ URL::to('/player/activate/' . urlencode($player['email_hash']) . '/email/'.$player['email']) }}">this link</a> from your email or paste it directly to the browser to activate your account and finish registration.
<br>
<br>
Have a nice day <br>
Lepreconcasino team.
</body>
</html>