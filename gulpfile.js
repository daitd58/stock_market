var gulp = require('gulp');
var sass = require('gulp-sass');
var rename = require('gulp-rename');
var cssnano = require('gulp-cssnano');

gulp.task('styles', function() {
    gulp.src('sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(cssnano())
        .pipe(rename('custom-style.css'))
        .pipe(gulp.dest('assets/css'))
});

//Watch task
gulp.task('watch', function () {
    gulp.watch('./sass/**/*.scss', ['styles']);
});