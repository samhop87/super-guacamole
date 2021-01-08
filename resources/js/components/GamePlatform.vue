<template>
    <div>
        <div class="h-1/6 p-2">
            <progress-bars :stability="game.stability.score" :popularity="game.popularity.score"/>
        </div>
        <div class="h-4/6 flex flex-col justify-between">
            <event-area v-if="!show_outcome"
                        @apply-outcome="presentOutcome"
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
    import ProgressBars from "./game-components/Details";

    export default {
        components: {
            EventArea,
            Outcome,
            ProgressBars
        },
        props: {},
        data() {
            return {
                outcome: null,
                show_outcome: false,
                game: {
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
                }
                this.show_outcome = !this.show_outcome
            }
        }
    }
</script>
