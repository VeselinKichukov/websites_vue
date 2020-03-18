<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                Home
            </a>
            <a class="navbar-brand" href="/websites">
                All Websites
            </a>
            <a class="navbar-brand" href="/websites/create">
                Crete Website
            </a>
            <a class="navbar-brand" href="/api/websites/">
                All Websites JSON
            </a>
            <a class="navbar-brand" href="/websites?name=asc">
                Websites Name asc
            </a>
            <a class="navbar-brand" href="/websites?name=desc">
                Websites Name desc
            </a>
            <a class="navbar-brand" href="/websites?created=asc">
                Created asc
            </a>
            <a class="navbar-brand" href="/websites?created=desc">
                Created desc
            </a>
        </div>
    </nav>

</template>

<script>
    export default {
    }
</script>

<style scoped>

</style>
