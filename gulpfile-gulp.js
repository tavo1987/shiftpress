'use strict';

/**
 * [gulp define the dependencies]
 * @type {[var]}
 */
var gulp         = require('gulp'),
    gutil        = require('gulp-util'),
    sass         = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss    = require('gulp-cssnano'),
    sourcemaps   = require('gulp-sourcemaps'),
    jshint       = require('gulp-jshint'),
    stylish      = require('jshint-stylish'),
    uglify       = require('gulp-uglify'),
    concat       = require('gulp-concat'),
    rename       = require('gulp-rename'),
    plumber      = require('gulp-plumber'),
    browserSync = require('browser-sync').create();

/**
 * [Compile Sass, Autoprefix and minify sass inside scss folder on assets]
 *
 */
gulp.task('styles', function() {
  return gulp.src('./resources/assets/sass/**/*.scss')
    .pipe(plumber(function(error) {
        gutil.log(gutil.colors.red(error.message));
        this.emit('end');
    }))
    .pipe(sass())
    .pipe(autoprefixer({
        browsers: ['last 2 versions'],
        ascade: true
    }))
    .pipe(gulp.dest('./public/css/'))
    .pipe(minifycss())
    .pipe(browserSync.stream())
});


/**
 * [JSHint, concat, and minify Foundation Sites]
 * @return {[type]} [description]
 */
gulp.task('foundation-sites-js', function() {
  return gulp.src([
      './node_modules/foundation-sites/dist/js/foundation.js',
  ])
    .pipe(plumber())
    .pipe(jshint())
    .pipe(concat('foundation.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./resources/assets/js/vendor'))
    .pipe(browserSync.stream())
});

/**
 * [JSHint, concat, and minify JavaScript site]
 *
 */
gulp.task('scripts', function() {
  return gulp.src([
    // Grab your custom scripts
    './resources/assets/js/vendor/**/.js',
    './resources/assets/js/**/*.js',
  ])
    .pipe(plumber())
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'))
    .pipe(concat('main.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./public/js'))
    .pipe(browserSync.stream())
});

/**
 * [Create the default task compiled all tasks]
 * @param  {[type]} ){  gulp.start('styles', 'scripts',    'foundation-sites-js');  } [description]
 * @return {[type]}                          [description]
 */

gulp.task('default', function(){
  gulp.start('styles', 'foundation-sites-js', 'scripts');
})

gulp.task('watch', function() {

  browserSync.init({
    proxy: 'http://example.dev',
    host: 'example.dev',
    open: 'external',
    files: [
        './**/*.php',
        './resources/assets/js/**/*.js',
        '/public/css/**/*.css',
        '/resources/assets/sass/**/*.scss'
      ]
  });

  // Watch .scss files
  gulp.watch('./resources/assets/sass/**/*.scss', ['styles']);

    // Watch foundation-js files
  gulp.watch('./node_modules/foundation-sites/js/*.js', ['foundation-sites-js']);

  // Watch site-js files
  gulp.watch('./resources/assets/js/**/*.js', ['scripts']);

});
