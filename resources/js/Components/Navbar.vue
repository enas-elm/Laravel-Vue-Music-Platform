<template>
    <div class="gap-12 flex flex-row bold  bg-[color:#182340] p-10">
        <a :href="route('homepage')">Homepage</a>
        <a :href="route('artist.index')">Artists</a>
        <a :href="route('song.index')">Songs</a>
        <a :href="route('album.index')">Albums</a>
        <a :href="route('tracklist.index')">All playlists</a>
        <a :href="route('tracklist.userTracklist')">My playlists</a>
        <a @click="this.$inertia.post('logout')">Logout</a>
    </div>



    <br><br>
</template>

<script>
export default {
    name: 'Navbar',
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
    margin: 5% 5%;
}

h1 {
    font-weight: 900;
    font-size: 3rem;
    text-align: center;
    margin: 5% auto;

}

h2 {
    font-weight: 900;
    font-size: 2rem;
    text-align: center;
    margin: 5% auto;
}

form input {
    color: black;
}

form option {
    color: black;
}

form select {
    color: black;
}
</style>