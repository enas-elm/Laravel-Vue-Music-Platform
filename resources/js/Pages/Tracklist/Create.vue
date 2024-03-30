<template>
    <Navbar />
    <h1>Add a playlist</h1>
    <div class="max-w-2xl mx-auto">
        <form @submit.prevent="sendForm()" class="space-y-2">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-400">Name</label>
                <input type="text" name="name" v-model="form.name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-400">Description</label>
                <input type="text" name="description" v-model="form.description"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>

            <div>
                <label for="cover" class="block text-sm font-medium text-gray-400">Cover</label>
                <input type="file" accept="image/*" @change="handleCover" class="mt-1 block w-full">
            </div>

            <div>
                <label for="is_public" class="block text-sm font-medium text-gray-400">Visibility</label>
                <select name="is_public" v-model="form.is_public"
                    class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option :value="1">Public</option>
                    <option :value="0">Private</option>
                </select>
            </div>
            <button
                class="text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 rounded-md py-2 px-4"
                type="submit">Create playlist</button>
        </form>
    </div>

</template>

<script>
import Navbar from '@/Components/Navbar.vue'

export default {
    name: 'TracklistCreate',
    components: {
        Navbar
    },
    props:
        ['user'],
    data() {
        return {
            form: this.$inertia.form({
                name: '',
                description: '',
                cover: null,
                is_public: '',
                user_id: this.user.id,
            })
        }
    },
    mounted() {
        console.log(this.form.errors)
    },
    methods: {
        sendForm() {
            this.form.post(route('tracklist.store'))
        },
        handleCover(event) {
            this.form.cover = event.target.files[0]
        }
    }
}

</script>
