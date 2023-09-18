<script setup>
import { logIn } from "@/services/base";
const inpEmail = ref("");
const inpPassword = ref("");
const mostrarContraseña = ref(false);
definePageMeta({
  middleware: "auth",
});
const cookie = useCookie("token");

const useLogin = (log) => {
  logIn(log).then((res) => {
    if (res.status === 200) {
      res.json().then((data) => {
        cookie.value = data.accessToken;
        localStorage.setItem("token", data.accessToken);
        localStorage.setItem("nombre", data.user.name);
        navigateTo("/admin");
      });
    } else {
      window.alert("Usuario o contraseña erroneos.");
    }
  });
};
</script>

<template>
  <div
    class="h-screen w-screen flex justify-center items-center text-center font-monse dark:bg-black dark:text-white"
  >
    <div
      class="border dark:border-gray-400 rounded-md flex flex-col p-5 px-10 gap-5 items-center relative shadow-xl dark:bg-gray-950"
    >
      <img src="images/logo.png" alt="" class="w-44 bottom-[244px] absolute" />
      <div class="flex flex-col">
        <div>Usuario</div>
        <input
          type="text"
          class="border rounded-md text-center dark:bg-gray-800"
          v-model="inpEmail"
        />
      </div>
      <div class="flex flex-col">
        <div>Contraseña</div>
        <input
          :type="mostrarContraseña ? 'text' : 'password'"
          class="border rounded-md text-center dark:bg-gray-800"
          v-model="inpPassword"
        />
      </div>
      <div class="flex flex-row items-center gap-2">
        <div>Mostrar contraseña</div>
        <input type="checkbox" v-model="mostrarContraseña" />
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
