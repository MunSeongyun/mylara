1. git clone https://github.com/MunSeongyun/mylara.git
2. cd mylara
3. composer install
4. .env.example 파일 복붙하고 파일명 .env로 변경 

DB_ 붙은건 다음과 같이 수정하고
   DB_CONNECTION=mysql
   DB_HOST=mysql
   DB_PORT=3306
   DB_DATABASE=laravel
   DB_USERNAME=hello
   DB_PASSWORD=1234
다음 변수는 추가
   APP_PORT=8999

5. ./vendor/bin/sail up -d
6. ./vendor/bin/sail artisan migrate:fresh --seed
7. ./vendor/bin/sail artisan key:generate
8. localhost:8999/response-demo/string 접속해보기