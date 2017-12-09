<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Lançar post
                    </div>

                    <div class="panel-body">
                        <div class="alert alert-success" v-if="message">{{message}}</div>
                        <form class="form-horizontal">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="col-md-4 control-label">Título</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title"
                                           v-model="form.title"
                                           required autofocus>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                <label for="content" class="col-md-4 control-label">Texto</label>

                                <div class="col-md-6">
                                    <textarea id="content" rows="10" class="form-control"
                                              v-model="form.content"
                                              name="content"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button v-on:click.prevent="postPost" class="btn btn-primary">
                                        Salvar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
        name: 'blog-post',
        data: function () {
            return {
                form: {
                    title: '',
                    content: '',
                },
                message: '',
                errors: [],
            }
        },
        methods: {
            postPost: function () {
                $url = appConfig.url + '/api/post';

                axios.post($url, this.form)
                    .then(response => {
                        this.message = response.data.message;
                        this.form.title = '';
                        this.form.content = '';
                    })
                    .catch(e => {
                        this.errors.push(e)
                    })
            },
            navegar: function ($url) {
                this.loadPosts($url);
            }

        },
    }
</script>

<style scoped>

</style>