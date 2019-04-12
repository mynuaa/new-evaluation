<template>
  <div class="detail">
    <!-- 具体信息展示页面 -->
    这里是展示 {{this.$route.params.id}} 的详情{{msg}}
  </div>
</template>

<script>
export default {
  data(){
    return{
      msg: 'ok~'
    }
  },
  created(){
    console.log(this)
  }
}
</script>

<style scoped>

</style>
