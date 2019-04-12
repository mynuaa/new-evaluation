
<template>
<v-container grid-list-xs>
  <v-layout row wrap class="warning">
    <v-flex md12>
      <div id="waring_txt">
      <v-card dark color="red" >
        <v-card-text >请确保登录信息与教务处或研究生院网站完全一致。如出现票数投向陌生人的现象，请及时与校团委联系，并提供截图。</v-card-text>
      </v-card>
      </div>
    </v-flex>
  </v-layout>
  <v-layout row wrap >
    <v-flex md2>
      <v-card dark color="blue">
            <v-card-text>我的推荐</v-card-text>
        </v-card>
    </v-flex>
  </v-layout>
  <v-layout row wrap class="SumPoll">
    <v-flex md2>
      <v-card dark color="yellow">
            <v-card-text>我的投票</v-card-text>
        </v-card>
    </v-flex>
    </v-layout>
    <MyRecommendMessage topic1="634342342342343243246" content1="6"></MyRecommendMessage>
  <v-layout  column  wrap class="Recommendation_message">
    <v-flex md12 >
      <v-card dark color="purple">
            <v-card-text>你已投同学院{{same_yuan}}票，不同学院{{different_yuan}}票</v-card-text>
        </v-card>
    </v-flex>
    <v-flex md12>
      <v-card dark color="green">
            <v-card-text>按照规则，总票数一共6票，投向其他学院票数不少于投向本学院票数的50%。</v-card-text>
        </v-card>
    </v-flex>
    <v-flex md12>
      <v-card dark color="orange">
            <v-card-text>你还没给任何人投票哦~</v-card-text>
        </v-card>
    </v-flex>
  </v-layout>
</v-container>
</template>

<script>
import MyRecommendMessage from '../components/MyRecommendMessage'
export default {
  data(){
    return{
      msg: 'ok~',
      same_yuan:6,
      different_yuan:2
    }
  },
  created(){
    // console.log(this)
  },
  components: {
       MyRecommendMessage
  }
}
</script>

<style lang="scss">
.warning_txt{
  height: 10px;
}
</style>
