<template>
    <div class="h-screen">
        <div class="w-full h-1/6 bg-green-200">
            <div class="flex flex-column h-full justify-center content-center container">
                <h1 class="font-display">It's Tough at the Top</h1>
                <p>A decision making game</p>
            </div>
        </div>
        <div class="h-1/6 p-2">
            <progress-bars></progress-bars>
        </div>
        <!-- Vue Router used to enable info screens later.-->
        <router-view></router-view>
    </div>
</template>

<script>
    import ProgressBars from "./game-components/Details";

    export default {
        components: {
            ProgressBars
        },
        data() {
            return {}
        },
        methods: {}
    }
</script>
