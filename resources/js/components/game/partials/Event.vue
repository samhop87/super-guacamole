<template>
    <div>
        <p>{{ eventDetail }}</p>
    </div>
</template>

<script>
    export default {
        props: {
            event: {
                type: Object,
                default: null
            }
        },
        mounted() {
            console.log(this.event)
        },
        computed: {
            eventDetail() {
                return this.event ? this.event.detail : 'Waiting on next event...'
            },
        }
    }
</script>
