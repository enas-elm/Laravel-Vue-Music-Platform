<template>
    <div>

        <Navbar/>
        <h1>All albums</h1>
        <br>

        <div class="inline-flex gap-12 flex-wrap justify-center">
            <div class="w-48 bg-[color:#182340] p-1 pt-3 rounded-sm" v-for="album in albums" :key="album.id">
                <div class="w-40 m-auto gap-y-1 flex flex-col">
                    <a :href="route('album.show', { id: album.id })"> <img :src="asset(album.cover)" alt="Album Cover" class="w-40 h-40 object-cover m-auto rounded-sm"></a>
                    <a :href="route('album.show', { id: album.id })"><p>{{ album.title }}</p></a>
                    <a :href="route('artist.show', { id: artists[album.artist_id -1].id })"><p class="text-xs opacity-50">{{  artists[album.artist_id -1].name  }}</p></a>

                    <!-- <p class="text-xs">{{artists[album.artist_id]}}</p> -->
                 </div>
            </div>
        </div>

    </div>
</template>

<script>

import Navbar from '@/Components/Navbar.vue'
export default{
    name: "Album",
    props:['albums', 'artists'],
    components: {
        Navbar
    }
}
</script>