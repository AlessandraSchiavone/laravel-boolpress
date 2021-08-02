<template>
  <section class="text-center">
       <h2> Loading... </h2>
    </section>
</template>

<script>
export default {
    name: 'Loader'
}
</script>

<style lang="scss" scoped>
    section{
        display:flex;
        flex-direction: column;
        justify-content: center;
        background-color: white;
        width:100%;
        height:100vh;
        position:fixed;
        top:0;
        left:0;
    }
</style>