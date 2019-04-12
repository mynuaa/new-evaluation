<template>
  <v-alert :value="true" type="warning">{{msg}}</v-alert>
</template>

<script>
export default {
  name: "banner",
  props: {
    msg:String
  }
};
</script>

<style scoped>
/* .container{
    padding: 0;
    margin: 0;
} */
.v-alert.warning {
  border-radius: 4px;
  background-color: rgb(240, 173, 78);
  padding: 10px;
  margin: 10px 0 15px 0;
}
.warning {
  background-color: rgb(240, 173, 78);
}
</style>


