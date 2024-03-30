<template>
    <Navbar/>
    <h1>{{artist.name}}</h1>
    <br>
    <p>Born in {{artist.birth_date}}</p>
    <p>Music style : {{artist.style}}</p>


    <section v-if="form.albums.length">
        <h2>Albums</h2>

        <div class="inline-flex gap-12 flex-wrap justify-center">
            <div class="w-48 bg-[color:#182340] p-1 pt-3 rounded-sm" v-for="album in artist.albums" :key="artist.id">
                <div class="w-40 m-auto gap-y-1 flex flex-col">
                    <a :href="route('album.show', { id: album.id })"> <img :src="asset(album.cover)" alt="Album Cover" class="w-40 h-40 object-cover m-auto rounded-sm"></a>
                    <a :href="route('album.show', { id: album.id })"><p>{{ album.title }}</p></a>

                    <!-- <p class="text-xs">{{artists[album.artist_id]}}</p> -->
                 </div>
            </div>
        </div>
    </section>
    <section v-else>
        <p>This artist does not have any album</p>
    </section>

    
    <section v-if="form.songs.length">
        <h2>Songs</h2>
        <div class="inline-flex gap-12 flex-wrap justify-center">
            <div class=" bg-[color:#182340] pr-4 rounded-sm flex items-center gap-2" v-for="song in artist.songs" :key="artist.id">
                <img :src="asset(song.cover)" alt="Song Cover" class="w-12 h-12 object-cover m-auto rounded-sm">
                <a :href="route('song.show', { id: song.id })"><p>{{ song.title }}</p></a>
            </div>
        </div>
    </section>
        <section v-else>
        <p class="flex m-auto justify-center">this artist doesn't have any song yet</p>
    </section>


</template>

<script>
import Navbar from '@/Components/Navbar.vue'

export default {
    name: 'ArtistShow',
    props: [
        "artist",
        'songs',
    ],
    components: {
        Navbar
    },
    data() {
        return {
            form: this.$inertia.form({
                albums: this.artist.albums,
                songs: this.artist.songs
            })
        }
    },
}
</script>