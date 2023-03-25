<template>

<!-- <select class="custom-select" @change="switchLanguage"  >
   <option v-for="sLocale in supportedLocales" :key="`locale-${sLocale}`" :value="sLocale"
    :selected="locale === sLocale">

        {{ t(`locale.${sLocale}`)  }}
    </option>
</select> -->

<v-menu  >
    <template v-slot:activator="{ props }">
      <v-btn
        
        dark
        v-bind="props">
      <v-icon size="sm" color="#e43">mdi-home-city</v-icon>
        {{t(`locale.${locale}`) }}
      </v-btn>
    </template>

    <v-list  >
      <v-list-item  @click="switchLanguage(item)"
        v-for="(item, index) in supportedLocales"
        :key="index"
      >
      <v-list-item-title ><v-icon size="sm" color="#e43">mdi-home-city</v-icon>{{ item }}</v-list-item-title>

    </v-list-item>
    </v-list>
  </v-menu>
<!-- <v-select
    v-model="selectedLanguage"
    :items="supportedLocales"
    density="compact"
    flat
    :menu-props="{
        closeOnContentClick: true,
       }">
    <template #selection="{item}">
        <div>{{t(`locale.${locale}`) }}</div>
    </template>
    <template #item="{ item }">
        <v-list-item   @click="switchLanguage" >
                <v-list-item-title :value="item.value" :key="`locale-${item.value}`" >{{ item.value }}</v-list-item-title>
        </v-list-item>
    </template>
</v-select> -->

</template>
<script>
    import {useI18n} from 'vue-i18n'
import Tr from "@/i18n/translation"
    import { useRouter } from 'vue-router'
export default {
    data() {
    return {
      selectedLanguage: ''}
    },
    setup() {

        const { t, locale } = useI18n()
        const supportedLocales = Tr.supportedLocales
        const router = useRouter()
        const switchLanguage = async (event) => {

        console.log(event)
            const newLocale =   event
            // (event.target.getAttribute('value') != null) ? event.target.getAttribute('value') :event.target.value
            await Tr.switchLanguage(newLocale)
            try {

                await router.replace({ params: { locale: newLocale } })
            } catch (e) {
                console.log(e)
                    router.push("/")
            }
        }

    return{ t, locale,supportedLocales, switchLanguage }
}

}
</script>
