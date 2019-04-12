<template>
  <v-container>
    <Banner msg="请确保登录信息与教务处或研究生院网站完全一致。如出现票数投向陌生人的现象，请及时与校团委联系，并提供截图。"/>
    <v-img :src="require('../assets/banner.jpg')" height="480" class="grey darken-4"></v-img>
    <v-layout class="filiteryuan">
      <div v-for="(item, index) in items">
        <v-btn color="error">{{item.content}}</v-btn>
      </div>
    </v-layout>
    <HelloWorld/>
  </v-container>
</template>

<script>
import HelloWorld from "../components/HelloWorld";
import Banner from "../components/banner";

export default {
  data() {
    return {
      items: [
        {
          content: "航天",
          yuan: 1
        },
        {
          content: "航空",
          yuan: 2
        }
      ]
    };
  },
  components: {
    HelloWorld,
    Banner
  }
};
</script>

<style scoped>
.container {
  padding: 0 100px;
}
.filiteryuan{
  margin: 8px 0;
  border: 1px solid red;
  border-radius : 4px;
}
</style>
