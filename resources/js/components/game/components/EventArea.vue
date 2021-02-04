<template>
    <div>
        <div v-if="loading.decision">
            <spinner :colour="borderColour"></spinner>
        </div>
        <div v-else-if="!loading.decision">
            <div class="w-full sm:container border-8" :class="borderColour">
                <div class="flex flex-row justify-between items-center">
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
            },
            availableImage() {
                return this.event ? this.event.image : 'images/asteroid.jpg'
            }
        },
        mounted() {
            this.nextEvent()
        },
        methods: {
            nextEvent() {
                axios.get('api/next-event',
                    { params: {
                        health: this.game.health.score,
                        luck: this.game.luck.score,
                        pastEvents: JSON.stringify(this.game.pastEvents)
                    }}).then(({data}) => {
                    this.event = data.data
                    console.log(this.event)
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
