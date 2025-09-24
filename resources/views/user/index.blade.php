<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>사용자 정보</title>
</head>
<body>
    @if ($user)
        <h1>안녕하세요, {{ $user->name }}님!</h1>
        <p>이메일: {{ $user->email }}</p>
    @else
        <h1>사용자 정보를 찾을 수 없습니다.</h1>
    @endif
</body>
</html>