<template>
  <div
    class="flex lg:flex-row flex-col-reverse lg:mx-52 pb-10 gap-5 lg:gap-16 items-center"
  >
    <div
      class="flex flex-col items-center lg:items-start gap-5 lg:gap-0 lg:justify-right"
    >
      <div
        class="font-adobe font-bold text-4xl lg:text-5xl text-center lg:text-start"
      >
        {{ titulocard }}
      </div>
      <div
        class="text-xl text-center lg:text-start font-monse flex lg:my-7 px-5 lg:px-0"
      >
        {{ textocard }}
      </div>
      <NuxtLink :to="link" class="lg:self-end"
        ><Boton :texto="textoboton"></Boton
      ></NuxtLink>
    </div>
    <div class="lg:max-w-2xl"><img :src="imagen" alt="" /></div>
  </div>
</template>
<script setup>
const props = defineProps([
  "textocard",
  "imagen",
  "titulocard",
  "link",
  "textoboton",
]);
</script>
