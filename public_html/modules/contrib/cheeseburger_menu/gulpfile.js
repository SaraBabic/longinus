var gulp = require("gulp");
var sass = require("gulp-sass");
var autoprefixer = require("gulp-autoprefixer");
var cleanCSS = require("gulp-clean-css");

gulp.task("sass", function (done) {
  gulp
    .src("./scss/**/*.scss")
    .pipe(sass().on("error", sass.logError))
    .pipe(autoprefixer({ grid: "autoplace" }))
    .pipe(
      cleanCSS({
        compatibility: "ie10",
      })
    )
    .pipe(gulp.dest("./css"));
  done();
});
