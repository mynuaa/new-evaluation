<template>
  <v-container>
    <Banner msg="请确保登录信息与教务处或研究生院网站完全一致。如出现票数投向陌生人的现象，请及时与校团委联系，并提供截图。"/>
    <v-img :src="require('../assets/banner.jpg')" height="570" class="grey darken-4"></v-img>
    <v-layout wrap class="filiteryuan">
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
    <v-layout row align-start justify-center wrap class="sousuo">
      <v-flex md1 xs2>
        <v-toolbar-side-icon></v-toolbar-side-icon>
      </v-flex>
      <v-flex style="height:48px;" md1 xs10>
        <v-toolbar-title style="height:100%;line-height:100%;padding-top:14px;">学号搜索</v-toolbar-title>
      </v-flex>
      <v-flex md1 xs2>
        <v-toolbar-side-icon></v-toolbar-side-icon>
      </v-flex>
      <v-flex md9 xs10>
        <v-text-field label="Solo" placeholder="输入学号或姓名" solo></v-text-field>
      </v-flex>
    </v-layout>

    <v-layout row wrap class="card-container">
      <v-flex md6 xs12 v-for="person in persons">
        <v-card color="#337ab7" :class="{ 'pink': person.gender=='M' }" dark>
          <v-card-title>
            <v-icon large left>mdi-twitter</v-icon>
            <span class="headline font-weight-bold">{{person.title}}</span>
          </v-card-title>

          <v-card-text class="title font-weight-light">{{person.summary}}</v-card-text>

          <v-card-actions>
            <v-list-tile class="grow">
              <v-list-tile-avatar color="grey darken-3">
                <v-img
                  class="elevation-6"
                  src="https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light"
                ></v-img>
              </v-list-tile-avatar>

              <v-list-tile-content>
                <v-list-tile-title>{{person.name}}</v-list-tile-title>
              </v-list-tile-content>

              <v-layout align-center justify-end>
                <v-icon class="mr-1">mdi-heart</v-icon>
                <span class="subheading mr-2">{{person.watch}}</span>
                <span class="mr-1">·</span>
                <v-icon class="mr-1">mdi-share-variant</v-icon>
                <span class="subheading">{{person.recommand}}</span>
              </v-layout>
            </v-list-tile>
          </v-card-actions>
        </v-card>
      </v-flex>
    </v-layout>
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
          content: "全部",
          yuan: 0
        },
        {
          content: "航空宇航学院",
          yuan: 1
        },
        {
          content: "能源与动力学院",
          yuan: 2
        },
        {
          content: "自动化学院",
          yuan: 2
        },
        {
          content: "电子信息工程学院",
          yuan: 2
        },
        {
          content: "机电学院",
          yuan: 2
        },
        {
          content: "材料科学与技术学院",
          yuan: 2
        },
        {
          content: "民航（飞行）学院	",
          yuan: 2
        },
        {
          content: "经济与管理学院",
          yuan: 2
        },
        {
          content: "人文与社会科学学院",
          yuan: 2
        },
        {
          content: "艺术学院",
          yuan: 2
        },
        {
          content: "外国语学院",
          yuan: 2
        },
        {
          content: "航天学院",
          yuan: 2
        },
        {
          content: "计算机科学与技术学院",
          yuan: 2
        },
        {
          content: "马克思主义学院",
          yuan: 2
        },
        {
          content: "国际教育学院",
          yuan: 2
        },
        {
          content: "继续教育学院",
          yuan: 2
        },
        
		        
									
      ],
      persons: [
        {
          title: "南航外院的男孩子是怎样的存在?",
          avater: "",
          name: "刘敏杰",
          gender: true,
          summary:
            "作为外国语学院大一的新生，我带着对语言学习的热爱开始了在南航的第一年，让我来给大家讲讲外国语学院的男生的生活",
          pic: "",
          watch: 233,
          recommand: 19
        },
        {
          title: "南航外院的男孩子是怎样的存在?",
          avater: "",
          name: "刘敏杰",
          gender: "M",
          summary:
            "作为外国语学院大一的新生，我带着对语言学习的热爱开始了在南航的第一年，让我来给大家讲讲外国语学院的男生的生活",
          pic: "",
          watch: 233,
          recommand: 19
        },
        {
          title: "南航外院的男孩子是怎样的存在?",
          avater: "",
          name: "刘敏杰",
          gender: "M",
          summary:
            "作为外国语学院大一的新生，我带着对语言学习的热爱开始了在南航的第一年，让我来给大家讲讲外国语学院的男生的生活",
          pic: "",
          watch: 233,
          recommand: 19
        },
        {
          title: "南航外院的男孩子是怎样的存在?",
          avater: "",
          name: "刘敏杰",
          gender: "F",
          summary:
            "作为外国语学院大一的新生，我带着对语言学习的热爱开始了在南航的第一年，让我来给大家讲讲外国语学院的男生的生活",
          pic: "",
          watch: 233,
          recommand: 19
        },
        {
          title: "南航外院的男孩子是怎样的存在?",
          avater: "",
          name: "刘敏杰",
          gender: "F",
          summary:
            "作为外国语学院大一的新生，我带着对语言学习的热爱开始了在南航的第一年，让我来给大家讲讲外国语学院的男生的生活",
          pic: "",
          watch: 233,
          recommand: 19
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
  margin: 20px 0 5px 0;
}
.v-card {
  margin: 1%;
}
.blue {
  background-color: #337ab7;
}
.pink {
  background-color: #bf360c;
}
</style>
