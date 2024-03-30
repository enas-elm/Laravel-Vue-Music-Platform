<template>
    
    <Navbar/>
    <div>

        <h1>All Songs</h1>
        <br>
        <div class="inline-flex gap-12 flex-wrap justify-center">
            <div class=" bg-[color:#182340] pr-4 rounded-sm flex items-center gap-2" v-for="song in songs" :key="song.id">
                <img :src="asset(song.cover)" alt="Song Cover" class="w-12 h-12 object-cover m-auto rounded-sm">
                <a :href="route('song.show', { id: song.id })"><p>{{ song.title }}</p></a>
            </div>
        </div>  

    </div>
</template>

<script>
import Navbar from '@/Components/Navbar.vue'

export default{
    name: "Song",
    props:['songs'],
    components: {
        Navbar
    },
}
</script>