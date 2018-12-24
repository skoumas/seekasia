'use strict';
 
var gulp = require('gulp');
var sass = require('gulp-sass');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var gulpSequence = require('gulp-sequence')
var livereload = require('gulp-livereload');

var cssDirectories = [
    "./resources/views/main.scss",
    "./resources/views/**/**.scss",
    "./resources/views/**/**/**.scss",
    "./resources/views/**.scss"
];

var jsDirectories = [
    "./resources/views/**/**.js"
];
 
gulp.task('css', function (done) {
    gulp.src(cssDirectories)
        .pipe(concat('app.scss'))
        .pipe(sass())
        .pipe(rename('app.css'))
        .pipe(gulp.dest('./public/css'))
        .pipe(livereload());
    done();
});

gulp.task('js', function (done) {
    gulp.src(jsDirectories)
        .pipe(concat('app.js'))
        .pipe(gulp.dest('./public/js'))
        .pipe(livereload());
    done();
});
 
gulp.task('watch', function (done) {
    livereload.listen();
    gulp.watch(cssDirectories, gulp.series('css'));
    gulp.watch(jsDirectories, gulp.series('js'));
});

gulp.task('default', gulp.parallel('css', 'js','watch'));