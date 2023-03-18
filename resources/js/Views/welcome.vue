<template>
    <navb />

  <v-btn @click=" mm()">ssss</v-btn>
  <we   />
</template>
<script>
import we from "../components/w.vue";
import navb from "../components/navbar/nav.vue";
import { useStore } from "Vuex";
export default {
  name: "Welcome",
  components: {we,  navb, },
  methods:{
            mm(){
                alert("dddd");
            }
  },
};
</script>
