<template>
    <div>
        <div v-if="loading.decision">
            <spinner :colour="borderColour"></spinner>
        </div>
        <div v-else-if="!loading.decision">
            <div class="w-full container border-8" :class="borderColour">
                <event :event="event" @triggerEvent="nextEvent"></event>
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
        props: {},
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
                axios.get('api/next-event?stats=' + this.stability).then(({data}) => {
                    this.event = data.data
                }).then(() => {
                    console.log('then')
                }).catch(({response}) => {
                    console.log(response)
                })
            },
            makeChoice(outcome) {
                // Here we trigger a loading wheel/hourglass of some kind.
                // We then show the outcome of the choice & apply pop/stab effects to count.
                // TODO: Make a new outcome component.
                // The outcome has a button - 'continue'.
                // Clicking the button fires the next event method and retrieves a new event.
                alert('fired choice')
                this.loading.decision = true
                this.$emit('apply-outcome', outcome)
                this.loading.decision = false
                // Ask for next event?
            }
        },
    }
</script>
