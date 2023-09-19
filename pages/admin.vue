<script setup>
import { ref, computed } from "vue";
import { useReservas } from "@/composables/reservas";
import { deleteReservas, addReserva, updateReserva } from "@/services/base";

definePageMeta({
  middleware: "auth",
});

const {
  useGetReservas,
  reservas,
  useGetHabitaciones,
  habitaciones,
  useGetReservasPorNombre,
  resultados,
  useGetCuentas,
  cuentas,
} = useReservas();

onBeforeMount(() => {
  useGetReservas();
  useGetHabitaciones();
  useGetCuentas();
  mes();
});

// CALCULAR DIAS EN EL MES
function daysInMonth(month, year) {
  return new Date(year, month, 0).getDate();
}
const dias = computed(() => {
  return daysInMonth(tablames.value, tablaaño.value);
});

const mes = () => {
  let ahora = new Date();
  let obtenerMes = ahora.getMonth();
  let obtenerAño = ahora.getFullYear();
  tablames.value = obtenerMes + 1;
  tablaaño.value = obtenerAño;
};

const hotel_id = ref(1);
const busqueda = ref(null);
const tablames = ref();
const tablaaño = ref();

const inpPasajero = ref(null);
const inpContacto = ref(null);
const inpNota = ref(null);
const inpDesde = ref(null);
const inpHasta = ref(null);
const inpNoches = ref(null);
const inpPrecio = ref(null);
const inpSeña = ref(null);
const inpSeñaCuenta = ref(null);
const inpCancel = ref(null);
const inpCancelCuenta = ref(null);
const inpPagoDebe = ref(null);
const inpHabitacion_id = ref(null);
const inpReservaId = ref(null);
const inpPersonas = ref(null);

// PINTAR RESERVA
function getClass(dia, habitacion) {
  if (!reservas.value) return "";
  var fechaDesde = null;
  var fechaHasta = null;
  const fechaDia = new Date(Date.UTC(tablaaño.value, tablames.value - 1, dia)); // Meses en JavaScript son base 0 (enero = 0, febrero = 1, ...)
  const reserva = reservas.value.filter((reserva) => {
    fechaDesde = new Date(reserva.desde);
    fechaHasta = new Date(reserva.hasta);

    return (
      fechaDia >= fechaDesde &&
      fechaDia <= fechaHasta &&
      reserva.habitacion_id === habitacion
    );
  });

  if (reserva.length === 0) {
    return "";
  } else if (reserva.length === 1) {
    if (reserva) {
      if (fechaDia.getTime() === new Date(reserva[0].desde).getTime()) {
        return "primer-dia-adm ";
      }
      if (fechaDia.getTime() === new Date(reserva[0].hasta).getTime()) {
        return "ultimo-dia-adm";
      }
      return "bg-red-700 fade-in";
    }
    return "";
  } else {
    if (reserva.length === 2) {
      return "dia-compartido-adm";
    }
  }
}

function getReservaTabla(dia, habitacion) {
  const fechaDia = new Date(Date.UTC(tablaaño.value, tablames.value - 1, dia));
  const reserva = reservas.value.find((reserva) => {
    const fechaDesde = new Date(reserva.desde);
    const fechaHasta = new Date(reserva.hasta);
    return (
      fechaDia >= fechaDesde &&
      fechaDia <= fechaHasta &&
      reserva.habitacion_id === habitacion &&
      inpPasajero.value !== reserva.pasajero
    );
  });
  inpPasajero.value = reserva ? reserva.pasajero : null;
  inpNota.value = reserva ? reserva.nota : null;
  inpContacto.value = reserva ? reserva.pasajero_contacto : null;
  inpDesde.value = reserva ? reserva.desde : null;
  inpHasta.value = reserva ? reserva.hasta : null;
  inpNoches.value = reserva ? reserva.noches : null;
  inpPrecio.value = reserva ? reserva.precio_noche : null;
  inpSeña.value = reserva ? reserva.seña : null;
  inpSeñaCuenta.value = reserva ? reserva.seña_cuenta : null;
  inpCancel.value = reserva ? reserva.pago_cancelado_fecha : null;
  inpCancelCuenta.value = reserva ? reserva.pago_cancelado_cuenta : null;
  inpReservaId.value = reserva ? reserva.id : null;
  inpHabitacion_id.value = reserva ? reserva.habitacion_id : null;
  inpPersonas.value = reserva ? reserva.personas : null;
  inpPagoDebe.value = reserva ? reserva.pago_debe : null;
}

const useAddReserva = () => {
  var reserva = {
    hotel_id: hotel_id.value,
    habitacion_id: inpHabitacion_id.value,
    desde: inpDesde.value,
    hasta: inpHasta.value,
    noches: inpNoches.value,
    personas: inpPersonas.value,
    precio_noche: inpPrecio.value,
    seña: inpSeña.value,
    seña_cuenta: inpSeñaCuenta.value,
    pago_debe: inpPagoDebe.value,
    pago_cancelado_fecha: inpCancel.value,
    pago_cancelado_cuenta: inpCancelCuenta.value,
    pasajero: inpPasajero.value,
    pasajero_contacto: inpContacto.value,
    nota: inpNota.value,
  };
  addReserva(reserva).then(useGetReservas());
};

const useUpdateReserva = () => {
  var reserva = {
    id: inpReservaId.value,
    hotel_id: 1,
    habitacion_id: inpHabitacion_id.value,
    desde: inpDesde.value,
    hasta: inpHasta.value,
    noches: inpNoches.value,
    personas: inpPersonas.value,
    precio_noche: inpPrecio.value,
    seña: inpSeña.value,
    seña_cuenta: inpSeñaCuenta.value,
    pago_debe: inpPagoDebe.value,
    pago_cancelado_fecha: inpCancel.value,
    pago_cancelado_cuenta: inpCancelCuenta.value,
    pasajero: inpPasajero.value,
    pasajero_contacto: inpContacto.value,
    nota: inpNota.value,
  };
  updateReserva(reserva).then(useGetReservas());
};

const useDeleteReservas = (id) => {
  deleteReservas(id).then((resp) => {
    if (resp.status === 200) {
      useGetReservas();
      inpReservaId.value = null;

      window.alert("Borrado con éxito");
    } else {
      window.alert("Error al intentar borrar.");
    }
  });
};
</script>

<template>
  <!-- SI RESERVAS ES NULL, NO MUESTRA LA PÁGINA -->
  <div class="dark:bg-black dark:text-white" v-if="reservas">
    <HeaderAdm></HeaderAdm>
    <div class="flex flex-col items-center">
      <!-- TABLA -->
      <div class="flex flex-col lg:flex-row my-10 shadow-xl dark:bg-gray-950">
        <!-- izquierda -->
        <div class="flex flex-row">
          <!-- Cabañas y Nombre hotel -->
          <div class="flex flex-col border">
            <!-- <div class="p-2 text-center text-xl min-w-max">El Paso 43</div> -->
            <select
              name=""
              id=""
              class="lg:py-3 py-4 lg:text-xl lg:min-w-max text-xs text-center dark:bg-gray-950"
              v-model="hotel_id"
            >
              <option :value="1">Paso 43</option>
              <option :value="2">Paso 54</option>
            </select>
            <div class="p-2">
              <div v-for="habitacion in habitaciones">
                <div
                  class="border border-gray-300 my-1 flex flex-row justify-center gap-1 lg:px-2 lg:text-base text-xs"
                  :class="
                    habitacion.Habitación % 2 === 0
                      ? 'bg-gray-200 dark:bg-gray-800'
                      : ''
                  "
                  v-if="habitacion.hotel_id === hotel_id"
                >
                  <div class="hidden lg:flex">Cabaña</div>
                  <div>{{ habitacion.Habitación }}</div>
                </div>
              </div>
            </div>
          </div>
          <!-- Izquierda - Select y Fechas -->
          <div class="flex flex-col">
            <div class="flex flex-row p-2 border justify-between">
              <!-- Select -->
              <div class="flex flex-row">
                <div class="flex flex-row gap-1">
                  <input
                    v-model="tablaaño"
                    class="border rounded-md w-14 text-center dark:bg-gray-800"
                    type="text"
                    name=""
                    id=""
                  />
                  <select
                    class="border rounded-md text-center dark:bg-gray-800"
                    v-model="tablames"
                    name=""
                    id=""
                  >
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                  </select>
                </div>
              </div>
              <div class="flex flex-row gap-1">
                <Boton
                  @click="
                    tablames !== 1 && tablames !== '1'
                      ? tablames--
                      : (tablames = 12) && tablaaño--
                  "
                  texto="<"
                  class="!py-0 px-1 font-bold"
                ></Boton>
                <Boton
                  @click="
                    tablames !== 12 && tablames !== '12'
                      ? tablames++
                      : (tablames = 1) && tablaaño++
                  "
                  texto=">"
                  class="!py-0 px-1 font-bold"
                ></Boton>
              </div>
            </div>
            <div class="border dark:border-gray-400 max-w-fit p-2">
              <div
                v-for="habitacion in habitaciones"
                :key="`habitacion-${habitacion}`"
                class="my-1"
                :class="
                  habitacion.Habitación % 2 === 0
                    ? 'bg-gray-200 dark:bg-gray-800'
                    : ' '
                "
              >
                <div
                  style="display: flex"
                  v-if="habitacion.hotel_id === hotel_id"
                  class="gap-[2px] lg:gap-0"
                >
                  <button
                    v-for="dia in dias"
                    :key="`${habitacion}-${dia}`"
                    class="border border-gray-300 lg:min-w-[2rem] w-5 text-center lg:px-1 lg:text-base text-xs"
                    :class="getClass(dia, habitacion.id)"
                    @click="getReservaTabla(dia, habitacion.id)"
                  >
                    {{ dia }}
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- derecha -->
      </div>
      <!-- INPUTS -->
      <div
        class="border-y dark:border-gray-400 w-full items-center shadow2 dark:bg-gray-950"
      >
        <div class="text-center font-monse text-xl py-6">RESERVA</div>
        <div class="flex flex-col w-full max-w-5xl mx-auto gap-3">
          <div class="grid grid-cols-4 gap-6">
            <div class="flex flex-row gap-3">
              <div class="flex flex-col w-1/2">
                <div>Habitacion</div>
                <select
                  class="border rounded-md dark:border-gray-400 dark:bg-gray-800"
                  name=""
                  id=""
                  v-model="inpHabitacion_id"
                >
                  <option
                    :value="habitacion.id"
                    v-for="habitacion in habitaciones"
                    v-show="habitacion.hotel_id === hotel_id"
                  >
                    {{ habitacion.Habitación }}
                  </option>
                </select>
              </div>
              <div class="flex flex-col w-1/2">
                <div>Hotel</div>
                <select
                  class="border rounded-md dark:border-gray-400 dark:bg-gray-800"
                  name=""
                  id=""
                  v-model="hotel_id"
                >
                  <option :value="1">El Paso 43</option>
                  <option :value="2">El Paso 54</option>
                </select>
              </div>
            </div>
            <div class="flex flex-row gap-2">
              <div class="flex flex-col w-4/5">
                <div>Pasajero</div>
                <input
                  class="border rounded-md dark:border-gray-400 dark:bg-gray-800"
                  type="text"
                  v-model="inpPasajero"
                  name=""
                  id=""
                />
              </div>

              <div class="flex flex-col w-1/5">
                <div>Nº Pj.</div>
                <input
                  class="border rounded-md dark:border-gray-400 dark:bg-gray-800"
                  type="text"
                  name=""
                  id=""
                  v-model="inpPersonas"
                />
              </div>
            </div>

            <div class="flex flex-col">
              <div>Contacto</div>
              <input
                class="border rounded-md dark:border-gray-400 dark:bg-gray-800"
                type="text"
                name=""
                id=""
                v-model="inpContacto"
              />
            </div>
            <div class="flex flex-row gap-2">
              <div class="flex flex-col w-1/2">
                <div>Desde</div>
                <input
                  class="border rounded-md dark:border-gray-400 dark:bg-gray-800"
                  type="date"
                  name=""
                  id=""
                  v-model="inpDesde"
                />
              </div>
              <div class="flex flex-col w-1/2">
                <div>Hasta</div>
                <input
                  class="border rounded-md dark:border-gray-400 dark:bg-gray-800"
                  type="date"
                  name=""
                  id=""
                  v-model="inpHasta"
                />
              </div>
            </div>
          </div>
          <div class="grid grid-cols-4 gap-6">
            <div class="flex flex-row gap-2">
              <div class="flex flex-col w-min">
                <div>Noches</div>
                <input
                  class="border rounded-md w-full dark:border-gray-400 dark:bg-gray-800"
                  type="text"
                  name=""
                  id=""
                  v-model="inpNoches"
                />
              </div>
              <div>
                <div>Precio Por Noche</div>
                <input
                  class="border rounded-md dark:border-gray-400 dark:bg-gray-800"
                  type="text"
                  name=""
                  id=""
                  v-model="inpPrecio"
                />
              </div>
            </div>

            <div class="flex flex-row gap-2">
              <div class="flex flex-col w-2/4">
                <div>Seña</div>
                <input
                  class="border rounded-md dark:border-gray-400 dark:bg-gray-800"
                  type="text"
                  name=""
                  id=""
                  v-model="inpSeña"
                />
              </div>
              <div class="flex flex-col w-2/4">
                <div>Cuenta</div>
                <select
                  class="border rounded-md dark:border-gray-400 dark:bg-gray-800"
                  name=""
                  id=""
                  v-model="inpSeñaCuenta"
                >
                  <option v-for="cuenta in cuentas" :value="cuenta.id">
                    {{ cuenta.nombre }}
                  </option>
                </select>
              </div>
            </div>
            <div class="flex flex-col">
              <div>Debe</div>
              <input
                class="border rounded-md w-full dark:border-gray-400 dark:bg-gray-800"
                type="text"
                name=""
                id=""
                v-model="inpPagoDebe"
              />
            </div>

            <div class="flex flex-row gap-2">
              <div class="flex flex-col w-1/2">
                <div>Cancelación</div>
                <input
                  class="border rounded-md dark:border-gray-400 dark:bg-gray-800"
                  type="date"
                  name=""
                  id=""
                  v-model="inpCancel"
                />
              </div>
              <div class="flex flex-col w-1/2">
                <div>Cuenta</div>
                <select
                  class="border rounded-md dark:border-gray-400 dark:bg-gray-800"
                  name=""
                  id=""
                  v-model="inpCancelCuenta"
                >
                  <option v-for="cuenta in cuentas" :value="cuenta.id">
                    {{ cuenta.nombre }}
                  </option>
                </select>
              </div>
            </div>
          </div>
          <div class="flex flex-row">
            <div class="flex flex-col grow">
              <div>Nota</div>
              <input
                class="border rounded-md dark:border-gray-400 dark:bg-gray-800"
                type="text"
                name=""
                v-model="inpNota"
                id=""
              />
            </div>
          </div>
          <div
            class="text-center text-red-500"
            v-if="inpDesde >= inpHasta && inpDesde !== null"
          >
            La fecha de ingreso debe ser anterior a la salida.
          </div>
          <div>
            <div class="flex flex-row justify-center py-7 gap-3">
              <Boton
                texto="Borrar"
                class="bg-red-500 !py-1"
                @click="useDeleteReservas(inpReservaId)"
                :disabled="inpReservaId === null"
              ></Boton>
              <Boton
                texto="Editar"
                class="!bg-blue-400 !py-1"
                @click="useUpdateReserva()"
                :disabled="
                  inpReservaId === null ||
                  (inpDesde >= inpHasta && inpDesde !== null)
                "
              ></Boton>
              <Boton
                texto="Agregar"
                class="bg-green-600 !px-4 !py-1"
                @click="useAddReserva()"
                :disabled="
                  inpHabitacion_id === null ||
                  inpPasajero === null ||
                  inpDesde === null ||
                  inpHasta === null
                "
              ></Boton>
            </div>
          </div>
        </div>
      </div>
      <!-- SEARCH -->
      <div class="flex flex-col items-center w-full h-min">
        <div
          class="flex flex-row p-5 gap-3 border-b dark:border-gray-400 w-full justify-center shadow dark:bg-gray-950"
        >
          <input
            class="border dark:border-gray-400 text-center rounded-md dark:bg-gray-800"
            type="text"
            v-model="busqueda"
            placeholder="Buscar por Nombre"
          />
          <Boton
            @click="useGetReservasPorNombre(busqueda)"
            texto="Buscar"
            class="!py-1"
            :disabled="busqueda === null || busqueda === ''"
          ></Boton>
        </div>
        <div class="flex flex-wrap gap-3 p-5 w-full">
          <button
            v-for="resultado in resultados"
            class="border dark:border-gray-400 rounded-md max-w-max p-2 shadow-md hover:bg-gray-100"
            @click="
              inpReservaId = resultado.id;
              hotel_id = resultado.hotel_id;
              inpPasajero = resultado.pasajero;
              inpHabitacion_id = resultado.habitacion_id;
              inpPersonas = resultado.personas;
              inpContacto = resultado.pasajero_contacto;
              inpDesde = resultado.desde;
              inpHasta = resultado.hasta;
              inpNoches = resultado.noches;
              inpPrecio = resultado.precio_noche;
              inpSeña = resultado.seña;
              inpSeñaCuenta = resultado.seña_cuenta;
              inpCancel = resultado.pago_cancelado_fecha;
              inpCancelCuenta = resultado.pago_cancelado_cuenta;
              inpNota = resultado.nota;
              inpPagoDebe = resultado.pago_debe;
            "
          >
            <div class="flex flex-col">
              <div class="flex flex-row items-baseline gap-2">
                <div class="text-xl font-bold">{{ resultado.pasajero }}</div>
                <div class="text-gray-400">
                  {{ resultado.hotel_id === 1 ? "El Paso 43" : "El Paso 54" }}
                </div>
              </div>

              <div class="text-start">
                {{ resultado.desde }} / {{ resultado.hasta }}
              </div>
            </div>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
