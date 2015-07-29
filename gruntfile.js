module.exports = function (grunt) {
  grunt.initConfig({
    // Watch task config
    watch: {
      sass: {
   //     files: "*.scss",
        files: '**/*.scss',
        tasks: ['sass']
      }
    },
    // SASS task config
    sass: {
        dev: {
            files: {
                // destination         // source file
                "style.css" : "style.scss"
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
      proxy: "www.bw-starter.dev/",
      tunnel: "mytun" // < Used for iPhone testing
    }
  }
}
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-browser-sync');
  // register a default task.
  grunt.registerTask('default', ['browserSync', 'watch']);
};