<template>
  <div
    class="bg-[#14274A] lg:px-52 lg:bg-cover bg-repeat-round lg:bg-no-repeat flex flex-col lg:flex-none"
    :class="modo === 'A' ? 'h-screen lg:pb-36' : ''"
  >
    <div class="flex lg:flex-row flex-col-reverse items-center justify-between">
      <NuxtLink to="/"> <Solapa></Solapa> </NuxtLink>
      <div
        class="flex flex-row lg:gap-4 justify-around bg-mostaza lg:bg-inherit lg:text-white font-monse lg:text-2xl w-full lg:w-auto py-1 lg:py-0"
      >
        <NuxtLink to="/">
          <button
            class="hover:brightness-90"
            :class="$route.path === '/' ? 'underline font-bold' : ''"
          >
            Inicio
          </button>
        </NuxtLink>
        <NuxtLink to="cabanas">
          <button
            class="hover:brightness-90"
            :class="$route.path === '/cabanas' ? 'underline font-bold' : ''"
          >
            Cabañas
          </button>
        </NuxtLink>

        <NuxtLink to="/instalaciones">
          <button
            class="hover:brightness-90"
            :class="
              $route.path === '/instalaciones' ? 'underline font-bold' : ''
            "
          >
            Servicios
          </button>
        </NuxtLink>
        <NuxtLink to="/contacto">
          <button
            class="hover:brightness-90"
            :class="$route.path === '/contacto' ? 'underline font-bold' : ''"
          >
            Contactanos
          </button>
        </NuxtLink>
      </div>
    </div>
    <!-- SPEECH -->
    <div
      class="flex flex-col lg:h-full lg:text-start text-center lg:justify-center lg:gap-y-28 grow justify-evenly"
    >
      <div class="flex flex-col gap-1" v-if="modo === 'A'">
        <div class="text-white font-monse lg:text-5xl text-3xl">
          BIENVENIDO A
        </div>
        <div
          class="text-white font-adobe lg:text-9xl text-[3.5rem] font-bold leading-[3.5rem] lg:leading-none"
        >
          EL PASO 43
        </div>
        <div class="text-white font-adobe lg:text-7xl text-3xl font-bold">
          APART HOTEL
        </div>
        <p class="text-white font-adobe lg:text-2xl text-xl">
          Reservá tu estadía y disfrutá del mar a solo 43 pasos de la playa.
        </p>
      </div>
      <!-- BOTON  -->
      <div class="flex justify-center" v-if="modo === 'A'">
        <NuxtLink to="/contacto">
          <Boton texto="RESERVÁ YA" icono="si"></Boton
        ></NuxtLink>
      </div>
      <!-- SPEECH CONTACTO -->
      <div
        v-if="modo === 'B'"
        class="text-white font-bold font-monse py-14 lg:text-7xl text-4xl text-center"
      >
        CONTACTANOS
      </div>
    </div>
  </div>
</template>
<script setup>
const props = defineProps(["fondo", "modo"]);
</script>
