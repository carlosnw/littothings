var gulp = require('gulp'),
    browserSync = require('browser-sync'),
    plugins = require('gulp-load-plugins')(),
    cleanCSS = require('gulp-clean-css'),
    svgSprite = require("gulp-svg-sprites"),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    reload = browserSync.reload,

    theme_path = '../',
    assets_path = theme_path + 'assets/';

// To enable source makes see this work around https://github.com/dlmanning/gulp-sass/issues/28#issuecomment-43951089
// Not using because it fails silently when there are errors in the scss

/**
 * gulp editor-sass
 *
 * Compile just type and normalize for use in the wordpress editor
 */


gulp.task('editor-sass', function () {
    return gulp.src('_scss/wordpress-editor.scss')

        .pipe(sourcemaps.init())

        // Process Sass
        .pipe(plugins.sass({
            errLogToConsole: true
        }))

        // Minify css
        .pipe(cleanCSS())

        // Rename the file
        .pipe(plugins.rename({
            basename: 'littothings-theme-editor',
            suffix: '.min'
        }))

        // Autoprefix
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))

        .pipe(plugins.sourcemaps.write(".", {includeContent: false, sourceRoot: './'}))

        // Move it into the css folder
        .pipe(gulp.dest(assets_path + 'css'))

        // Browser sync
        .pipe(reload({stream: true}));
});


/**
 * gulp sass
 *
 * Process Sass, prefix and combine media queries for production.
 */

gulp.task('sass', function () {
    return gulp.src('_scss/main.scss')

        .pipe(sourcemaps.init())

        // Process Sass
        .pipe(plugins.sass({
            errLogToConsole: true
        }))

        // Minify css
        .pipe(cleanCSS())

        // Rename the file
        .pipe(plugins.rename({
            basename: 'style',
            suffix: '.min'
        }))

        // Autoprefix
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))

        .pipe(plugins.sourcemaps.write(".", {includeContent: false, sourceRoot: './'}))

        // Move it into the css folder
        .pipe(gulp.dest(assets_path + 'css'))

        // Browser sync
        .pipe(reload({stream: true}));
});

/**
 * gulp svg
 *
 * Combine all SVGs in _svg into a single spritesheet, with each symbol ID matching the
 * source filename
 * 
 * Note that gulp-svgstore requires bundled node-gyp to be updated - follow instructions at
 * https://github.com/TooTallNate/node-gyp/wiki/Updating-npm%27s-bundled-node-gyp
 * Also install visual studio express if module fails to install via npm
 */

gulp.task('svg', function () {

    // Compile the spritesheet
    // ------------------------------------
    gulp.src('_svg/compile-sprite/*.svg')

    // Minify SVG
        .pipe(plugins.svgmin())

        // Combine all files into a single symbol spritesheet
        .pipe(svgSprite({

            mode: "symbols",

            svg: {
                symbols: "svg/spritesheet.svg"
            },

            cssFile: false,

            preview: {
                symbols: 'symbols.html'
            }

        }))

        // Store file
        .pipe(gulp.dest(assets_path + 'img/'))

        // Browser sync
        .pipe(reload({stream: true}));


    // Minify individual graphics
    // ------------------------------------
    gulp.src('_svg/code-edit-only/*.svg')

        // // Minify SVG
        .pipe(plugins.svgmin())

        // Store file
        .pipe(gulp.dest(assets_path + 'img/'))

        // Browser sync
        .pipe(reload({stream: true}));

});


/**
 * gulp images
 *
 * Move images from source to template
 */

gulp.task('img', function () {
    return gulp.src('_img/**')

    // Move it into the css folder
    .pipe(gulp.dest(assets_path + 'img'))

    // Browser sync
    .pipe(reload({stream: true}));

});


/**
 * gulp build
 *
 * Build all assets
 */

gulp.task('build', [
  'editor-sass',
  'sass',
  'svg',
  'img'
]);

/**
 * gulp serve
 *
 * Manages browser sync reloads
 */

gulp.task('serve', function() {

    browserSync({

        proxy: 'littothings.local',
        open: false
    });

    // Watch SCSS
    gulp.watch(['_scss/**/**'], ['sass']);

    // Watch SVG
    gulp.watch(['_svg/**/*.svg'], ['svg']);

    // Watch Images
    gulp.watch(['_img/**'], ['img']);

    // Watch changes and reload
    gulp.watch(['../**/**.php', '../assets/js/**/**.js']).on('change', reload);
});
