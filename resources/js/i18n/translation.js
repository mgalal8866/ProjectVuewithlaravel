import i18n from "@/i18n"

const Trans = {
    get supportedLocales() {
        return ["en", "ar"];
    },
    get currentLocale() {
        i18n.global.locale.value;
    },
    set currentLocale(newLocale) {
        i18n.global.locale.value = newLocale;
    },
    isLocaleSupported(locale) {
        return Trans.supportedLocales.includes(locale);
    },
    getUserLocal() {
        const locale =
            window.navigator.language ||
            window.navigator.userLanguage ||
            Trans.defaultLocal;
        return {
            locale: locale,
            localeNoRegion: locale.split("-")[0],
        };
    },
    defaultLocale() {
        return "en";
    },

    getPersistedLocale() {
        const persistedLocale = localStorage.getItem("user-locale");

        if (Trans.isLocaleSupported(persistedLocale)) {
            return persistedLocale;
        } else {
            return null;
        }
    },
    async routeMiddleware(to, _from, next) {
        const paramLocale = to.params.locale;

        if (!Trans.isLocaleSupported(paramLocale)) {
            return next(Trans.guessDefaultLocale());
        }

        await Trans.switchLanguage(paramLocale);

        return next();
    },

    guessDefaultLocale() {
        const userPersistedLocale = Trans.getPersistedLocale();
        if (userPersistedLocale) {
            return userPersistedLocale;
        }

        const userPreferredLocale = Trans.getUserLocale();

        if (Trans.isLocaleSupported(userPreferredLocale.locale)) {
            return userPreferredLocale.locale;
        }

        if (Trans.isLocaleSupported(userPreferredLocale.localeNoRegion)) {
            return userPreferredLocale.localeNoRegion;
        }

        return Trans.defaultLocale;
    },

    async switchLanguage(newLocale) {
        Trans.currentLocale = newLocale;
        document.querySelector("html").setAttribute("lang", newLocale);
        localStorage.setItem("user-locale", newLocale);
    },
    i18nRoute(to) {
        return {
            ...to,
            params: {
                locale: Trans.currentLocale,
                ...to.params,
            },
        };
    },
};
export default Trans