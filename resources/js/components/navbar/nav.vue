<template>
    <v-app-bar

    density="compact"
  >
    <template v-slot:prepend >
      <v-app-bar-nav-icon   @click="$emit('railEvent')"></v-app-bar-nav-icon>
    </template>

    <v-app-bar-title>APP  </v-app-bar-title>

    <template v-slot:append>
      <v-btn icon="mdi-dots-vertical"></v-btn>
        <LangeSwitcher />
    </template>

  </v-app-bar>
</template>
<script>
import LangeSwitcher from "@/components/langswitch.vue"
import Tr from "@/i18n/translation"
export default {
    setup() {
     return{Tr}
    },
    components:{LangeSwitcher }
}
</script>
