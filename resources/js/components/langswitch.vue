<template>
 
    <!-- <v-select
    :items="supportedLocales"
    label="selected Language"
    v-model="selectedLanguage"


    >
        <template v-slot:selection="{item}" >
            <span >{{item.title }} </span>
        </template>

        <template v-slot:item="{item}">
             <v-list-item  v-on="on" >
            <v-list-item-content>
                <v-list-item-title  @click="switchLanguage"
                >
                    <span>{{item}}</span>
                 </v-list-item-title>
            </v-list-item-content>
            </v-list-item>
        </template>
</v-select> -->
<select class="custom-select" @change="switchLanguage"  >
   <option v-for="sLocale in supportedLocales" :key="`locale-${sLocale}`" :value="sLocale"
    :selected="locale === sLocale">
        {{ t(`locale.${sLocale}`) }}
    </option>
</select>

</template>
<script>
    import {useI18n} from 'vue-i18n'
import Tr from "@/i18n/translation"
    import { useRouter } from 'vue-router'
export default {
    data() {
    return {
      selectedLanguage: '',}},
    setup() {
        const { t, locale } = useI18n()
        const supportedLocales = Tr.supportedLocales
        const router = useRouter()
        // this.selectedLanguage = locale;
        const switchLanguage = async (event) => {
            const newLocale = event.target.value
            await Tr.switchLanguage(newLocale)
            try {
                await router.replace({ params: { locale: newLocale } })
            } catch (e) {
                console.log(e)
                    router.push("/")
            }
        }
        // console.log(t(locale.value))
    return{ t, locale,supportedLocales, switchLanguage }
},
computed: {
    customText() {
      const i18n = this.$i18n
      return {
        en: i18n.t('customText.en'),
        ar: i18n.t('customText.ar'),

      }
    },
  },
}
</script>
<style>
/* The container must be positioned relative: */
.custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element: */
}

.select-selected {
  background-color: DodgerBlue;
}

/* Style the arrow inside the select element: */
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/* Point the arrow upwards when the select box is open (active): */
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/* style the items (options), including the selected item: */
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
}

/* Style items (options): */
.select-items {
  position: absolute;
  background-color: DodgerBlue;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/* Hide the items when the select box is closed: */
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
</style>
