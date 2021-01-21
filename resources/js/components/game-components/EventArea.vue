<template>
    <div>
        <div v-if="loading.decision">
            <spinner :colour="borderColour"></spinner>
        </div>
        <div v-else-if="!loading.decision">
            <div class="w-full container border-8" :class="borderColour">
                <div class="flex flex-row justify-between items-center">
                <div class="w-1/4">
                    <img class="w-full" src="/images/assistant_cropped.jpg">
                </div>
                    <div class="w-3/4 ml-4">
                <event :event="event" @triggerEvent="nextEvent"></event>
                    </div>
                </div>
            </div>
            <div class="md:flex md:justify-around" v-if="event">
                <div
                    class="cursor-pointer hover:border-blue-400 md:flex md:flex-row md:w-1/3 my-2 p-3 border-4 rounded border-gray-400"
                    v-for="choice in event.choices"
                    :key="choice.id"
                    @click="makeChoice(choice.outcome)"
                >
                    {{ choice.details }}
                </div>
            </div>
            <div v-else>
                <spinner></spinner>
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
                    decision: false
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
            }
        },
        mounted() {
            // This will not be in mounted later
            // The eventarea component manages the flow of the game, makes the api calls.
            // It provides the details to the event component, which is just a vehicle to show the data.
            this.nextEvent()
        },
        methods: {
            nextEvent() {
                axios.get('api/next-event',
                    { params: {
                        stability: this.game.stability.score,
                        popularity: this.game.popularity.score,
                        pastEvents: JSON.stringify(this.game.pastEvents)
                    }}).then(({data}) => {
                    this.event = data.data
                }).then(() => {
                    this.$emit('remember-event', this.event.id)
                }).catch(({response}) => {
                    console.log(response)
                })
            },
            makeChoice(outcome) {
                this.loading.decision = true
                this.$emit('apply-outcome', outcome)
                this.loading.decision = false
            }
        }
    }
</script>
