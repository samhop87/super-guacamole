<template>
    <div class="w-full container border-8">
        <div class="text-lg p-2">
            {{ outcome.info }}
        </div>

        <div class="font-bold p-2">
            {{ stabilityMessage }}
        </div>

        <div class="font-bold p-2">
            {{ popularityMessage }}
        </div>

        <button class="font-bold p-2 my-4 border-8 bg-blue-400 hover:text-white" type="button" @click="proceed">This is the button to proceed</button>
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
