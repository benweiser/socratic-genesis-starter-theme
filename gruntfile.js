module.exports = function(grunt) {
    grunt.initConfig({
        // Watch task config
        watch: {
            sass: {
                //     files: "*.scss",
                files: '**/*.scss',
                tasks: ['sass', 'autoprefixer' ]
            },
            concat: {
                files: 'src/*.js',
                tasks: ['concat']
            },
            uglify: {
                files: 'js/*.js',
                tasks: ['uglify']
            }
        },
        // SASS task config
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },

                files: {
                    // destination         // source file
                    "style.css": "style.scss"
                }
            }
        },
        autoprefixer: {
            dist: {
                files: {
                    'style.css': 'style.css'
                }
            }
        },

        concat: {
            basic_and_extras: {
                files: {
                    'js/dist.js': [
                        'src/mobile-menu.js',
                        'src/top-bar.js',
                        'src/src.js'
                    ],
                }
            }
        },

        uglify: {
            options: {
                mangle: false
            },
            my_target: {
                files: {
                    'js/dist.min.js': ['js/dist.js']
                }
            }
        },

        // inside Gruntfile.js
        // Using the BrowserSync Proxy for your existing website url.
        browserSync: {
            default_options: {
                bsFiles: {
                    src: [
                        "*.css",
                        "*.html",
                        "js/*.js",
                        "src/*.js"
                    ]
                },
                options: {
                    watchTask: true,
                    // change this to your project's location example localhost/myproject, or www.yourprojectname.dev
                    proxy: "www.socratic.dev/",
                    tunnel: "local" // < Used for iPhone testing
                }
            }
        }
    });
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-browser-sync');
    // register a default task.
    grunt.registerTask('default', ['browserSync', 'watch']);
};