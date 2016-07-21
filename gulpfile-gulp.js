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
    livereload   = require('gulp-livereload');

/**
 * [Compile Sass, Autoprefix and minify sass inside scss folder on assets]
 * 
 */
gulp.task('styles', function() {
  return gulp.src('./assets/scss/**/*.scss')
    .pipe(plumber(function(error) {
            gutil.log(gutil.colors.red(error.message));
            this.emit('end');
    }))
    .pipe(sass())
    .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: true
        }))
    .pipe(gulp.dest('./public/css'))     
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest('./public/css'))
    .pipe(livereload())
});

/**
 * [JSHint, concat, and minify Jquery]
 * @return {[type]} [description]
 */
gulp.task('jquery-js', function() {
  return gulp.src([
          // Jquery
          './node_modules/jquery/dist/jquery.js',
  ])
    .pipe(plumber())
    .pipe(jshint())
    .pipe(concat('jquery.js'))
    .pipe(gulp.dest('./public/js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('./public/js'))
    .pipe(livereload())
});

/**
 * [JSHint, concat, and minify Foundation Sites]
 * @return {[type]} [description]
 */
gulp.task('foundation-sites-js', function() {
  return gulp.src([
          //What-input
          './node_modules/what-input/what-input.js',

          // Foundation
          './node_modules/foundation-sites/dist/foundation.js',

  ])
    .pipe(plumber())
    .pipe(jshint())
    .pipe(concat('foundation.js'))
    .pipe(gulp.dest('./public/js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('./public/js'))
    .pipe(livereload())
});

/**
 * [JSHint, concat, and minify JavaScript site]
 * 
 */
gulp.task('scripts', function() {
  return gulp.src([ 
           // Grab your custom scripts
        './assets/js/*.js'
  ])
    .pipe(plumber())
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'))
    .pipe(concat('main.js'))
    .pipe(gulp.dest('./public/js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('./public/js'))
    .pipe(livereload())
});    

/**
 * [Create the default task compiled all tasks]
 * @param  {[type]} ){  gulp.start('styles', 'scripts',    'foundation-sites-js');  } [description]
 * @return {[type]}                          [description]
 */
gulp.task('default', function(){
  gulp.start('styles', 'jquery-js', 'foundation-sites-js', 'scripts');  
})

gulp.task('watch', function() {
  //livereload watch
  livereload.listen();

  // Watch .scss files
  gulp.watch('./assets/scss/**/*.scss', ['styles']);

  // Watch jquery-js files
  gulp.watch('./node_modules/jquery/dist/*.js', ['jquery-js']);

  // Watch foundation-js files
  gulp.watch('./node_modules/foundation-sites/js/*.js', ['foundation-sites-js']);
  
  // Watch site-js files
  gulp.watch('./assets/js/*.js', ['scripts']);

});