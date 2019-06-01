var gulp = require('gulp');
var stylus = require('gulp-stylus');
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');
var cssmin = require('gulp-cssmin');

gulp.task('stylus', function() {
  gulp.src('*.styl')
    .pipe(plumber())
    .pipe(stylus())
    .pipe(cssmin())
    .pipe(gulp.dest(''));
});

gulp.task('watch', function(){
  gulp.watch('**/*.styl', function(event) {
    gulp.run('stylus');
  });
});

gulp.task('default', function(){
    gulp.run('watch');
});
