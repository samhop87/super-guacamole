<template>
    <div class="h-4/6 flex flex-col justify-between">
        <event-area></event-area>
    </div>
</template>

<script>
    import EventArea from "./game-components/EventArea";

    export default {
        components: {
            EventArea
        },
        props: {},
        data() {
            return {}
        },
        computed: {},
        watch: {},
        mounted() {
            // All lifecycle hooks
        },
        methods: {}
    }
</script>
