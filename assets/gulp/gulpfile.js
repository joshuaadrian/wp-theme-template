var
  gulp            = require('gulp'),
  gutil           = require('gulp-util'), // Errors with load plugins... Need to fix
  pngquant        = require('imagemin-pngquant'), // Errors with load plugins... Need to fix
  gulpLoadPlugins = require('gulp-load-plugins'),
  plugins         = gulpLoadPlugins({camelize: true})
;

gulp.task('default', ['watch', 'css', 'js', 'images']);

gulp.task('watch', function() {
  gulp.watch('../css/**/*.scss', ['css']);
  gulp.watch('../js/**/*.js', ['js']);
  gulp.watch('../images/**/*.{jpg,png,gif,svg}', ['images']);
  plugins.livereload.listen();
  gulp.watch('../build/**').on('change', plugins.livereload.changed);
});

gulp.task('css', function() {
  gulp.src('../css/*.scss')
    .pipe(plugins.sourcemaps.init())
    .pipe(plugins.sass({style: 'expanded'})).on('error', gutil.log)
    .pipe(plugins.autoprefixer())
    .pipe(plugins.sourcemaps.write())
    .pipe(plugins.minifyCss({keepBreaks:false}))
    .pipe(gulp.dest('../build/css/'))
  ;
});

gulp.task('js', function() {

  // All Non Concat JS
  gulp.src(['../js/*.js'])
    .pipe(plugins.uglify())
    .pipe(plugins.rename({suffix: ".min"}))
    .pipe(gulp.dest('../build/js/'))
  ;

  // All Concat JS
  // gulp.src(['../js/someFile.js','../js/anotherFile.js' ])
  //   .pipe(plugins.sourcemaps.init())
  //   .pipe(plugins.concat('app.min.js'))
  //   .pipe(plugins.sourcemaps.write())
  //   .pipe(plugins.uglify())
  //   .pipe(gulp.dest('../build/js/'));
  // ;
  
  return gulp.src('../specs/AppSpec.js')
    .pipe(
      jasmine({
        integration: true
      })
    )
  ;

});

gulp.task('images', function () {
  
  return gulp.src('../images/*')
    .pipe(
      plugins.imagemin({
        progressive: true,
        svgoPlugins: [{removeViewBox: false}],
        use: [pngquant()]
      })
    )
    .pipe(
      gulp.dest('../build/images/')
    );

});