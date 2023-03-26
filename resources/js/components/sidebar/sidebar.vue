<template   >
    <v-navigation-drawer

    v-model="drawer"
    :rail="rail"
    :permanent=true
    @click="rail = false"
   
  >
    <v-list-item
      prepend-avatar="https://randomuser.me/api/portraits/men/85.jpg"
      title="John Leider"
      nav
    >
    </v-list-item>

    <v-divider></v-divider>

    <v-list density="compact" nav  >
        <v-list-item  v-for="(item, i) in items"
            :key="i"
            :title="t(`${item.title}`)"
            :prepend-icon="item.icon"
            :value="i"
            :class="{'v-list-item--active': selectedItem === i}"
            @click="selectedItem = i"
            >
        </v-list-item>
    </v-list>

  </v-navigation-drawer>
  <v-main dir="rtl" style="height: 250px"></v-main>
  </template>

  <script>
  import { useI18n } from 'vue-i18n';
  export default {
    props: {
    rail: Boolean,
      },
     setup() {
          const { t } = useI18n()
          return {  t }
      },
    data: () => ({

        drawer: true,
        selectedItem: 2,
        items: [
          { title: 'goodbye' , icon: 'mdi-home-city' },
          { title: 'goodbye', icon: 'mdi-account' },
          { title: 'goodbye', icon: 'mdi-account-group-outline' },
        ],
    }),
  };
  </script>
  <style>

</style>
