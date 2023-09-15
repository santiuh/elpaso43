<script setup>
import { useReservas } from "@/composables/reservas";
const { useLogin } = useReservas();
const inpEmail = ref("");
const inpPassword = ref("");
definePageMeta({
  middleware: "auth",
});
</script>

<template>
  <div
    class="h-screen w-screen flex justify-center items-center text-center font-monse"
  >
    <div
      class="border rounded-md flex flex-col p-5 px-10 gap-5 items-center relative shadow-xl"
    >
      <img src="images/logo.png" alt="" class="w-44 bottom-48 absolute" />
      <div class="flex flex-col">
        <div>Usuario</div>
        <input
          type="text"
          class="border rounded-md text-center"
          v-model="inpEmail"
        />
      </div>
      <div class="flex flex-col">
        <div>Contraseña</div>
        <input
          type="password"
          class="border rounded-md text-center"
          v-model="inpPassword"
        />
      </div>
      <Boton
        texto="Iniciar Sesión"
        class="!py-3"
        :disabled="inpEmail === '' || inpPassword.length < 6"
        @click="useLogin({ email: inpEmail, password: inpPassword })"
      ></Boton>
    </div>
  </div>
</template>
