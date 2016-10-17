module.exports = function(grunt) {

  // Require.
  require('time-grunt')(grunt);
  require('load-grunt-tasks')(grunt);

  // Config.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    watch: {
      scripts: {
        files: ['./js/src/*.js', '!./js/script.gen.js'],
        tasks: ['jshint', 'newer:uglify:site_app']
      }
    },

    concurrent: {
      watch: {
        tasks: ['watch', 'compass:watch'],
        options: {
          logConcurrentOutput: true
        }
      }
    },

    compass: {
      watch: {
        options: {
          watch: true,
          config: 'config.rb'
        }
      }
    },

    uglify: {
      options: {
        mangle: true,
      },

      site_app: {
        files: {
          'js/script.gen.js': [
            'js/src/*.js',
          ]
        }
      }
    },

    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: ['js/src/*.js', '!js/**/*.gen.js']
    },

    notify_hooks: {
      options: {
        enabled: true,
        max_jshint_notifications: 5,
        title: 'TP WordPress Theme',
        success: false,
        duration: 5
      }
    }
  });

  // Default task.
  grunt.registerTask('default', ['concurrent']);
}
