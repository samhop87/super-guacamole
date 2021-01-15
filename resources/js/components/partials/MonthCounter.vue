<template>
    <div>
        {{ game.month }}
    </div>
</template>

<script>
    export default {
        props: {
            game: {
                type: Object,
                required: true
            }
        }
    }
</script>
