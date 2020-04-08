let path = require('path')
function resolve(dir) {
  console.log(__dirname)
  return path.join(__dirname, dir)
}
module.exports = {
  lintOnSave: false,
  chainWebpack: config => {
    config.resolve.alias
      .set('@', resolve('src'))
      .set('assets', resolve('src/assets'))
      .set('components', resolve('src/components'))
      .set('views', resolve('src/views'))
      .set('router', resolve('src/router'))
      .set('store', resolve('src/store'))
      .set('commom', resolve('src/commom'))
      .set('network', resolve('src/network'))
  }
}
