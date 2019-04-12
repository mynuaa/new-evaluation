
<template>
  <div id="editor-box">
    <editor v-model="content" :init="init"/>
  </div>
</template>
 
<script>
import Editor from '@tinymce/tinymce-vue';
export default {
  name: "new",
  components: { 
    'editor':Editor
  },
  data() {
    return {
      content: '请输入',
      init: {
        language_url: '../public/zh_CN.js',
        language: 'zh_CN',
      //  skin_url: '/public/skins/lightgray',
        height: 600,
        plugins: 'link lists image code table wordcount paste advlist',
        toolbar:
          'bold italic underline strikethrough | fontsizeselect | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent blockquote | undo redo | link unlink image code | removeformat',
        branding: false,
        insert_button_items: 'image link | inserttable',
        paste_retain_style_properties: 'all',
        paste_word_valid_elements: '*[*]', 
        paste_data_images: true, 
        paste_convert_word_fake_lists: false, 
        paste_webkit_styles: 'all',
        paste_merge_formats: true,
        nonbreaking_force_tab: false,
        paste_auto_cleanup_on_paste: false,
        //        upload_image_url: '/upload/cloud', // 配置的上传图片的路由

      }
    };
  },
  methods: {


  },
  mounted() {
 
  }
};
</script>
 
<style scoped>

</style>
