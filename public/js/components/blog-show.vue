<template>

    <ul v-if="errors && errors.length">
        <li v-for="error of errors">
            {{error.message}}
        </li>
    </ul>
</template>

<script>
    module.exports = {
        name: 'blog-show',
        data: function () {
            return {
                posts: {
                    title: '',
                    content: '',
                    published_at: '',
                    slug: '',
                },
            }
        },
        methods: {
            loadPost: function ($slug) {
                $url = appConfig.url + '/api/post/' + $slug;

                axios.get($url)
                    .then(response => {
                        // JSON responses are automatically parsed.
                        this.posts = response.data.data;
                        this.current_page = response.data.current_page;
                        this.last_page = response.data.last_page;
                        this.first_page_url = response.data.first_page_url;
                        this.prev_page_url = response.data.prev_page_url;
                        this.next_page_url = response.data.next_page_url;
                        this.last_page_url = response.data.last_page_url;
                    })
                    .catch(e => {
                        this.errors.push(e)
                    })
            },
            navegar: function ($url) {
                this.loadPosts($url);
            }

        },
        // Solicita posts ao server após o componente ser criado
        created: function () {
            this.loadPosts();

            // async / await version (created() becomes async created())
            //
            // try {
            //   const response = await axios.get(`http://jsonplaceholder.typicode.com/posts`)
            //   this.posts = response.data
            // } catch (e) {
            //   this.errors.push(e)
            // }
        },
    }
</script>

<style scoped>

</style>