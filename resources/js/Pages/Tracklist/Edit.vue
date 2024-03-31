<template>
    <Navbar/>

    <h1>Edit playlist</h1>
    <form @submit.prevent="sendForm()">
        <label for="title">Name</label>
        <input type="text" name="name" v-model="form.name">
        <br><br>

        <label for="description">Description</label>
        <input type="text" name="description" v-model="form.description">
        <br><br>

        <label for="cover">Cover</label>
        <input type="file" accept="image/*" @change="form.cover">
        <br><br>

        <label for="is_public">Visibility</label>
        <select name="is_public" v-model="form.is_public">
            <option :value="1">Public</option>
            <option :value="0">Private</option>
        </select>
        <br><br>
        <button class="text-white bg-[color:#182340] p-3 rounded-sm" type="submit">Edit playlist</button>

        
        <section v-if="form.songs.length">
            <h2>Songs in playlist :</h2>
            <div v-for="song in tracklist.songs" :key="tracklist.id">
                {{song.title}}
            </div>
        </section>
        <section v-else>
            <p>There are no songs in this tracklist</p>
        </section>
        <br><br>

        <!-- <h2>All songs:</h2>
        <div v-for="song in songs" :key="song.id">
            <h2>{{song.title}}</h2>
        </div> -->



    </form>
</template>

<script>
import Navbar from '@/Components/Navbar.vue'

export default {
    name: 'TracklistEdit',
    props:
        [
        'user', 
        'tracklist',
        'songs'
    ],
    components: {
        Navbar
    },


    data() {
        return {
            form: this.$inertia.form({
                name: this.tracklist.name,
                description: this.tracklist.description,
                cover: this.tracklist.cover,
                is_public: this.tracklist.is_public,
                user_id: this.tracklist.user.id,

                songs: this.tracklist.songs,
            })
        }
    },
    mounted(){
        console.log(this.form.errors)
    },
    methods: {
    sendForm(){
        this.form.post(route('tracklist.update', this.tracklist.id))
    },
    handleCover(event){
        this.form.cover = event.target.files[0] 
    }
}
}

</script>