let gulp = require('gulp');
gulp.task('default', function () {
    console.log('Hello Gulp!')
});

 let elixir = require('laravel-elixir');


elixir(function(mix) {
    mix.sass('app.scss').webpack('app.js'); // resources/assets/js/app.js
});