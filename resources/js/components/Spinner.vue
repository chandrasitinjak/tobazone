<template>
  <div class="spinner" v-show="shown"></div>
</template>

<script>
import EventBus from "../eventBus";

export default {
  data() {
    return {
      shown: false
    }
  },
  mounted() {
    EventBus.$on('SPINNER', (signal) => {
      this.shown = signal
    })
  }
};
</script>

<style>
.spinner {
  display: block;
  position: fixed;
  z-index: 1000;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: rgba(255, 255, 255, 0.8) url("/images/assets/spinner.gif") 50% 50%
    no-repeat;
}
</style>