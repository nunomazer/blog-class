var appConfig = getAppConfig();

new Vue({
    el: '#app',
    components: {
        'cabecalho': httpVueLoader(appConfig.url + '/js/components/cabecalho.vue'),
        'blog-list': httpVueLoader(appConfig.url + '/js/components/blog-list.vue'),
    },
});
