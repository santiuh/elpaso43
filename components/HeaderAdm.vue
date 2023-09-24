<template>
  <div
    class="w-screen border-b dark:border-gray-400 dark:bg-gray-950 shadow-xl flex justify-between p-2"
  >
    <div class="font-monse text-xl dark:text-white">
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
import { logOut } from "@/services/base";
const nombre = computed(() => {
  return localStorage.getItem("nombre");
});

const cookie = useCookie("token");

const useLogOut = (log) => {
  logOut(log).then((res) => {
    if (res.status === 200) {
      cookie.value = null;
      navigateTo("/login");
    }
  });
};
</script>
