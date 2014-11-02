module.exports = function(grunt) {

    // config
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        banner: '/* <%= pkg.name || javascript %> - v<%= pkg.version %> - ' + '<%= grunt.template.today("yyyy-mm-dd") %> */\n',
        clean: {
            src: ['<%= pkg.webAssetsDir %>/**']
        },
        copy: {
            scripts: {
                files: [
                    {
                        expand: true,
                        src: [
                            '<%= pkg.srcAssetsDir %>/js/app/**',
                            '<%= pkg.srcAssetsDir %>/js/require.config.js',
                            '<%= pkg.srcAssetsDir %>/js/lib/requirejs/require.js',
                            '<%= pkg.srcAssetsDir %>/js/lib/jquery/dist/jquery.js',
                            '<%= pkg.srcAssetsDir %>/js/lib/bootstrap/dist/js/bootstrap.js',
                            '<%= pkg.srcAssetsDir %>/js/lib/bootstrap/js/**'
                        ],
                        dest: '<%= pkg.webDir %>'
                    }
                ]
            },
            extra: {
                files: [
                    {
                        expand: true,
                        flatten: true,
                        src: [
                            '<%= pkg.srcAssetsDir %>/images/*'
                        ],
                        dest: '<%= pkg.webAssetsDir %>/images'
                    },
                    {
                        expand: true,
                        flatten: true,
                        src: [
                            '<%= pkg.srcAssetsDir %>/fonts/*',
                            '<%= pkg.srcAssetsDir %>/js/lib/bootstrap/fonts/*'
                        ],
                        dest: '<%= pkg.webAssetsDir %>/fonts'
                    }
                ]
            }
        },
        uglify: {
            options: {
                banner: '<%= banner %>',
                preserveComments: false
            },
            build: {
                files: [
                    {
                        expand: true,
                        cwd: '<%= pkg.webAssetsDir %>/js/',
                        src: ['**/*.js'],
                        dest: '<%= pkg.webAssetsDir %>/js/'
                    }
                ]
            }
        },
        less: {
            bootstrap: {
                options: {
                    paths: ['<%= pkg.srcAssetsDir %>/less']
                },
                files: {
                    '<%= pkg.srcAssetsDir %>/css/bootstrap.css': '<%= pkg.srcAssetsDir %>/less/bootstrap.less'
                }
            }
        },
        cssmin: {
            combine: {
                options: {
                    banner: '<%= banner %>',
                    keepSpecialComments: 0
                },
                files: {
                    '<%= pkg.webAssetsDir %>/css/main.css': [
                        '<%= pkg.srcAssetsDir %>/css/*'
                    ]
                }
            }
        },
        watch: {
            scripts: {
                files: [
                    '<%= pkg.srcAssetsDir %>/js/**',
                    '!<%= pkg.srcAssetsDir %>/js/lib/**'
                ],
                tasks: ['copy:scripts']
            },
            styles: {
                files: [
                    '<%= pkg.srcAssetsDir %>/less/**',
                    '<%= pkg.srcAssetsDir %>/css/**'
                ],
                tasks: ['less', 'cssmin']
            },
            extra: {
                files: [
                    '<%= pkg.srcAssetsDir %>/images/**',
                    '<%= pkg.srcAssetsDir %>/fonts/**'
                ],
                tasks: ['copy:extra']
            }
        }
    });

    // plugins
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // tasks
    grunt.registerTask('default', ['clean', 'copy', 'uglify', 'less', 'cssmin']);
};
