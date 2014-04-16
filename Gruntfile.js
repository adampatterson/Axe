module.exports = function(grunt) {

    grunt.initConfig({

      concat: {
        js: {
          options: {
            separator: ';'
          },
          src: [
            'assets/vendor/jquery/jquery.js',
            'assets/vendor/html5shiv/dist/html5shiv.js',
            'assets/js/source/app.js'
          ],
          dest: 'assets/js/app.min.js'
        }
      },

      uglify: {
        options: {
          mangle: false
        },
        js: {
          files: {
            'assets/js/app.min.js': "assets/js/source/app.js"
          }
        }
      },

      less: {
        dist: {
          files: {
            'assets/css/style.min.css': [
              'assets/less/style.less'
            ],
            'assets/css/responsive.min.css': [
              'assets/less/responsive.less'
            ]
          },
          options: {
            compress: true
          }
        }
      },

      svgmin: {
        options: {
          plugins: [
            { removeViewBox: false },
            { removeUselessStrokeAndFill: false }
          ]
        },
        dist: {
          files: [{
            expand: true,
            cwd: 'assets/img/source',
            src: [
                '**/*.svg'
            ],
            dest: 'assets/img/build',
            ext: '.svg'
          }]
        }
      },

      imagemin: {
        dist: {
          options: {
            optimizationLevel: 7,
            progressive: true
          },
          files: [{
            expand: true,
            cwd: 'assets/img/source',
            src: [
                '**/*.{png,jpg,gif}'
            ],
            dest: 'assets/img/build'
          }]
        }
      },

      copy: {
        images: {
          expand: true,
          flatten: true,
          src: ['_design/*/*'],
          dest: 'assets/img/source/',
          filter: 'isFile'
        }
      },

      watch: {
        // Make sure you load the chrome extension
        // https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei
        options: {
          livereload: true
        },
        image: {
          // Place your Adobe CC files here with asset generation turned on.
          // This will automatically move the images to your assets/img folder.
          files: ['_design/*/*'],
          tasks: ['copy:images']
        },
        js: {
          files: ['assets/js/source/*.js'],
          tasks: ['concat:js', 'uglify:js']
        },
        css: {
          files: ['assets/less/*.less'],
          tasks: ['less']
        },
        // Automatically FTP source? Otherwise run "grunt deploy"
        // 'ftp-images': {
        //     files: ['images/*'],
        //     tasks: ['ftp-deploy:images']
        // },
        // 'ftp-css': {
        //     files: ['css/*'],
        //     tasks: ['ftp-deploy:css']
        // }
      },

      deploy: {
        // Username and Password located in .ftppass
        images: {
          auth: {
            host: 'domainname.com',
            port: 21,
            authKey: 'key1'
          },
          src: 'assets/img/build/',
          dest: 'path/on/server/img',
          exclusions: ['assets/img/.DS_Store']
        },
        css: {
          auth: {
            host: 'domainname.com',
            port: 21,
            authKey: 'key1'
          },
          src: 'assets/css/',
          dest: 'path/on/server/css',
          exclusions: ['assets/css/.DS_Store']
        },
        js: {
          auth: {
            host: 'domainname.com',
            port: 21,
            authKey: 'key1'
          },
          src: 'assets/js/build/',
          dest: 'path/on/server/css',
          exclusions: ['assets/js/.DS_Store']
        }
      }
    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-ftp-deploy');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-svgmin');
    grunt.loadNpmTasks('grunt-grunticon');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    //grunt.loadNpmTasks('grunt-wp-version');
    // grunt.loadNpmTasks('grunt-notify');

    grunt.registerTask('default', ['watch']);
    grunt.registerTask('deploy', ['deploy']);
};
