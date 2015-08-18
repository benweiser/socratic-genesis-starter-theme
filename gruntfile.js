module.exports = function (grunt) {
  grunt.initConfig({
    // Watch task config
    watch: {
      sass: {
   //     files: "*.scss",
        files: '**/*.scss',
        tasks: ['sass', 'concat', 'uglify']
      }
    },
    // SASS task config
    sass: {
        dist: {
            options : {
              style: 'compressed'
            },

            files: {
                // destination         // source file
                "style.css" : "style.scss"
            }
        }
    },

    concat: {
    basic_and_extras: {
      files: {
        'js/dist.js': [
        /* Resuable UI Components -- Not using one of these? Comment it out to avoid code bloat! */
        //'src/slickslider.js', 
        'src/mobile-menu.js', 
        'src/scroll-on-page-links.js', 
        'src/accordion-tabs.js', 
        'src/modals/js', 
        'src/parallax.js',
        'src/top-bar.js',
        'src/src.js'],
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
        "js/*.js"
      ]
    },
    options: {
      watchTask: true,
      // change this to your project's location example localhost/myproject, or www.yourprojectname.dev
      proxy: "www.bw-starter.dev/",
      tunnel: "local" // < Used for iPhone testing
    }
  }
}
  });
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  grunt.loadNpmTasks('grunt-browser-sync');
  // register a default task.
  grunt.registerTask('default', [ 'concat', 'uglify', 'browserSync', 'watch' ]);
};