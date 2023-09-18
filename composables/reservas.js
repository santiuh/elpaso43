import { ref } from "vue";
import {
  getReservas,
  getReservasPub,
  getHabitaciones,
  getReservasPorNombre,
  getCuentas,
} from "@/services/base";

const reservas = ref(null);
const reservasPub = ref(null);
const habitaciones = ref(null);
const resultados = ref(null);
const cuentas = ref(null);

export const useReservas = () => {
  const useGetReservas = () => {
    getReservas().then((res) => {
      if (res.status === 200) {
        res.json().then((data) => (reservas.value = data));
      }
    });
  };

  const useGetReservasPub = () => {
    getReservasPub().then((res) => {
      if (res.status === 200) {
        res.json().then((data) => (reservasPub.value = data));
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
    useGetCuentas,
    cuentas,
    useGetReservasPub,
    reservasPub,
  };
};
