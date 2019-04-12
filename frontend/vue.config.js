module.exports = {
  configureWebpack: {
    externals: {
      //前者是内部名字
      // echarts: 'echarts',
      // "v-charts": 'v-charts'
    }
  },

  devServer: {
    proxy: {
      '/api': {
        target: 'http://g.gg/nuaa_guagua/backend/public/',
        // target: 'https://gua.yuwenjie.cc/api',
        pathRewrite: {
          '^/api' : '/',
        },
        changeOrigin: true
      }
    }
  },

  productionSourceMap: false,

  pwa: {
    name: '小红帽',
    themeColor: 'rgba(0,0,0,.87)'
  },

  pluginOptions: {
    i18n: {
      locale: 'zh',
      fallbackLocale: 'en',
      localeDir: 'locales',
      enableInSFC: false
    }
  }
}
