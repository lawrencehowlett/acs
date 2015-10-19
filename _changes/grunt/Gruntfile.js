module.exports = function(grunt) {

  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

  grunt.initConfig({
 
    uglify: { 
      options: {
        mangle: false
       , beautify: false
      },
      prod: { 
        files: { 
          '../js/min.js': [
            '../js/lib/jquery.js',
            '../js/lib/underscore.js',
            '../js/lib/hammer.js',
            '../js/lib/hammer.jquery-plugin.js',
            '../js/lib/jquery.bxslider.min.js',
            '../js/lib/imagelightbox.js',
            '../js/lib/jquery.animateNumber.min.js',
            '../js/lib/modernizr.js',
            '../js/lib/throttle.js',
            '../js/lib/shuffle.js',
            '../js/lib/jquery-custom-content-scroller.js',
            '../js/lib/html5lightbox.js',

            '../js/scripts/utils.js',
            '../js/scripts/fluid-videos.js',
            '../js/scripts/searchform.js',
            '../js/scripts/navigated-slider.js',
            '../js/scripts/youtube.js',
            '../js/scripts/contact.js',
            '../js/scripts/resources.js',
            '../js/scripts/logo-slider.js',
            '../js/scripts/lightbox.js',
            '../js/scripts/numbers.js',
            '../js/scripts/blog.js',
            '../js/scripts/tabs.js',
            '../js/scripts/gallery-slider.js',
            '../js/scripts/double-slider.js',
            '../js/scripts/team-slider.js',
            '../js/scripts/history.js',
            '../js/scripts/testimonials.js',
            '../js/scripts/case-studies.js',
            '../js/scripts/shuffle.js'
          ] 
        } 
      }
    },
 
    watch: {
      scripts: {
        files: ['../js/**/*.js', 'Gruntfile.js'],
        tasks: ['uglify']
      },
    }
  });

  grunt.registerTask('default', ['watch']);
}; 