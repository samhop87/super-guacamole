<template>
    <div>
        {{ outcome.info }}

        {{ stabilityMessage }}
        {{ popularityMessage }}
        <button type="button" @click="proceed">This is the button to proceed</button>
    </div>
</template>

<script>
    export default {
        props: {
            outcome: {
                type: Object,
                default: null
            },
            game: {
                type: Object,
                default: null
            }
        },
        computed: {
           stabilityMessage() {
               if (this.game.stability.difference) {
                   return this.game.stability.difference > 0 ? "The country's stability has improved" : "The country has become less stable."
               } else {
                   return "The country's stability is unchanged."
               }
           },
           popularityMessage() {
               if (this.game.popularity.difference) {
                   return this.game.popularity.difference > 0 ? "Your decision has made you more popular." : "People like you less."
               } else {
                   return "Your popularity is unaffected."
               }
           }
        },
        methods: {
            proceed() {
                this.$emit('hide-outcome')
            },
        }
    }
</script>
