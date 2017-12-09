<template>
    <div v-if="posts && posts.length">
        <h3>Página {{current_page}} de {{last_page}}</h3>
        <ul>
            <li v-for="post of posts">
                <a v-bind:href="'blog/'+post.slug">{{post.title}}</a>
                <em>({{post.published_at}})</em>
                <p>
                    {{post.content.substr(0,100)}}...
                </p>
            </li>
        </ul>

        <div class="row">
            <a class="btn btn-sm btn-default" v-bind:class="{disabled: !prev_page_url}" v-on:click="navegar(first_page_url)"> &lt;&lt; </a>
            <a class="btn btn-sm btn-default" v-bind:class="{disabled: !prev_page_url}" v-on:click="navegar(prev_page_url)"> &lt; </a>
            <a class="btn btn-sm btn-default" v-bind:class="{disabled: !next_page_url}" v-on:click="navegar(next_page_url)"> &gt; </a>
            <a class="btn btn-sm btn-default" v-bind:class="{disabled: !next_page_url}" v-on:click="navegar(last_page_url)"> &gt;&gt; </a>
        </div>
    </div>

    <ul v-if="errors && errors.length">
        <li v-for="error of errors">
            {{error.message}}
        </li>
    </ul>
</template>

<script>
    module.exports = {
        name: 'blog-list',
        data: function () {
            return {
                posts: [],
                current_page: 1,
                last_page: 1,
                first_page_url: '',
                prev_page_url: '',
                next_page_url: '',
                last_page_url: '',
                errors: [],
            }
        },
        methods: {
            loadPosts: function ($url) {
                if (!$url) {
                    $url = appConfig.url + '/api/post';
                }

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