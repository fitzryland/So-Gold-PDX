module.exports = function(grunt) {

    // 1. All configuration goes here
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // JavaScript
        concat: {
            // 2. Configuration for concatinating files goes here.
            dist: {
                src: [
                    'wp-content/themes/sogoldpdxcom/js/lib/*.js', // All JS in the libs folder
                    'wp-content/themes/sogoldpdxcom/js/main.js'  // This specific file
                ],
                dest: 'wp-content/themes/sogoldpdxcom/js/production.js',
            }
        },
        uglify: {
            build: {
                src: 'wp-content/themes/sogoldpdxcom/js/production.js',
                dest: 'wp-content/themes/sogoldpdxcom/js/production.min.js'
            }
        },
        // Style
        compass: {
            dist: {}
        },
        autoprefixer: {
            dist: {
                files: {
                    'wp-content/themes/sogoldpdxcom/style.css': 'wp-content/themes/sogoldpdxcom/no-prefix-style.css'
                }
            }
        },

        watch: {
            options: {
                livereload: true,
            },
            css: {
                files: ['wp-content/themes/sogoldpdxcom/*.scss', 'wp-content/themes/sogoldpdxcom/sass/*.scss'],
                tasks: ['compass', 'autoprefixer'],
                options: {
                    spawn: false,
                }
            },
            css_prefix: {
                files: ['wp-content/themes/sogoldpdxcom/no-prefix-style.css'],
                tasks: ['autoprefixer']
            },
            scripts: {
                files: ['wp-content/themes/sogoldpdxcom/js/*.js'],
                tasks: ['concat', 'uglify'],
                options: {
                    spawn: false,
                },
            }
        }

    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-compass');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['concat', 'uglify', 'compass', 'autoprefixer']);

};