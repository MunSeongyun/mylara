<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>첫 화면</title>
</head>
<body>
    <p>안녕하세요!</p>
    @if (Auth::check())
    {{ \Auth::user()->name }}님<p>
    <p><a href="/logout">로그아웃</a></p>
@else
    게스트님</p>
    <p><a href="/login">로그인</a><br><a href="/register">회원등록</a></p>
@endif
</body>
</html>