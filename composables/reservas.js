import { ref } from "vue";
import { useRouter } from "nuxt/app";
import {
  getReservas,
  getHabitaciones,
  getReservasPorNombre,
  logIn,
  logOut,
  getCuentas,
} from "@/services/base";

const reservas = ref([]);
const habitaciones = ref([]);
const resultados = ref([]);
const cuentas = ref();

export const useReservas = () => {
  const router = useRouter();

  const useGetReservas = () => {
    getReservas().then((res) => {
      if (res.status === 200) {
        res.json().then((data) => (reservas.value = data));
      }
    });
  };

  const useGetHabitaciones = () => {
    getHabitaciones().then((data) => (habitaciones.value = data));
  };

  const useGetReservasPorNombre = (busqueda) => {
    busqueda = { pasajero: busqueda };
    getReservasPorNombre(busqueda).then(
      (data) => (resultados.value = data.resultados)
    );
  };
  const useLogin = (log) => {
    logIn(log).then((res) => {
      if (res.status === 200) {
        res.json().then((data) => {
          localStorage.setItem("token", data.accessToken);
          localStorage.setItem("nombre", data.user.name);
          router.push({ path: "/admin" });
        });
      } else {
        window.alert("Usuario o contraseña erroneos.");
      }
    });
  };

  const useLogOut = (log) => {
    logOut(log).then((res) => {
      if (res.status === 200) {
        localStorage.clear();
        router.push({ path: "/login" });
      }
    });
  };

  const useGetCuentas = () => {
    getCuentas().then((res) => {
      if (res.status === 200) {
        res.json().then((data) => (cuentas.value = data));
      }
    });
  };

  return {
    useGetReservas,
    reservas,
    useGetHabitaciones,
    habitaciones,
    useGetReservasPorNombre,
    resultados,
    useLogin,
    useLogOut,
    useGetCuentas,
    cuentas,
  };
};
