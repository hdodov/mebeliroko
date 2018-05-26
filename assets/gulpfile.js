var gulp = require("gulp");
var sass = require("gulp-sass");
var autoprefixer = require("gulp-autoprefixer");

gulp.task('compile-scss', function () {
    gulp.src([
        'scss/style.scss'
    ])
        .pipe(sass({
            outputStyle: "nested"
        }).on('error', function (error) {
            console.warn(error.messageFormatted);
        }))
        .pipe(autoprefixer({
            browsers: 'Chrome >= 59, Safari >= 9, Edge >= 14, Firefox >= 54, last 2 versions'
        }))
        .pipe(gulp.dest('css/'));
});

gulp.watch('scss/**/*.scss', ['compile-scss']);
gulp.task("default");