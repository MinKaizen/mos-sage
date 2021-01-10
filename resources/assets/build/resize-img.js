const fs = require('fs');
const path = require( 'path' );
const resizeImg = require('resize-img');
const glob = require('glob');

const sourceDir = 'resources/assets/images';
const targetDir = 'resources/assets/images';
const patternToTest = '_resize-*.@(png|jpg|jpeg)';
const dimensions = [
  480,
  680,
  1080,
  1440,
  1920,
  2400,
];

(async ()=>{
  try {
    glob(path.join(sourceDir, patternToTest), function (err, files) {
      files.forEach(file => {
        // console.log(file)
        // console.log(resizedFilePath(file, 234))

        dimensions.forEach(dimension => {
          doResize(file, dimension)
        })
      })
    })
  }
  catch( e ) {
    console.error( 'Error! Whoops!', e );
  }
})(); // Wrap in parenthesis and call now

async function doResize(file, dimension) {
  const newPath = resizedFilePath(file, dimension)
  const newImage = await resizeImg(fs.readFileSync(file), {
    width: dimension,
  });

  fs.writeFileSync(newPath, newImage);
  console.log('RESIZED: ' + newPath)
}

function resizedFilePath(filePath, size) {
  const fileExt = path.extname(filePath)
  const baseName = path.basename(filePath, fileExt)
  const newBaseName = baseName.replace('_resize-', '') + '-' + size + fileExt
  const newFilePath = path.join(targetDir, newBaseName)
  return newFilePath
}