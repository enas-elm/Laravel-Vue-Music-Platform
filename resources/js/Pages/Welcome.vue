<template>
    <h1>Welcome</h1>
  <p class="text-center mt-10"><a class=" bg-[color:#62E76B] text-black px-7 py-3 rounded-sm text-lg font-bold" :href="route('login')">Login</a></p> 
</template>

<script>
import Navbar from '@/Components/Navbar.vue'

export default{
    name: "Welcome",
    components: {
        Navbar
    },
}
</script>