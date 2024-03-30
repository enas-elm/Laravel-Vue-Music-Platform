<template>
    <Navbar/>

    <h1>Album : {{album.title}}</h1>

    <div class="w-48 bg-[color:#182340] p-1 pt-3 rounded-sm m-auto" >
            <div class="w-40 m-auto gap-y-1 flex flex-col">
                <a :href="route('album.show', { id: album.id })"> <img :src="asset(album.cover)" alt="album Cover" class="w-40 h-40 object-cover m-auto rounded-sm"></a>
                <a :href="route('album.show', { id: album.id })"><p>{{ album.name }}</p></a>
            </div>
        </div>
    <!-- If album have songs -->
   
        <h2>Songs in this album </h2>
        <section v-if="form.songs.length">
        <div class="inline-flex gap-12 flex-wrap justify-center">
            <div class=" bg-[color:#182340] pr-4 rounded-sm flex items-center gap-2" v-for="song in album.songs" :key="album.id">
                <img :src="asset(song.cover)" alt="Song Cover" class="w-12 h-12 object-cover m-auto rounded-sm">
                <a :href="route('song.show', { id: song.id })"><p>{{ song.title }}</p></a>
            </div>
        </div>
    </section>
    <section v-else>
        <p class="flex m-auto justify-center">No songs yet in this album</p>
    </section>


</template>

<script>

import Navbar from '@/Components/Navbar.vue'
export default{
    name:"AlbumShow",
    props:['album'],
    components: {
        Navbar
    },
    data() {
        return {
            form: this.$inertia.form({
                songs: this.album.songs
            })
        }
    },
}
</script>