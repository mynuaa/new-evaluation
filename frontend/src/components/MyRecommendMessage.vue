<!-- 各人推荐模块里的每一个推荐模块 -->
<template>
  <div class="all">
        <div class="topic">
            {{topic1}}
        </div>
        <div class="RightTop">
            x
        </div>
        <div class="content">
            {{content1}}
        </div>    
  </div>
</template>

<script>
export default {
  name: 'MyRecommendMessage',
  props: {
    msg: String,
    content1:String,
    topic1:String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.all{
    height: 200px;
}
</style>