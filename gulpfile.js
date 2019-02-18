var gulp = require('gulp');


var sass = require('gulp-sass');

gulp.task('sass', function(){
  gulp.src('./*.scss')
  .pipe(sass())
  .pipe(sass.sync({outputStyle: 'compact'}).on('error', sass.logError))
    .pipe(gulp.dest('./'));
});