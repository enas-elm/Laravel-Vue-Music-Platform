<template>
    <Navbar/>
    <div class="gap-12 flex flex-row">
        <div><a :href="route('tracklist.create')">Create a new playlist</a>  <hr class=" border-green-300"></div>
        <div><a :href="route('tracklist.userTracklist')">See your playlists</a>  <hr class=" border-green-300"></div>
    </div>
    <h1>All public playlists </h1>
    <div class="inline-flex gap-12 flex-wrap justify-center">
            <div class="w-48 bg-[color:#182340] p-1 pt-3 rounded-sm" v-for="tracklist in tracklists" :key="tracklist.id">
                <div class="w-40 m-auto gap-y-1 flex flex-col">
                    <a :href="route('tracklist.show', { id: tracklist.id })"> <img :src="asset(tracklist.cover)" alt="Tracklist Cover" class="w-40 h-40 object-cover m-auto rounded-sm"></a>
                    <a :href="route('tracklist.show', { id: tracklist.id })"><p>{{ tracklist.name }}</p></a>
                </div>
            </div>
        </div>
</template>

<script>
import Navbar from '@/Components/Navbar.vue'
export default {
    name: 'TracklistIndex',
    props: ['tracklists'],
    components: {
        Navbar
    },
}
</script>