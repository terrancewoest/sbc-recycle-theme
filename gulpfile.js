var gulp = require('gulp');
var sass = require('gulp-sass');
var notify = require('gulp-notify');
var postcss = require('gulp-postcss');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('autoprefixer');
var source = require('vinyl-source-stream');
var buffer = require('vinyl-buffer');
var browserify = require('browserify');
var babel = require('babelify');

var paths = {
    sass: './assets/sass/**/*.scss',
    sassSource: './assets/sass/style.scss',
    cssDestination: './',
    js: './assets/js/**/*.*',
    jsSource: './assets/js/main.js',
    jsDestination: './'
};

function compileScripts() {
    browserify(paths.jsSource, { debug: true }).transform(babel)
        .bundle()
        .on('error', function(err) { console.error(err); this.emit('end'); })
        .pipe(source('main.js'))
        .pipe(buffer())
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(paths.jsDestination))
        .pipe(notify('Scripts Processed!'));
}

function compileStyles() {
    gulp.src(paths.sassSource)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss([
            autoprefixer()
        ]))
        .pipe(sourcemaps.write('./'))
        .pipe(notify('Styles Processed!'))
        .pipe(gulp.dest(paths.cssDestination));
}

gulp.task('scripts', function () { return compileScripts(); });
gulp.task('styles', function () { return compileStyles(); });
gulp.task('watch', function() {
  gulp.watch(paths.sass, ['styles']);
  gulp.watch(paths.js, ['scripts']);
});

gulp.task('default', ['styles', 'scripts']);