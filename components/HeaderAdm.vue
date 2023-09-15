<template>
  <div class="w-screen border shadow-xl flex justify-between p-2">
    <div class="font-monse text-xl">
      {{ nombre ? nombre : "Sesión no iniciada" }}
    </div>
    <Boton
      texto="Cerrar sesión"
      class="!py-1 !px-1 !text-base"
      @click="useLogOut"
    ></Boton>
  </div>
</template>
<script setup>
import { useReservas } from "@/composables/reservas";
const { useLogOut } = useReservas();
const nombre = computed(() => {
  return localStorage.getItem("nombre");
});
</script>
