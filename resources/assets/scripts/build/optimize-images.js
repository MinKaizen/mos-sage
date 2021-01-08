const imagemin = require('imagemin');
const imageminJpegtran = require('imagemin-jpegtran');
const imageminPngquant = require('imagemin-pngquant');
const imageminSvgo = require('imagemin-svgo');
 
(async () => {
    const files = await imagemin(['resources/assets/images/*.{jpg,png,svg}'], {
        destination: 'dist/images',
        plugins: [
            imageminJpegtran(),
            imageminPngquant({
                quality: [0.6, 0.8]
            }),
            imageminSvgo()
        ]
    });
 
    console.log(files);
    //=> [{data: <Buffer 89 50 4e …>, destinationPath: 'build/images/foo.jpg'}, …]
})();