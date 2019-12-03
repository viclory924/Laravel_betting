<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
Name: {{ $data['name'] }}
<br>
E-mail: {{ $data['email'] }}
<br>
Message:<br>
{{ $data['message'] }}
</body>
</html>