<template>
    <div class="w-full container border-8">
        <div class="font-mobile sm:font-readable md:font-lg p-2">
            {{ outcome.info }}
        </div>

        <div class="font-bold p-2">
            {{ healthMessage }}
        </div>

        <div class="font-bold p-2">
            {{ luckMessage }}
        </div>

        <button class="font-bold p-2 my-4 border-8 bg-blue-400 hover:text-white" type="button" @click="proceed">Proceed</button>
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
           healthMessage() {
               if (this.game.health.difference) {
                   return this.game.health.difference > 0 ? "Your health is boosted" : "You've lost health."
               } else {
                   return "Your health is unchanged."
               }
           },
           luckMessage() {
               if (this.game.luck.difference) {
                   return this.game.luck.difference > 0 ? "Your luck is improving." : "Your luck appears to have gotten worse."
               } else {
                   return "Your luck is unaffected."
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
