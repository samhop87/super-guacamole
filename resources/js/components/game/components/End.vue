<template>
    <div class="flex flex-column justify-center align-center items-center h-7/8 sm:h-5/6">
        <div class="my-4 flex flex-column text-center container justify-center align-center items-center">
            <img class="w-24" src="images/skull.jpg">
            <p class="my-2">You were either too weak, too stupid or too unlucky to survive.</p>
            <p class="my-2">Better luck next time, loser.</p>
            <img class="w-24" src="images/you_died.jpg">
        </div>
        <router-link to="/" class="p-2 m-2 rounded-sm border-4 border-white hover:text-white hover:bg-green-500">Try Again?</router-link>
    </div>
</template>
