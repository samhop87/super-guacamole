<template>
    <div>
        <div class="w-full my-4 border-4">
            <info-bar :game="game"></info-bar>
        </div>
        <div class="h-4/6 flex flex-col justify-between">
            <event-area v-if="!show_outcome"
                        @apply-outcome="presentOutcome"
                        @remember-event="rememberEvent"
                        :game="game"
            />
            <outcome v-else-if="show_outcome"
                     @hide-outcome="presentOutcome"
                     :game="game"
                     :outcome="outcome"
            />
        </div>
    </div>
</template>

<script>
    import EventArea from "./game-components/EventArea"
    import Outcome from './partials/Outcome'
    import InfoBar from "./game-components/InfoBar";

    export default {
        components: {
            EventArea,
            InfoBar,
            Outcome
        },
        props: {},
        data() {
            return {
                outcome: null,
                show_outcome: false,
                game: {
                    month: 'January',
                    pastEvents: [],
                    popularity: {
                        score: 50,
                        difference: 0
                    },
                    stability: {
                        score: 50,
                        difference: 0
                    },
                }
            }
        },
        computed: {},
        watch: {},
        mounted() {
            // All lifecycle hooks
        },
        methods: {
            presentOutcome(outcome) {
                if (outcome) {
                    this.outcome = outcome
                    this.game.popularity.difference = outcome.popularity_effect
                    this.game.stability.difference  = outcome.stability_effect

                    this.game.popularity.score += outcome.popularity_effect
                    this.game.stability.score  += outcome.stability_effect

                    if (this.game.popularity.score < 0) {
                        this.game.popularity.score = 0
                    }

                    if (this.game.stability.score < 0) {
                        this.game.stability.score = 0
                    }

                }
                this.show_outcome = !this.show_outcome
            },
            rememberEvent(id) {
                this.game.pastEvents.push(id)
            }
        }
    }
</script>
