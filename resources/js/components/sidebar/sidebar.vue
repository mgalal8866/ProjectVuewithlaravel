<template>
    <v-navigation-drawer
    v-model="drawer"
    :rail="rail"
    permanent
    @click="rail = false"
  >
    <v-list-item
      prepend-avatar="https://randomuser.me/api/portraits/men/85.jpg"
      title="John Leider"
      nav
    >
      <template v-slot:append>
        <v-btn
          variant="text"
          icon="mdi-chevron-left"
          @click.stop="rail = !rail"
        ></v-btn>
      </template>
    </v-list-item>

    <v-divider></v-divider>

    <v-list density="compact" nav >
        <v-list-item  v-for="(item, i) in items"
            :key="i"
            :title="item.title"
            :prepend-icon="item.icon"
            :value="i"
            :class="{'v-list-item--active': selectedItem === i}"
            @click="selectedItem = i"
            >
        </v-list-item>
    </v-list>

  </v-navigation-drawer>
  <v-main style="height: 250px"></v-main>
  </template>

  <script>
  export default {
    props: {
    rail: Boolean,
     },
    data: () => ({
        // rail: true,
        drawer: true,
        selectedItem: 2,
        items: [
          { title: 'Home', icon: 'mdi-home-city' },
          { title: 'My Account', icon: 'mdi-account' },
          { title: 'Users', icon: 'mdi-account-group-outline' },
        ],
    }),
  };
  </script>
  <style>

</style>
