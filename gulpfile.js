// 引入 gulp
var gulp = require('gulp'),
    include = require('gulp-html-tag-include');

// 引入组件
const babel = require('gulp-babel');
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var connect = require('gulp-connect');
var Proxy = require('gulp-connect-proxy');
 
/*gulp.task('connect', function() {
  connect.server({
    root: './',
    livereload: true,
        middleware: function (connect, opt) {
            opt.route = '/proxy';
            var proxy = new Proxy(opt);
            return [proxy];
        }
  });
});
*/
gulp.task('html-include', function() {
    return gulp.src('./pages/*.html')
        .pipe(include())
        .pipe(gulp.dest('./'));
});

gulp.task('watch', ['html-include'], function() {
    gulp.watch('./pages/*.html', ['html-include']);
});

// 检查脚本
gulp.task('lint', function() {
    gulp.src('./js/*.js')
        .pipe(babel({
          presets: ['env']
        }))
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// 编译Sass
gulp.task('sass', function() {
    gulp.src(['node_modules/bootstrap/dist/css/bootstrap.min.css','./scss/*.scss'])
        .pipe(sass())
        .pipe(concat('all.css'))
        .pipe(gulp.dest('./css'));
});

// 合并，压缩文件
gulp.task('scripts', function() {
    gulp.src(['node_modules/jquery/dist/jquery.min.js','node_modules/bootstrap/dist/js/bootstrap.min.js','./js/*.js'])
        /*.pipe(babel({
          presets: ['env']
        }))*/
        .pipe(concat('all.js'))
        .pipe(rename('all.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./dist'));
});


 

// 默认任务
gulp.task('default', function(){
    gulp.run('lint', 'sass', 'scripts','watch');

    // 监听文件变化
    gulp.watch(['./js/*.js','./scss/*.scss'], function(){
        gulp.run('lint', 'sass', 'scripts');
    });
});
