<template>
    <div class="h-screen text-white font-display">
        <div class="w-full h-1/8 sm:h-1/6">
            <div class="flex flex-column h-full justify-center content-center container font-white text-center">
                <h1 class="font-display text:sm sm:text-xl">- An Apocalypse to Remember -</h1>
                <p class="pt-1 font-mobile sm:font-readable">A decision making game</p>
            </div>
        </div>
        <!-- Vue Router used to enable info screens later.-->
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        components: {
        },
        data() {
            return {}
        },
        methods: {}
    }
</script>
