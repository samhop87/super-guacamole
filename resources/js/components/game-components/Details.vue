<template>
    <div>
        <div>
            <h1>Stability</h1>
            <value-bar :value="stability"></value-bar>
        </div>
        <div>
            <h1>Popularity</h1>
            <value-bar :value="popularity"></value-bar>
        </div>
    </div>
</template>

<script>
    import ValueBar from "../partials/ValueBar";

    export default {
        components: {
            ValueBar
        },
        props: {
            stability: {
                type: Number,
                default: 50
            },
            popularity: {
                type: Number,
                default: 50
            }
        },
    }
</script>
