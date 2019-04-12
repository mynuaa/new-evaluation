<template>
  <div id="app">
    <v-app>
      <div id="nav">
        <!-- 主视图 -->
        <router-link to="/">Home</router-link> |
        <router-link to="/show/111">一篇文章</router-link>|
        <router-link to="/apply">new</router-link>|
        <router-link to="/myrecommendations">我的推荐</router-link>|
        <router-link to="/updateinfo">个人信息</router-link>|
        <router-link to="/about">About</router-link>|
        <a @click="changeLang">切换语言</a>
      </div>
      <router-view/>
    </v-app>
  </div>
</template>

<script>
export default {
  data(){
    return {

    }
  },
  methods: {
    changeLang(){
      if(this.$i18n.locale == 'en'){
        this.$i18n.locale = 'cn'
      }else{
        this.$i18n.locale = 'en'
      }
      
    }
  }
}
</script>

<style lang="scss">
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
#nav {
  padding: 30px;
  a {
    font-weight: bold;
    color: #2c3e50;
    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>
