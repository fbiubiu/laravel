<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    @if(count($errors)>0)
        @foreach($errors->all() as $message)
            {{$message}}
        @endforeach
    @endif
    <form action="\test\post" method="post">
    {{csrf_field()}}
    <input type="text" name="user"><br/>
    <input type="text" name="pwd" > <br/>
    <input type="submit" value="提交">
</form>
</body>
</html>