<template>
    <div>
        <b-progress :value="value" :max="100" variant="success" show-value animated></b-progress>
    </div>
</template>

<script>
    // https://bootstrap-vue.org/docs/components/progress
    export default {
        props: {
          value: {
              type: Number,
              default: 50
          }
        }
    }
</script>
