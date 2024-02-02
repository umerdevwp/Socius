/*
Gulpfile.js file for the tutorial:
Using Gulp, SASS and Browser-Sync for your front end web development - DESIGNfromWITHIN
http://designfromwithin.com/blog/gulp-sass-browser-sync-front-end-dev

Steps:

1. Install gulp globally:
npm install --global gulp

2. Type the following after navigating in your project folder:
npm init

3. Type the following after making package.json:
npm install gulp gulp-sass gulp-uglify gulp-postcss gulp-autoprefixer gulp-notify gulp-clean-css gulp-concat gulp-plumber gulp-imagemin gulp-sourcemaps browser-sync --save

4. Move this file in your project folder

5. Setup your vhosts or just use static server (see 'Prepare Browser-sync for localhost' below)

6. Type 'Gulp' and start developing
*/

/* Needed gulp config */
var gulp = require('gulp');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var notify = require('gulp-notify');
var minifycss = require('gulp-clean-css');
var concat = require('gulp-concat');
var plumber = require('gulp-plumber');
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;
var onError = function(err) {
    notify.onError({
        title:    "Error!",
        message:  "<%= error.message %>",
        sound:    "Beep"
    })(err);
    this.emit('end');
};


gulp.task('server', function(){
    browserSync.init({
        // replace this with the root directory
        proxy: 'localhost/centennialhi52806',
        //https: true
    });
});


gulp.task('vendor-js', function() {
  return gulp.src('js/vendor/*.js')
    .pipe(plumber({errorHandler: onError}))
    .pipe(concat('vendor.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('js'))
});

gulp.task('js', function() {
  return gulp.src('js/main.js')
    .pipe(plumber({errorHandler: onError}))
    .pipe(uglify())
    .pipe(concat('main.min.js'))
    .pipe(gulp.dest('js/'))
});

gulp.task('vendor-css', function() {
    return gulp.src('css/vendor/*.css')
    .pipe(plumber({errorHandler: onError}))
    .pipe(postcss([ autoprefixer({"browsers" : ['last 2 versions', 'iOS >= 7']}) ]))
    .pipe(minifycss())
    .pipe(concat('vendor.min.css'))
    .pipe(gulp.dest('css/')); // Output RTL stylesheets (rtl.css)
});

gulp.task('sass', function() {
    return gulp.src('scss/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(plumber({errorHandler: onError}))
    .pipe(sass())
    .pipe(postcss([ autoprefixer({"browsers" : ['last 2 versions', 'iOS >= 7']}) ]))
    .pipe(minifycss())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('css/')); // Output RTL stylesheets (rtl.css)
});

gulp.task('wp-editor-sass', function() {
    return gulp.src('css/admin/*.scss')
    .pipe(sourcemaps.init())
    .pipe(plumber({errorHandler: onError}))
    .pipe(sass())
    .pipe(postcss([ autoprefixer({"browsers" : ['last 2 versions', 'iOS >= 7']}) ]))
    .pipe(minifycss())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('css/admin/')); // Output RTL stylesheets (rtl.css)
});

gulp.task('watch', function() {
    gulp.watch('js/vendor/*.js',['vendor-js', reload]);
    gulp.watch('js/main.js',['js', reload]);
    gulp.watch('css/vendor/*.css', ['vendor-css', reload]);
    gulp.watch('scss/**/*.scss', ['sass', 'wp-editor-sass', reload]);
    gulp.watch('css/admin/*.scss', ['wp-editor-sass']);
    gulp.watch('templates/*.php').on('change', reload);
    gulp.watch('template-parts/*.php').on('change', reload);
    gulp.watch('*.php').on('change', reload);
});

gulp.task('webhook', ['vendor-js', 'js', 'vendor-css', 'sass', 'wp-editor-sass']);
// gulp.task('default', ['server', 'vendor-js', 'js', 'vendor-css', 'sass', 'wp-editor-sass', 'watch']);
gulp.task('default', ['vendor-js', 'js', 'vendor-css', 'sass', 'wp-editor-sass', 'watch']);

