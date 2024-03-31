<template>
    <Navbar />
    <h1 class="my-2">Playlist : {{ tracklist.name }}</h1>
    <br>

    <div>
        <div class="gap-12 flex flex-row m-auto mb-2">
            <div class=" m-auto"> <a :href="route('tracklist.edit', { id: tracklist.id })">Edit playlist</a>
                <hr class=" border-green-300">
            </div>
        </div>

        <div class="w-48 bg-[color:#182340] p-1 pt-3 rounded-sm m-auto">
            <div class="w-40 m-auto gap-y-1 flex flex-col">
                <a :href="route('tracklist.show', { id: tracklist.id })"> <img :src="asset(tracklist.cover)"
                        alt="Tracklist Cover" class="w-40 h-40 object-cover m-auto rounded-sm"></a>
                <a :href="route('tracklist.show', { id: tracklist.id })">
                    <p>{{ tracklist.name }}</p>
                </a>
            </div>
        </div>

        <h2 class="my-2 flex">Description</h2>
        <p>{{ tracklist.description }}</p>
    </div>

    <section v-if="form.songs.length">
        <h2 class="my-2 flex mt-5">Songs in this playlist</h2>

        <div class="inline-flex gap-12 flex-wrap justify-center mb-12">
            <div class=" bg-[color:#182340] pr-4 rounded-sm flex items-center gap-2" v-for="song in tracklist.songs"
                :key="tracklist.id">
                <img :src="asset(song.cover)" alt="Song Cover" class="w-12 h-12 object-cover m-auto rounded-sm">
                <a :href="route('song.show', { id: song.id })">
                    <p>{{ song.title }}</p>
                </a>

                <p v-if="this.remove == true" @click="removeToTracklist(tracklist, song)" class="text-xs opacity-20">
                    Remove</p>
            </div>
        </div>


    </section>
    <section v-else>
        <p class="mt-5 flex m-auto justify-center">No songs yet in this tracklist</p>
    </section>
</template>

<script>
import Navbar from '@/Components/Navbar.vue'
export default {
    name: 'TracklistShow',
    props: ['tracklist', 'songs', 'remove'],
    components: {
        Navbar
    },
    data() {
        return {
            form: this.$inertia.form({
                songs: this.tracklist.songs
            })
        }
    },
    methods: {
        removeToTracklist(tracklist, song) {
            this.$inertia.post(route('tracklist.removeToTracklist', tracklist, song), {
                song: song,
                tracklist: tracklist
            })
        },
    }
}
</script>