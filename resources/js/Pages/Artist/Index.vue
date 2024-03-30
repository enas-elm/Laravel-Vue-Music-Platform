<template>
  <Navbar/>
    <h1>All Artists</h1>
    <br>
    <div class="inline-flex gap-12 flex-wrap justify-center">
            <div  v-for="artist in artists" :key="artist.id">
                <a :href="route('artist.show', { id: artist.id })"><p>{{ artist.name }}</p></a>
                <hr class=" border-green-300">
            </div>
        </div>
</template>

<script>
import Navbar from '@/Components/Navbar.vue'

export default {
    name: 'Artist',
    props: ["artists"],
    components: {
        Navbar
    },
}
</script>

<style>
h1{
    font-weight: 900;
    font-size: 2rem;
    text-align: center;
}
</style>