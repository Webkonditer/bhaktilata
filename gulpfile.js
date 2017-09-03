'use strict';

var gulp = require('gulp');
var concatCss = require('gulp-concat-css');
var concat = require('gulp-concat');
var strip = require('gulp-strip-comments');
var uglify = require('gulp-uglify');

gulp.task('css', function () {
    return gulp.src([
        'public/css/bootstrap.min.css',
        'public/css/jquery-ui.min.css',
        'public/css/animate.css',
        'public/css/css-plugin-collections.css',
        'public/css/menuzord-skins/menuzord-rounded-boxed.css',
        'public/css/menuzord-animations.css',
        'public/css/style-main.css',
        'public/css/preloader.css',
        'public/css/custom-bootstrap-margin-padding.css',
        'public/css/responsive.css',
        'public/js/revolution-slider/css/settings.css',
        'public/js/revolution-slider/css/layers.css',
        'public/js/revolution-slider/css/navigation.css',
        'public/css/colors/theme-skin-green.css',
        'public/css/style.css',
    ]).pipe(concatCss('public.css', {
        inlineImports: true,
        rebaseUrls: true
    }))
        .pipe(gulp.dest('public/css'));
});

gulp.task('js', function() {
    gulp.src([
        'public/js/jquery-2.2.4.min.js',
        'public/js/jquery-ui.min.js',
        'public/js/bootstrap.min.js',
        'public/js/jquery-plugin-collection.js',
        'public/js/revolution-slider/js/jquery.themepunch.tools.min.js',
        'public/js/revolution-slider/js/jquery.themepunch.revolution.min.js',
        'public/js/revolution-slider/js/extensions/*.min.js',
    ]).pipe(strip()).pipe(uglify()).pipe(concat('public.js'))
        .pipe(gulp.dest('public/js'))
});

gulp.task('default', ['css', 'js']);