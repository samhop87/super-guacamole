<template>
    <div>
        <div v-if="loading.event">
            <spinner :loading="loading.decision" :colour="borderColour"></spinner>
        </div>
        <div v-else-if="!loading.event">
            <div class="w-full sm:m-auto sm:container border-8" :class="borderColour">
                <div v-if="event && availableImage" class="flex flex-row justify-between items-center">
                <div class="w-1/3 sm:w-1/4">
                    <img class="w-full" :src="availableImage">
                </div>
                    <div class="w-2/3 sm:w-3/4 ml-4">
                <event :event="event"></event>
                    </div>
                </div>
            </div>
            <div class="md:flex md:justify-around" v-if="event">
                <div
                    class="cursor-pointer hover:border-blue-400 md:flex md:flex-row md:w-1/4 my-2 p-3 border-4 rounded border-gray-400"
                    v-for="choice in event.choices"
                    :key="choice.id"
                    @click="makeChoice(choice.outcome)"
                >
                    {{ choice.details }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Event from "../partials/Event.vue"
    import Spinner from "../partials/Spinner"

    export default {
        components: {
            Event,
            Spinner
        },
        props: {
            game: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                loading: {
                    decision: false,
                    event: false
                },
                event: null,
            }
        },
        computed: {
            borderColour() {
                return 'border-red-600'
                // border-gray-400
                // border-green-500
                // border-blue-400
                // border-pink-400
            },
            availableImage() {
                return this.event && this.event.image ? this.event.image : 'images/asteroid.jpg'
            }
        },
        mounted() {
            if (this.game.health.score > 0) {
                this.nextEvent()
            } else {
                this.endGame()
            }
        },
        methods: {
            nextEvent() {
                this.loading.event = true
                axios.get('api/next-event',
                    { params: {
                        health: this.game.health.score,
                        luck: this.game.luck.score,
                        pastEvents: JSON.stringify(this.game.pastEvents)
                    }}).then(({data}) => {
                    this.event = data.data
                    if (this.event.type === "game_over") {
                        this.endGame()
                    }
                    this.loading.event = false
                }).then(() => {
                    this.$emit('remember-event', this.event.id)
                }).catch(({response}) => {
                    console.log(response)
                })
            },
            endGame() {
                // Todo: this isn't working
                console.log(this.event)
                this.$emit('end-game', this.event)
            },
            makeChoice(outcome) {
                this.loading.decision = true
                this.$emit('apply-outcome', outcome)
                this.loading.decision = false
            }
        }
    }
</script>
