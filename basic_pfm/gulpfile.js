var gulp = require('gulp');
var cors = require('cors');
var browsersync = require('browser-sync').create();
var mockServer = require('gulp-mock-server');
var moment = require("moment")

// サーバーを立ち上げる
gulp.task('build-server', function (done) {
    browsersync.init({
        server: {
            baseDir: "./src/"
        }
    });
    done();
    console.log('Server was launched');
});

// api用のサーバーを立ち上げる
gulp.task('api', function(done){
    gulp.src('.')
      .pipe(mockServer({
        port:8090,
        mockDir: './src/MockAPI',
        allowCrossOrigin: true,
      }));
});


// ブラウザのリロード
gulp.task('browser-reload', function(done){
    browsersync.reload();
    done();
    console.log('Browser reload completed');
});

// 監視ファイル
gulp.task('watch-files', function(done){
    gulp.watch("./*/*.html", gulp.task('browser-reload'));
    gulp.watch("./*/*.css", gulp.task('browser-reload'));
    gulp.watch("./src/scripts/*.js", gulp.task('browser-reload'));
    done();
    console.log(('gulp watch started'));
});

// タスクの実行
gulp.task('default', gulp.series('build-server', 'watch-files', 'api', function(done){
    done();
    console.log('Default all task done!');
}));