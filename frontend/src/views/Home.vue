<template>
  <v-container>
    <Banner msg="请确保登录信息与教务处或研究生院网站完全一致。如出现票数投向陌生人的现象，请及时与校团委联系，并提供截图。"/>
    <v-img :src="require('../assets/banner.jpg')" height="570" class="grey darken-4"></v-img>
    <v-layout class="filiteryuan">
      <div v-for="(item, index) in items">
        <v-btn color="error">{{item.content}}</v-btn>
      </div>
    </v-layout>
    <v-layout class="readme" align-start justify-start column>
      <div>
        1. 五四评优活动必读：
        <b>
          <a href="/evaluation/notes-2018.docx">活动通知（请点击下载）</a>
        </b>。
      </div>
      <div>2. 时间节点：个人申报、师生推荐截止时间延期到4月15日23：59，学院审核（4.9-4.16），网络投票（4.17-4.19）。</div>
      <div>
        3. 咨询及投诉邮箱：
        <a href="mailto:nuaatw@163.com">nuaatw@163.com</a>。
      </div>
      <div>
        4. 若在操作过程中出现错误，请将错误信息截图，发到
        <a href="mailto:zfj@nuaa.edu.cn">zfj@nuaa.edu.cn</a>，方便技术人员定位错误，及时解决并回复。
      </div>
    </v-layout>
    <v-layout align-start justify-center row class="sousuo">
      <v-toolbar-side-icon md2 xs4></v-toolbar-side-icon>
      <v-toolbar-title class="title mr-4" md4 xs8>学号搜索</v-toolbar-title>
      <v-text-field label="Solo" placeholder="Placeholder" solo md4 xs8></v-text-field>
      <v-toolbar-side-icon md2 xs4></v-toolbar-side-icon>
    </v-layout>

    <div class="card-container">
      <div xs12 md6 v-for="person in persons">
        <v-card class="mx-auto" color="#26c6da" dark max-width="400">
          <v-card-title>
            <v-icon large left>mdi-twitter</v-icon>
            <span class="title font-weight-light">Twitter</span>
          </v-card-title>

          <v-card-text
            class="headline font-weight-bold"
          >"Turns out semicolon-less style is easier and safer in TS because most gotcha edge cases are type invalid as well."</v-card-text>

          <v-card-actions>
            <v-list-tile class="grow">
              <v-list-tile-avatar color="grey darken-3">
                <v-img
                  class="elevation-6"
                  src="https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light"
                ></v-img>
              </v-list-tile-avatar>

              <v-list-tile-content>
                <v-list-tile-title>Evan You</v-list-tile-title>
              </v-list-tile-content>

              <v-layout align-center justify-end>
                <v-icon class="mr-1">mdi-heart</v-icon>
                <span class="subheading mr-2">256</span>
                <span class="mr-1">·</span>
                <v-icon class="mr-1">mdi-share-variant</v-icon>
                <span class="subheading">45</span>
              </v-layout>
            </v-list-tile>
          </v-card-actions>
        </v-card>
      </div>
    </div>
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
/* .container {
  margin: 0;
} */
.filiteryuan {
  margin: 8px 0;
  border: 1px solid red;
  border-radius: 4px;
}
.readme {
  background-color: #337ab7;
  color: white;
  padding: 10px 8px;
}
.readme div {
  margin: 1px 0;
}
a {
  color: #bf360c;
}
.sousuo {
  margin: 5px 0;
  display: flex;
  flex-direction: row;
}
</style>
