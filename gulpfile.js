const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const autoprefixer = require("gulp-autoprefixer");

// Compile SCSS to CSS
gulp.task("sass", function () {
  return gulp
    .src("css-boilerplate/scss/**/*.scss")
    .pipe(sass().on("error", sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest("./"));
});

// Watch for changes in SCSS files
gulp.task("watch", function () {
  gulp.watch("css-boilerplate/scss/**/*.scss", gulp.series("sass"));
});

// Default task
gulp.task("default", gulp.series("sass", "watch"));
