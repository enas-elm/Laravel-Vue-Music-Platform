<template>
    <Navbar/>
    <h1>Song : {{song.title}}</h1>
    <div class="inline-flex gap-12 flex-wrap justify-center">
        <div class=" bg-[color:#182340] pr-4 rounded-sm flex items-center gap-2">
            <img :src="asset(song.cover)" alt="Song Cover" class="w-12 h-12 object-cover m-auto rounded-sm">
            <a :href="route('song.show', { id: song.id })"><p>{{ song.title }}</p></a>
        </div>
    </div>

    <br>
    <span @click="showTracklist()">Add to playlist</span>
    <br><br>
    <div class="my-5" v-if="showTracklists" v-for="tracklist in tracklists" :key="tracklist.id">
        <span class="border-b p-2" @click="addToTracklist(tracklist, song)">{{ tracklist.name }}</span>
    </div>
</template>


<script>
import Navbar from '@/Components/Navbar.vue'

export default{
    components: {
        Navbar
    },
    name: 'SongShow',
    props: ['song', 'tracklists'],
    data() {
        return {
            showTracklists: false
        }
    },
    methods: {
        showTracklist() {
            this.showTracklists = true
        },
        addToTracklist(tracklist, song ) {
            this.$inertia.post(route('song.addToTracklist', tracklist, song), {
                song: song,
                tracklist: tracklist
            })
        },
    }
}
</script>