<template>
    <div class="flex flex-row font-display justify-around">
        <div class="h-1/6 p-2 w-1/4">
            <progress-bars :stability="game.stability.score" :popularity="game.popularity.score"/>
        </div>
        <div class="h-1/6 p-2 w-1/4 flex justify-center self-center">
            <month-counter :game="game"></month-counter>
        </div>
    </div>
</template>

<script>
    import ProgressBars from '../partials/Details'
    import MonthCounter from "../partials/MonthCounter";

    export default {
        components: {
            MonthCounter,
            ProgressBars
        },
        props: {
            game: {
                type: Object,
                required: true
            }
        }
    }
</script>
