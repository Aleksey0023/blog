## Блог

<h3>Краткая информация о проекте</h3>

<p>За основу был взят и переработан фронтенд шаблон Bootstrap Edica https://www.bootstrapdash.com/product/edica. Бекенд реализован собственными силами на фреймворке Laravel. Проект ещё находится на стадии доработки, пока работает только страница блога.</p>

<p>Незарегистрированный пользователь может просматривать посты, комментарии и количество лайков.</p>

<p>Зарегистрированный пользователь может лайкать посты и оставлять под ними комментарии. Также у него есть доступ к личному кабинету, в котором отображаются все его комментарии и лайки. При желании он может их удалить через инструменты личного кабинета.</p>

<p>Пользователь с ролью администратора, помимо функционала зарегистрированного пользователя, также имеет доступ к админ панели. Через неё он может добавлять, изменять и удалять пользователей, посты, категории, теги.</p>

<h3>Инструкция по запуску проекта</h3>

<p>При первом запуске проекта необходимо переименовать файл <b>.env.example</b> в <b>.env</b> и прописать в консоли следующие команды:</p>

- composer install<br>
- npm install<br>
- npm run dev<br>
- php artisan key:generate<br>
- php artisan storage:link<br>
- php artisan migrate --seed<br>
- php artisan queue:work<br>
- php artisan serve

<p>При последующих запусках проекта необходимо будет прописать в консоли следующие команды:</p>

- npm run dev<br>
- php artisan queue:work<br>
- php artisan serve

<p>Для входа в роли администратора необходимо ввести email <b>admin@example.com</b>, пароль <b>admin</b></p>

<p>Для подтверждения регистрации аккаунта нового пользователя и получения пароля от учётной записи был использован smtp сервер debugmail. После регистрации на данном сервисе вам нужно изменить параметры в файле .env на те, что будут выданы сервисом, ниже указан пример:</p>

<p>MAIL_MAILER=smtp<br>
MAIL_HOST=app.debugmail.io<br>
MAIL_PORT=25<br>
MAIL_USERNAME= тут будет ваше значение<br>
MAIL_PASSWORD= тут будет ваше значение<br>
MAIL_ENCRYPTION=tls<br>
MAIL_FROM_ADDRESS="john.doe@example.org"<br>
MAIL_FROM_NAME="John Doe"</p>





