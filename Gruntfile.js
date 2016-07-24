module.exports = function(grunt) {
	grunt.initConfig({
		"bower-install-simple": {
			options: {
				directory: "temp/bower/"
			},
			common: {
				options: {
					production: true,
					interactive: false
				}
			}
		},
		"concat": {
			common: {
				src: [
					"temp/bower/jquery/dist/jquery.min.js",
					"temp/bower/jobtron/jquery.dropotron.min.js",
					"temp/bower/skel/dist/skel.min.js",
					"assets/js/util.js",
					"assets/js/main.js"
				],
				dest: "www/js/bundle.js"
			}
		},
		"uglify" : {
			common: {
				files: {
					"www/js/bundle.js" : ["www/js/bundle.js"]
				}
			}
		},
		"clean": {
			common: {
				src: [
					"www/js/bundle.js",
					"www/fonts",
					"www/css",
					"temp/.sass-cache",
					"temp/bower",
					"temp/cache",
					"node_modules",
					"vendor"
				]
			}
		},
		copy: {
			common: {
				files: [
					{
						cwd: "temp/bower/font-awesome/fonts/",
						src: [
							"**"
						],
						dest: "www/fonts/",
						flatten: true,
						expand: true
					},
					{
						cwd: "temp/bower/font-awesome/css/",
						src: [
							"font-awesome.min.css"
						],
						dest: "www/css/",
						flatten: true,
						expand: true
					},
					{
						cwd: "assets/js/",
						src: [
							"gtm.js"
						],
						dest: "www/js/",
						flatten: true,
						expand: true
					}
				]
			}
		},
		sass: {
			common: {
				options: {
					style: "expanded",
					cacheLocation: "temp/.sass-cache",
					sourcemap: "none"
				},
				files: {
					"www/css/main.css": "assets/sass/main.scss"
				}
			}
		}
	});

	grunt.loadNpmTasks("grunt-bower-install-simple");
	grunt.loadNpmTasks("grunt-contrib-concat");
	grunt.loadNpmTasks("grunt-contrib-uglify");
	grunt.loadNpmTasks("grunt-contrib-clean");
	grunt.loadNpmTasks("grunt-contrib-copy");
	grunt.loadNpmTasks("grunt-contrib-sass");

	grunt.registerTask("default", ["bower-install-simple:common", "concat:common", "uglify:common", "copy:common", "sass:common"]);
};
