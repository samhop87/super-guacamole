<template>
    <div>
        <div v-if="currentGame">
            <div class="w-full mb-4">
                <div class="flex flex-row font-display justify-center">
                    <div class="h-1/6 p-2">
                        <progress-bars :health="game.health.score" :luck="game.luck.score"/>
                    </div>
                </div>
            </div>
            <div class="h-4/6 flex flex-col justify-between font-readable items-center">
                <event-area v-if="!show_outcome"
                            @apply-outcome="presentOutcome"
                            @remember-event="rememberEvent"
                            @end-game="endGame"
                            :game="game"
                />
                <outcome v-else-if="show_outcome"
                         @hide-outcome="presentOutcome"
                         :game="game"
                         :outcome="outcome"
                />
            </div>
        </div>
        <div v-if="!currentGame">
            <end :details="game.finalDetails"></end>
        </div>
    </div>
</template>

<script>
    import EventArea from "./EventArea"
    import Outcome from '../partials/Outcome'
    import ProgressBars from '../partials/Details'
    import End from './End'

    export default {
        components: {
            EventArea,
            ProgressBars,
            Outcome,
            End
        },
        props: {},
        data() {
            return {
                currentGame: true,
                outcome: null,
                show_outcome: false,
                game: {
                    finalDetails: null,
                    month: 'January',
                    pastEvents: [],
                    luck: {
                        score: 50,
                        difference: 0
                    },
                    health: {
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
            endGame(e) {
                console.log(e)
                this.currentGame = false
                this.finalDetails = e
            },
            presentOutcome(outcome) {
                if (outcome) {
                    this.outcome = outcome
                    this.game.luck.difference = outcome.luck_effect
                    this.game.health.difference = outcome.health_effect

                    this.game.luck.score += outcome.luck_effect
                    this.game.health.score += outcome.health_effect

                    if (this.game.luck.score < 0) {
                        this.game.luck.score = 0
                    }

                    if (this.game.health.score < 0) {
                        this.game.health.score = 0
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
