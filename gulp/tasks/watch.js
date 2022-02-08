module.exports = () => {
    $.gulp.task('watch', () => {
        $.gulp.watch($.path.watch.scss, $.gulp.series('scss'));
        $.gulp.watch($.path.watch.js, $.gulp.series('js'));
    });
}