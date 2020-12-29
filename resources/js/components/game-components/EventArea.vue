<template>
    <div class="h-1/3 w-full container border-8" :class="borderColour">
        <event></event>
    </div>
</template>

<script>
    import Event from "../partials/Event.vue"

    export default {
        components: {
          Event
        },
        props: {},
        computed: {
            borderColour() {
                return 'border-red-600'
                // border-gray-400
                // border-green-500
                // border-blue-400
                // border-pink-400
            }
        }
    }
</script>
