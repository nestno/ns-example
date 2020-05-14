let path = require('path')
function resolve(dir) {
  console.log(__dirname)
  return path.join(__dirname, dir)
}
// 增加代码，px转rem配置（需要将px2remloader添加进loaders数组中）
// const px2remLoader = {
//   loader: 'px2rem-loader',
//   options: {
//     remUnit: 192 //根据视觉稿，rem为px的十分之一，1920px  192 rem
//     // remPrecision: 8//换算的rem保留几位小数点
//   }
// }
// 引入等比适配插件
const px2rem = require('postcss-px2rem')

// 配置基本大小
const postcss = px2rem({
  // 基准大小 baseSize，需要和rem.js中相同
  remUnit: 192
})
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
    // config.module
    //   .rule('css')
    //   .test(/\.css$/)
    //   .oneOf('vue')
    //   .resourceQuery(/\?vue/)
    //   .use('px2rem')
    //   .loader('px2rem-loader')
    //   .options({
    //     remUnit: 192
    //   })
  },
  css: {
    loaderOptions: {
      css: {
        // 这里的选项会传递给 css-loader
        importLoaders: 1
      },
      postcss: {
        plugins: [postcss, require('autoprefixer')]
      }
    }
  }
}
