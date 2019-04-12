
<template>
  <div id="demo">
    <tinymce :height="300" v-model="content"/>
  </div>
</template>
 
<script>
import Tinymce from '@tinymce/tinymce-vue';
export default {
  name: "qrcode",
  components: { 
    'tinymce':Tinymce
  },
  data() {
    return {
      content: `<h1 style="text-align: center;">Welcome to the TinyMCE demo!</h1><p style="text-align: center; font-size: 15px;"><img title="TinyMCE Logo" src="//www.tinymce.com/images/glyph-tinymce@2x.png" alt="TinyMCE Logo" width="110" height="97" />`
    };
  },
  methods: {},
  mounted() {}
};
</script>
 
<style scoped>

</style>
