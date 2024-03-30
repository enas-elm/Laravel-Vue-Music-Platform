<template>

    <Navbar />
    <h1>Homepage</h1>

    <section class="center">
        <a :href="route('artist.index')">
            <h2>Artists</h2>
        </a>
        <br>
        <div class="inline-flex gap-12 flex-wrap justify-center">
            <div v-for="artist in artists.slice(0, 10)" :key="artist.id">
                <a :href="route('artist.show', { id: artist.id })">
                    <p>{{ artist.name }}</p>
                </a>
                <hr class=" border-green-300">
            </div>
        </div>
        <p class="text-center mt-10"><a class=" bg-[color:#62E76B] text-black px-7 py-3 rounded-sm"
                :href="route('artist.index')">View more</a></p>

    </section>
    <br><br>

    <section>
        <a :href="route('song.index')">
            <h2>Songs</h2>
        </a>
        <br>
        <div class="inline-flex gap-12 flex-wrap justify-center">
            <div class=" bg-[color:#182340] pr-4 rounded-sm flex items-center gap-2" v-for="song in songs.slice(0, 10)"
                :key="song.id">
                <img :src="asset(song.cover)" alt="Song Cover" class="w-12 h-12 object-cover m-auto rounded-sm">
                <a :href="route('song.show', { id: song.id })">
                    <p>{{ song.title }}</p>
                </a>
            </div>
        </div>
        <p class="text-center mt-10"><a class=" bg-[color:#62E76B] text-black px-7 py-3 rounded-sm"
                :href="route('song.index')">View more</a></p>
    </section>
    <br><br>

    <section class="center">
        <a :href="route('album.index')">
            <h2>Albums</h2>
        </a>
        <br>
        <div class="inline-flex gap-12 flex-wrap justify-center">
            <div class="w-48 bg-[color:#182340] p-1 pt-3 rounded-sm" v-for="album in albums.slice(0, 10)"
                :key="album.id">
                <div class="w-40 m-auto gap-y-1 flex flex-col">
                    <a :href="route('album.show', { id: album.id })"> <img :src="asset(album.cover)" alt="Album Cover"
                            class="w-40 h-40 object-cover m-auto rounded-sm"></a>
                    <a :href="route('album.show', { id: album.id })">
                        <p>{{ album.title }}</p>
                    </a>
                    <a :href="route('artist.show', { id: artists[album.artist_id - 1].id })">
                        <p class="text-xs opacity-50">{{ artists[album.artist_id - 1].name }}</p>
                    </a>
                </div>
            </div>
        </div>
        <p class="text-center mt-10"><a class=" bg-[color:#62E76B] text-black px-7 py-3 rounded-sm"
                :href="route('album.index')">View more</a></p>
    </section>
    <br><br>

    <section>
        <a :href="route('tracklist.index')">
            <h2>Public playlists</h2>
        </a>
        <br>
        <div class="inline-flex gap-12 flex-wrap justify-center">
            <div class="w-48 bg-[color:#182340] p-1 pt-3 rounded-sm" v-for="tracklist in tracklists.slice(0, 10)"
                :key="tracklist.id">
                <div class="w-40 m-auto gap-y-1 flex flex-col">
                    <a :href="route('tracklist.show', { id: tracklist.id })"> <img :src="asset(tracklist.cover)"
                            alt="Tracklist Cover" class="w-40 h-40 object-cover m-auto rounded-sm"></a>
                    <a :href="route('tracklist.show', { id: tracklist.id })">
                        <p>{{ tracklist.name }}</p>
                    </a>
                </div>
            </div>
        </div>
        <p class="text-center mt-10"><a class=" bg-[color:#62E76B] text-black px-7 py-3 rounded-sm"
                :href="route('tracklist.index')">View more</a></p>
    </section>

</template>

<script>
import Navbar from '@/Components/Navbar.vue'
export default {
    name: "Homepage",
    props: ['artists', 'songs', 'tracklists', 'albums'],
    components: {
        Navbar
    }

}
</script>


<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

* {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    /* text-align: justify; */
    box-sizing: border-box;
}

body {
    background-color: #121725;
    color: white;
    font-family: 'Poppins', sans-serif;
    margin: 0% 5%;
}

h2 {
    font-weight: 900;
    font-size: 2rem;
    text-align: center;
}
</style>