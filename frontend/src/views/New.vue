
<template>
  <div id="editor-box">
    <tinymce :height="300" v-model="content"/>
  </div>
</template>
 
<script>
import Tinymce from '@tinymce/tinymce-vue';
export default {
  name: "new",
  components: { 
    'tinymce':Tinymce
  },
  data() {
    return {
      content: `请输入`
    };
  },
  methods: {},
  mounted() {}
};
</script>
 
<style scoped>

</style>
