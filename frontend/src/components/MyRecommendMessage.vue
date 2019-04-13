<!-- 各人推荐模块里的每一个推荐模块 -->
<template>
  <div class="all">
        <v-container grid-list-xs px2>
             <v-layout row wrap class="top">
                    <v-flex md10>
                        <v-card>
                            <v-card-text>{{topic}}</v-card-text>
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
                            <v-card-text>{{content}}</v-card-text>
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
    content:String,
    topic:String
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.all{
    border-style: solid solid solid solid;
    border-color: rgb(161, 161, 161);
    position: relative;
    border-radius: 30px;    
}
.all:hover{
    border-color: rgb(218, 66, 66);
    transition: all 1.6s;
}
</style>