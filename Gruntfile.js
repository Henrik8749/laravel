//Gruntfile
module.exports = function(grunt) {

  //Initializing the configuration object
  grunt.initConfig({

    // Task configuration
    concat: {
      options: {
        separator: ';',
      },
      vendor_files: {
        src: [
          './bower_components/jquery/dist/jquery.js',
          './bower_components/bootstrap/dist/js/bootstrap.js',
          './bower_components/bootstrap-fileinput/js/fileinput.js',
          './bower_components/bootstrapvalidator/dist/js/bootstrapValidator.js',
          './bower_components/jquery-touchswipe/jquery.touchSwipe.min.js',
          './bower_components/bootbox/bootbox.js',
        ],
        dest: './public/assets/javascript/vendor.js',
      }
    },
    copy: {
      bootstrap_fonts: {
        cwd: './bower_components/bootstrap/dist/fonts',
        src: '**/*.*',
        dest: './public/assets/fonts/',
        expand: true
      },
      javascript_files: {
        cwd: './app/assets/javascript',
        src: '**',
        dest: './public/assets/javascript',
        expand: true
      }
    },
    less: {
      development: {
        options: {
          compress: true,  //minifying the result
        },
        files: {
          //compiling flashcards.less into flashcards.css
          "./public/assets/stylesheets/flashcards.css":"./app/assets/stylesheets/flashcards.less",
        }
      }
    },
    uglify: {
      options: {
        mangle: false  // Use if you want the names of your functions and variables unchanged
      },
      javascript_files: {
        expand: true,
        cwd: './public/assets/javascript',
        src: '**/*.js',
        dest: './public/assets/javascript'
      }
    },
    watch: {
      js_flashcards: {
        files: ['./app/assets/javascript/**'],
        tasks: [
          'copy:javascript_files',
          'concat:vendor_files',
          //,'uglify:javascript_files'
        ],
        options: {
          livereload: true                        //reloads the browser
        }
      },
      less: {
        files: ['./app/assets/stylesheets/*.less'],  //watched files
        tasks: ['less'],                          //tasks to run
        options: {
          livereload: true                        //reloads the browser
        }
      }
    }
  });

  // Plugin loading
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  // Task definition
  grunt.registerTask('default', ['concat', 'copy', 'less', 'uglify', 'watch']);
};
