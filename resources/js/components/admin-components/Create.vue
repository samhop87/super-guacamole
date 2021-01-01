<template>
    <div class="container">
        <div class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200">
            <input class="w-full" type="text" placeholder="event name" v-model="event_details.name">
        </div>
        <div class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200">
            <multiselect v-model="event_details.type"
                         :options="event_types"
                         :loading="loading.event_types"
                         class="cursor-pointer"
            >
            </multiselect>
        </div>
        <div class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200">
            <label>Event details:</label>
            <textarea v-model="event_details.detail" class="w-full"></textarea>
        </div>

        <div class="container border-4 rounded border-green-400 my-2">
            <div class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200">
                <label>Choice positive:</label>
                <textarea v-model="event_details.decision.positive.choice" class="w-full"></textarea>
            </div>
            <div class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200">
                <label>Choice positive outcome:</label>
                <textarea v-model="event_details.decision.positive.outcome.text" class="w-full"></textarea>
                <div>
                    <label>Stability effect:</label>
                    <input type="number" placeholder="stability effect" v-model="event_details.decision.positive.outcome.stability_effect">
                </div>
                <div>
                    <label>Popularity effect:</label>
                    <input type="number" placeholder="popularity effect" v-model="event_details.decision.positive.outcome.popularity_effect">
                </div>
            </div>
        </div>

        <div class="container border-4 rounded border-black my-2">
            <div class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200">
                <label>Choice neutral:</label>
                <textarea v-model="event_details.decision.neutral.choice" class="w-full"></textarea>
            </div>
            <div class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200">
                <label>Choice neutral outcome:</label>
                <textarea v-model="event_details.decision.neutral.outcome.text" class="w-full"></textarea>
                <div>
                    <label>Stability effect:</label>
                    <input type="number" placeholder="stability effect" v-model="event_details.decision.neutral.outcome.stability_effect">
                </div>
                <div>
                    <label>Popularity effect:</label>
                    <input type="number" placeholder="popularity effect" v-model="event_details.decision.neutral.outcome.popularity_effect">
                </div>
            </div>
        </div>

        <div class="container border-4 rounded border-red-400 my-2">
            <div class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200">
                <label>Choice negative:</label>
                <textarea v-model="event_details.decision.negative.choice" class="w-full"></textarea>
            </div>
            <div class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200">
                <label>Choice negative outcome:</label>
                <textarea v-model="event_details.decision.negative.outcome.text" class="w-full"></textarea>
                <div>
                    <label>Stability effect:</label>
                    <input type="number" placeholder="stability effect" v-model="event_details.decision.negative.outcome.stability_effect">
                </div>
                <div>
                    <label>popularity effect:</label>
                    <input type="number" placeholder="popularity effect" v-model="event_details.decision.negative.outcome.popularity_effect">
                </div>
            </div>
        </div>

        <div>
            <button type="button" class="my-2 p-3 border-4 rounded border-gray-400 bg-gray-200" @click="submit">
                Submit event
            </button>
        </div>
        {{ this.postResponse }}
    </div>
</template>

<script>
    export default {
        data() {
            return {
                postResponse: null,
                loading: {
                    event_types: false
                },
                event_details: {
                    name: null,
                    type: null,
                    detail: null,
                    decision: {
                        positive: {
                            choice: null,
                            outcome: {
                                text: null,
                                stability_effect: 0,
                                popularity_effect: 0
                            }
                        },
                        neutral: {
                            choice: null,
                            outcome: {
                                text: null,
                                stability_effect: 0,
                                popularity_effect: 0
                            }
                        },
                        negative: {
                            choice: null,
                            outcome: {
                                text: null,
                                stability_effect: 0,
                                popularity_effect: 0
                            }
                        }
                    },
                },
                event_types: []
            }
        },
        mounted() {
            this.getTypes()
        },
        methods: {
            getTypes() {
                this.loading.event_types = true
                axios.get('api/event-types').then(({data}) => {
                    this.event_types = data
                }).then(() => {
                    this.loading.event_types = false
                }).catch(({response}) => {
                    console.log(response)
                })
            },
            submit() {
                axios.post('/api/event', this.event_details).then(({data}) => {
                    this.postResponse = data.message
                }).catch(({ response }) => {
                    console.log(response)
                })
            }
        }
    }
</script>
