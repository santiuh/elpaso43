<template>
  <div class="relative flex justify-center lg:mx-52 my-16">
    <img class="min-w-full" :src="foto" alt="" />
    <div
      class="absolute bottom-0 font-monse font-bold lg:text-5xl lg:pt-2 text-center"
      :class="
        modo === 'A' ? 'bg-white w-2/3' : 'bg-[#14274A] w-full text-white'
      "
    >
      {{ pie }}
    </div>
  </div>
</template>
<script setup>
const props = defineProps(["foto", "pie", "modo"]);
</script>
