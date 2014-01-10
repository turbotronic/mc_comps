module.exports = function(grunt) {
  'use strict';

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    less: {
      compileCore: {
        options: {
          // strictMath: true,
          sourceMap: true,
          outputSourceFiles: true
        },
        files: {
          'style.css': 'less/style.less'
        }
      },
      minify: {
        options: {
          cleancss: true,

        },
        files: {
          'style.min.css': 'style.css'
        }
      }
    },

    concat: {
      dist: {
        src: [
          'js/script.js'
        ],
        dest: 'assets/js/script.js'
      }
    },

    uglify: {
      build: {
        src: 'js/script.js',
        dest: 'js/script.min.js'
      }
    },

    // connect: {
    //   server: {
    //     options: {
    //       port: 8000,
    //       base: ''
    //     }
    //   }
    // },

    watch: {
      reloader: {
        files: ['*.html', '*.php'],
        options: {
          livereload: true
        }
      },
      styles: {
        // Which files to watch (all .less files recursively in the less directory)
        files: ['less/*'],
        tasks: ['less'],
        options: {
          livereload: true
        }
      },
      scripts: {
        // Which files to watch (all .less files recursively in the less directory)
        files: ['js/script.js'],
        tasks: ['concat', 'uglify'],
        options: {
          livereload: true
        }
      }
    }

  });

  require('load-grunt-tasks')(grunt);

  // Default Task(s)
  grunt.registerTask('default', ['less', 'concat', 'uglify']);

};
