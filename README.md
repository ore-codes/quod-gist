# Quod-Gist

<p>Laravel based chat app for coders.</p>

## Try it out
[https://quod-gist.herokuapp.com/](https://quod-gist.herokuapp.com/)

## Local installation
To start Quod-Gist locally, it is expected to have the following installed:
  - Docker
  - PHP (version >= 8.0)
  - Node
  - Git

 ### Steps
1. **Clone github repo**
  > git clone https://github.com/Quodline/quod-gist.git

2. **Install dependencies**
  > composer install
  > npm install

3. **Start Laravel Sails**
  > ./vendor/bin/sails up

4. **Create .env** from .env.example and fill .env with your credentials

5. **Run database migrations**
  > sails artisan migrate

6. **Compile assets for production**
  > sails npm run prod

7. **Visit the site** at [http://localhost](http://localhost)

## Technology stack

![](https://img.shields.io/badge/Backend-Laravel-informational?style=flat&logo=laravel&logoColor=white&color=2bbc8a)
![](https://img.shields.io/badge/Frontend-Vue-informational?style=flat&logo=vue.js&logoColor=white&color=2bbc8a)
![](https://img.shields.io/badge/UI-Tailwind-informational?style=flat&logo=tailwind-css&logoColor=white&color=2bbc8a)

## Hosted on Heroku!
[https://quod-gist-chat.herokuapp.com](https://quod-gist-chat.herokuapp.com)
