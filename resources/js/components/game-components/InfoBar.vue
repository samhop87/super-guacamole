<template>
    <div class="flex flex-row font-display justify-between container">
        <div class="h-1/6 p-2 w-1/4">
            <progress-bars :stability="game.stability.score" :popularity="game.popularity.score"/>
        </div>
        <div class="h-1/6 w-1/5 flex flex-col">
            <p class="my-1 text-xs">Your Assistant:</p>
            <img class="w-3/4" src="/images/assistant_cropped.jpg">
        </div>
        <div class="h-1/6 p-2 w-1/4 flex justify-end self-center">
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
