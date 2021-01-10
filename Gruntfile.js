module.exports = function(grunt) {

  grunt.initConfig({
    svgstore: {
      options: {
        svg: {
          width: 0,
          height: 0,
        },
        symbol: {
          fill: 'currentColor',
        },
        cleanup: [
          'fill',
          'width',
          'height',
        ],
      },
      default : {
        files: {
          'resources/views/partials/svg-symbols.blade.php': ['resources/assets/icons/*.svg'],
        },
      },
    },
  });

  grunt.loadNpmTasks('grunt-svgstore');

  grunt.registerTask('default', ['svgstore']);

}