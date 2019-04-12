<!-- 各人推荐模块里的每一个推荐模块 -->
<template>
  <div class="all">
        <v-container grid-list-xs>
             <v-layout row wrap class="top">
                    <v-flex md10>
                        <v-card>
                            <v-card-text>{{topic1}}</v-card-text>
                        </v-card>
                    </v-flex>
                    <v-flex md2>
                        <v-card>
                            <v-card-text>X</v-card-text>
                            <!-- 给删除按钮预留的位置 -->
                        </v-card>
                    </v-flex>
             </v-layout>
             <v-layout row wrap class="top">
                 <v-flex md12>
                     <v-card>
                            <v-card-text>{{content1}}</v-card-text>
                        </v-card>
                 </v-flex>
             </v-layout>
        </v-container>
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
    border-style: solid solid solid solid;
    border-color: blue;
    position: relative;
}
.topic{
    position:absolute;
    top:0px;
    left:0px;
    height: 50px;
    width: 80%;
    font-display: 0px;
}
</style>