<template>
  <div class="brief-info">
<!-- 作为在首页或搜索结果页面简短展示的信息块 -->
<!-- 每个信息块仅包含一个人的相关信息 -->
  </div>
</template>

<script>
export default {
  name: 'BriefInfo',
  props: {
    msg: String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
