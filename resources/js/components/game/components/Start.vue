<template>
    <div class="flex flex-col justify-center align-center items-center h-7/8 sm:h-5/6">
        <div class="my-4 flex flex-col text-center container justify-center align-center items-center">
            <img class="w-24" src="images/asteroid.jpg">
            <p class="my-2">Civilisation has collapsed and mankind has turned on itself in a fight for survival.</p>
            <p class="my-2">How long can you last before you succumb to your inevitable fate?</p>
            <img class="w-12" src="images/skull.jpg">
        </div>
        <router-link to="/game" class="p-2 m-2 rounded-sm border-4 border-white hover:text-white hover:bg-green-500">Start</router-link>
    </div>
</template>

<script>
    export default {
        methods: {}
    }
</script>
