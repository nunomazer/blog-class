<template id="cabecalho-template">
    <div class="blog-header">
        <div class="container">
            <h1 class="blog-title">{{ titulo }}</h1>
            <p class="lead blog-description">{{ descricao }}</p>
        </div>
    </div>
</template>

<script>
    module.exports = {
        name: 'cabecalho',
        props: ['titulo','descricao'],
    }
</script>

<style scoped>

</style>