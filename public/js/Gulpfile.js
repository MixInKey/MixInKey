var gulp = require('gulp');
var concat = require('gulp-concat')
var addStream = require('add-stream');
var ngAnnotate = require('gulp-ng-annotate');
var uglify = require('gulp-uglify');
var gutil = require('gulp-util');
var angularTemplateCache = require('gulp-angular-templatecache');

/**
 * Minify all javascripts/templates & concat them.
 * @return {Stream} src
 */
gulp.task('default', function() {
  var build = ngAnnotate();
  return gulp.src(['./src/*.js', './src/**/*.js', '!./src/plugins/*.js'])
    .pipe(build.on('error', function(e) {
        catchError(build, e);
    }))
    .pipe(addStream.obj(prepareTemplates()))
    .pipe(concat('app.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./dist'));
});

/**
 * Run default when javascripts/templates changes.
 */
gulp.task('watch', ['default'], function() {
  gulp.watch(['./src/**/*.js', './src/*.js'], ['default']);
  gulp.watch(['./src/partials/**/*.html'], ['default']);
});

/**
 * Prepare templates for angular $templateCache.
 * @return {Stream} src
 */
function prepareTemplates() {
  return gulp.src('./src/partials/**/*.html')
    .pipe(angularTemplateCache());
};

function catchError(build, e) {
  gutil.log(e.message);
  build.end();
};
