<template>
  <Title>El Paso 43 - Contacto</Title>
  <HeaderA modo="B"></HeaderA>
  <div class="py-10 flex flex-col">
    <div class="lg:px-52 text-center lg:text-start">
      <div class="font-adobe text-3xl lg:text-4xl">Reservá ahora.</div>
      <p class="font-monse text-2xl">
        Consultá las fechas disponibles y contactanos para reservar tu lugar.
      </p>
    </div>
    <!-- TABLA -->
    <div class="flex flex-col my-10 justify-center gap-1" v-if="reservasPub">
      <!-- izquierda -->
      <div class="flex flex-row justify-center">
        <!-- Cabañas y Nombre hotel -->
        <div class="lg:flex flex-col border">
          <div
            class="lg:py-[9px] py-4 lg:text-xl lg:min-w-max text-xs hidden lg:flex lg:justify-center"
          >
            El Paso 43
          </div>

          <div class="lg:p-[6px] pt-[53px] px-[2px]">
            <div v-for="habitacion in habitaciones">
              <div
                class="border border-gray-300 my-1 flex flex-row justify-center gap-[2px] lg:gap-1 lg:px-2 lg:text-base text-[8px]"
                :class="habitacion.Habitación % 2 === 0 ? 'bg-gray-200' : ''"
                v-if="habitacion.hotel_id === hotel_id"
              >
                <div class="hidden lg:flex">Cabaña</div>
                <div class="lg:hidden flex">Hab.</div>
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
                  class="border rounded-md w-14 text-center"
                  type="text"
                  name=""
                  id=""
                />
                <select
                  class="border rounded-md text-center"
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
          <div class="border max-w-fit lg:p-1 py-1 px-[2px]">
            <div
              v-for="habitacion in habitaciones"
              :key="`habitacion-${habitacion}`"
              class="my-1"
              :class="habitacion.Habitación % 2 === 0 ? 'bg-gray-200' : ' '"
            >
              <div
                style="display: flex"
                v-if="habitacion.hotel_id === hotel_id"
              >
                <div
                  v-for="dia in dias"
                  :key="`${habitacion}-${dia}`"
                  class="border border-gray-300 lg:min-w-[2rem] w-[11px] text-center lg:px-1 lg:text-base text-[8px]"
                  :class="getClass(dia, habitacion.id)"
                >
                  {{ dia }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center flex flex-row self-center gap-1 text-gray-500">
        * Se muestran en
        <div class="text-red-400">rojo</div>
        las fechas ocupadas.
      </div>
    </div>
    <!-- contacto -->
    <div class="flex flex-col lg:flex-row my-10 gap-10 lg:px-52">
      <div class="flex flex-col font-monse font-bold">
        <div class="lg:text-start text-center text-xl">
          Comunicate por WhatsApp
          <div
            class="lg:pl-7 lg:py-3 py-3 flex lg:flex-row flex-col items-center gap-3 text-base"
          >
            <a
              target="_blank"
              href="https://api.whatsapp.com/send?phone=5493413832007&text=%C2%A1Hola!%20Me%20dirijo%20desde%20la%20Web.%20Quisiera%20obtener%20m%C3%A1s%20informaci%C3%B3n%20sobre%20El%20Paso%2043."
            >
              <button
                class="font-monse flex flex-row items-center bg-mostaza text-white font-bold gap-2 rounded-md p-2 w-max shadow-inner hover:brightness-90"
              >
                <svg
                  class="w-9"
                  xmlns="http://www.w3.org/2000/svg"
                  x="0px"
                  y="0px"
                  viewBox="0,0,256,256"
                >
                  <g
                    fill="#ffffff"
                    fill-rule="nonzero"
                    stroke="none"
                    stroke-width="1"
                    stroke-linecap="butt"
                    stroke-linejoin="miter"
                    stroke-miterlimit="10"
                    stroke-dasharray=""
                    stroke-dashoffset="0"
                    font-family="none"
                    font-weight="none"
                    font-size="none"
                    text-anchor="none"
                    style="mix-blend-mode: normal"
                  >
                    <g transform="scale(5.12,5.12)">
                      <path
                        d="M25,2c-12.69047,0 -23,10.30953 -23,23c0,4.0791 1.11869,7.88588 2.98438,11.20898l-2.94727,10.52148c-0.09582,0.34262 -0.00241,0.71035 0.24531,0.96571c0.24772,0.25536 0.61244,0.35989 0.95781,0.27452l10.9707,-2.71875c3.22369,1.72098 6.88165,2.74805 10.78906,2.74805c12.69047,0 23,-10.30953 23,-23c0,-12.69047 -10.30953,-23 -23,-23zM25,4c11.60953,0 21,9.39047 21,21c0,11.60953 -9.39047,21 -21,21c-3.72198,0 -7.20788,-0.97037 -10.23828,-2.66602c-0.22164,-0.12385 -0.48208,-0.15876 -0.72852,-0.09766l-9.60742,2.38086l2.57617,-9.19141c0.07449,-0.26248 0.03851,-0.54399 -0.09961,-0.7793c-1.84166,-3.12289 -2.90234,-6.75638 -2.90234,-10.64648c0,-11.60953 9.39047,-21 21,-21zM16.64258,13c-0.64104,0 -1.55653,0.23849 -2.30859,1.04883c-0.45172,0.48672 -2.33398,2.32068 -2.33398,5.54492c0,3.36152 2.33139,6.2621 2.61328,6.63477h0.00195v0.00195c-0.02674,-0.03514 0.3578,0.52172 0.87109,1.18945c0.5133,0.66773 1.23108,1.54472 2.13281,2.49414c1.80347,1.89885 4.33914,4.09336 7.48633,5.43555c1.44932,0.61717 2.59271,0.98981 3.45898,1.26172c1.60539,0.5041 3.06762,0.42747 4.16602,0.26563c0.82216,-0.12108 1.72641,-0.51584 2.62109,-1.08203c0.89469,-0.56619 1.77153,-1.2702 2.1582,-2.33984c0.27701,-0.76683 0.41783,-1.47548 0.46875,-2.05859c0.02546,-0.29156 0.02869,-0.54888 0.00977,-0.78711c-0.01897,-0.23823 0.0013,-0.42071 -0.2207,-0.78516c-0.46557,-0.76441 -0.99283,-0.78437 -1.54297,-1.05664c-0.30567,-0.15128 -1.17595,-0.57625 -2.04883,-0.99219c-0.8719,-0.41547 -1.62686,-0.78344 -2.0918,-0.94922c-0.29375,-0.10568 -0.65243,-0.25782 -1.16992,-0.19922c-0.51749,0.0586 -1.0286,0.43198 -1.32617,0.87305c-0.28205,0.41807 -1.4175,1.75835 -1.76367,2.15234c-0.0046,-0.0028 0.02544,0.01104 -0.11133,-0.05664c-0.42813,-0.21189 -0.95173,-0.39205 -1.72656,-0.80078c-0.77483,-0.40873 -1.74407,-1.01229 -2.80469,-1.94727v-0.00195c-1.57861,-1.38975 -2.68437,-3.1346 -3.0332,-3.7207c0.0235,-0.02796 -0.00279,0.0059 0.04687,-0.04297l0.00195,-0.00195c0.35652,-0.35115 0.67247,-0.77056 0.93945,-1.07812c0.37854,-0.43609 0.54559,-0.82052 0.72656,-1.17969c0.36067,-0.71583 0.15985,-1.50352 -0.04883,-1.91797v-0.00195c0.01441,0.02867 -0.11288,-0.25219 -0.25,-0.57617c-0.13751,-0.32491 -0.31279,-0.74613 -0.5,-1.19531c-0.37442,-0.89836 -0.79243,-1.90595 -1.04102,-2.49609v-0.00195c-0.29285,-0.69513 -0.68904,-1.1959 -1.20703,-1.4375c-0.51799,-0.2416 -0.97563,-0.17291 -0.99414,-0.17383h-0.00195c-0.36964,-0.01705 -0.77527,-0.02148 -1.17773,-0.02148zM16.64258,15c0.38554,0 0.76564,0.0047 1.08398,0.01953c0.32749,0.01632 0.30712,0.01766 0.24414,-0.01172c-0.06399,-0.02984 0.02283,-0.03953 0.20898,0.40234c0.24341,0.57785 0.66348,1.58909 1.03906,2.49023c0.18779,0.45057 0.36354,0.87343 0.50391,1.20508c0.14036,0.33165 0.21642,0.51683 0.30469,0.69336v0.00195l0.00195,0.00195c0.08654,0.17075 0.07889,0.06143 0.04883,0.12109c-0.21103,0.41883 -0.23966,0.52166 -0.45312,0.76758c-0.32502,0.37443 -0.65655,0.792 -0.83203,0.96484c-0.15353,0.15082 -0.43055,0.38578 -0.60352,0.8457c-0.17323,0.46063 -0.09238,1.09262 0.18555,1.56445c0.37003,0.62819 1.58941,2.6129 3.48438,4.28125c1.19338,1.05202 2.30519,1.74828 3.19336,2.2168c0.88817,0.46852 1.61157,0.74215 1.77344,0.82227c0.38438,0.19023 0.80448,0.33795 1.29297,0.2793c0.48849,-0.05865 0.90964,-0.35504 1.17773,-0.6582l0.00195,-0.00195c0.3568,-0.40451 1.41702,-1.61513 1.92578,-2.36133c0.02156,0.0076 0.0145,0.0017 0.18359,0.0625v0.00195h0.00195c0.0772,0.02749 1.04413,0.46028 1.90625,0.87109c0.86212,0.41081 1.73716,0.8378 2.02148,0.97852c0.41033,0.20308 0.60422,0.33529 0.6543,0.33594c0.00338,0.08798 0.0068,0.18333 -0.00586,0.32813c-0.03507,0.40164 -0.14243,0.95757 -0.35742,1.55273c-0.10532,0.29136 -0.65389,0.89227 -1.3457,1.33008c-0.69181,0.43781 -1.53386,0.74705 -1.8457,0.79297c-0.9376,0.13815 -2.05083,0.18859 -3.27344,-0.19531c-0.84773,-0.26609 -1.90476,-0.61053 -3.27344,-1.19336c-2.77581,-1.18381 -5.13503,-3.19825 -6.82031,-4.97266c-0.84264,-0.8872 -1.51775,-1.71309 -1.99805,-2.33789c-0.4794,-0.62364 -0.68874,-0.94816 -0.86328,-1.17773l-0.00195,-0.00195c-0.30983,-0.40973 -2.20703,-3.04868 -2.20703,-5.42578c0,-2.51576 1.1685,-3.50231 1.80078,-4.18359c0.33194,-0.35766 0.69484,-0.41016 0.8418,-0.41016z"
                      ></path>
                    </g>
                  </g>
                </svg>
                +54 9 341 383-2007
              </button>
            </a>
            <a
              target="_blank"
              href="https://api.whatsapp.com/send?phone=5493413789757&text=%C2%A1Hola!%20Me%20dirijo%20desde%20la%20Web.%20Quisiera%20obtener%20m%C3%A1s%20informaci%C3%B3n%20sobre%20El%20Paso%2043."
            >
              <button
                class="font-monse flex flex-row items-center bg-mostaza text-white font-bold gap-2 rounded-md p-2 w-max shadow-inner hover:brightness-90"
              >
                <svg
                  class="w-9"
                  xmlns="http://www.w3.org/2000/svg"
                  x="0px"
                  y="0px"
                  viewBox="0,0,256,256"
                >
                  <g
                    fill="#ffffff"
                    fill-rule="nonzero"
                    stroke="none"
                    stroke-width="1"
                    stroke-linecap="butt"
                    stroke-linejoin="miter"
                    stroke-miterlimit="10"
                    stroke-dasharray=""
                    stroke-dashoffset="0"
                    font-family="none"
                    font-weight="none"
                    font-size="none"
                    text-anchor="none"
                    style="mix-blend-mode: normal"
                  >
                    <g transform="scale(5.12,5.12)">
                      <path
                        d="M25,2c-12.69047,0 -23,10.30953 -23,23c0,4.0791 1.11869,7.88588 2.98438,11.20898l-2.94727,10.52148c-0.09582,0.34262 -0.00241,0.71035 0.24531,0.96571c0.24772,0.25536 0.61244,0.35989 0.95781,0.27452l10.9707,-2.71875c3.22369,1.72098 6.88165,2.74805 10.78906,2.74805c12.69047,0 23,-10.30953 23,-23c0,-12.69047 -10.30953,-23 -23,-23zM25,4c11.60953,0 21,9.39047 21,21c0,11.60953 -9.39047,21 -21,21c-3.72198,0 -7.20788,-0.97037 -10.23828,-2.66602c-0.22164,-0.12385 -0.48208,-0.15876 -0.72852,-0.09766l-9.60742,2.38086l2.57617,-9.19141c0.07449,-0.26248 0.03851,-0.54399 -0.09961,-0.7793c-1.84166,-3.12289 -2.90234,-6.75638 -2.90234,-10.64648c0,-11.60953 9.39047,-21 21,-21zM16.64258,13c-0.64104,0 -1.55653,0.23849 -2.30859,1.04883c-0.45172,0.48672 -2.33398,2.32068 -2.33398,5.54492c0,3.36152 2.33139,6.2621 2.61328,6.63477h0.00195v0.00195c-0.02674,-0.03514 0.3578,0.52172 0.87109,1.18945c0.5133,0.66773 1.23108,1.54472 2.13281,2.49414c1.80347,1.89885 4.33914,4.09336 7.48633,5.43555c1.44932,0.61717 2.59271,0.98981 3.45898,1.26172c1.60539,0.5041 3.06762,0.42747 4.16602,0.26563c0.82216,-0.12108 1.72641,-0.51584 2.62109,-1.08203c0.89469,-0.56619 1.77153,-1.2702 2.1582,-2.33984c0.27701,-0.76683 0.41783,-1.47548 0.46875,-2.05859c0.02546,-0.29156 0.02869,-0.54888 0.00977,-0.78711c-0.01897,-0.23823 0.0013,-0.42071 -0.2207,-0.78516c-0.46557,-0.76441 -0.99283,-0.78437 -1.54297,-1.05664c-0.30567,-0.15128 -1.17595,-0.57625 -2.04883,-0.99219c-0.8719,-0.41547 -1.62686,-0.78344 -2.0918,-0.94922c-0.29375,-0.10568 -0.65243,-0.25782 -1.16992,-0.19922c-0.51749,0.0586 -1.0286,0.43198 -1.32617,0.87305c-0.28205,0.41807 -1.4175,1.75835 -1.76367,2.15234c-0.0046,-0.0028 0.02544,0.01104 -0.11133,-0.05664c-0.42813,-0.21189 -0.95173,-0.39205 -1.72656,-0.80078c-0.77483,-0.40873 -1.74407,-1.01229 -2.80469,-1.94727v-0.00195c-1.57861,-1.38975 -2.68437,-3.1346 -3.0332,-3.7207c0.0235,-0.02796 -0.00279,0.0059 0.04687,-0.04297l0.00195,-0.00195c0.35652,-0.35115 0.67247,-0.77056 0.93945,-1.07812c0.37854,-0.43609 0.54559,-0.82052 0.72656,-1.17969c0.36067,-0.71583 0.15985,-1.50352 -0.04883,-1.91797v-0.00195c0.01441,0.02867 -0.11288,-0.25219 -0.25,-0.57617c-0.13751,-0.32491 -0.31279,-0.74613 -0.5,-1.19531c-0.37442,-0.89836 -0.79243,-1.90595 -1.04102,-2.49609v-0.00195c-0.29285,-0.69513 -0.68904,-1.1959 -1.20703,-1.4375c-0.51799,-0.2416 -0.97563,-0.17291 -0.99414,-0.17383h-0.00195c-0.36964,-0.01705 -0.77527,-0.02148 -1.17773,-0.02148zM16.64258,15c0.38554,0 0.76564,0.0047 1.08398,0.01953c0.32749,0.01632 0.30712,0.01766 0.24414,-0.01172c-0.06399,-0.02984 0.02283,-0.03953 0.20898,0.40234c0.24341,0.57785 0.66348,1.58909 1.03906,2.49023c0.18779,0.45057 0.36354,0.87343 0.50391,1.20508c0.14036,0.33165 0.21642,0.51683 0.30469,0.69336v0.00195l0.00195,0.00195c0.08654,0.17075 0.07889,0.06143 0.04883,0.12109c-0.21103,0.41883 -0.23966,0.52166 -0.45312,0.76758c-0.32502,0.37443 -0.65655,0.792 -0.83203,0.96484c-0.15353,0.15082 -0.43055,0.38578 -0.60352,0.8457c-0.17323,0.46063 -0.09238,1.09262 0.18555,1.56445c0.37003,0.62819 1.58941,2.6129 3.48438,4.28125c1.19338,1.05202 2.30519,1.74828 3.19336,2.2168c0.88817,0.46852 1.61157,0.74215 1.77344,0.82227c0.38438,0.19023 0.80448,0.33795 1.29297,0.2793c0.48849,-0.05865 0.90964,-0.35504 1.17773,-0.6582l0.00195,-0.00195c0.3568,-0.40451 1.41702,-1.61513 1.92578,-2.36133c0.02156,0.0076 0.0145,0.0017 0.18359,0.0625v0.00195h0.00195c0.0772,0.02749 1.04413,0.46028 1.90625,0.87109c0.86212,0.41081 1.73716,0.8378 2.02148,0.97852c0.41033,0.20308 0.60422,0.33529 0.6543,0.33594c0.00338,0.08798 0.0068,0.18333 -0.00586,0.32813c-0.03507,0.40164 -0.14243,0.95757 -0.35742,1.55273c-0.10532,0.29136 -0.65389,0.89227 -1.3457,1.33008c-0.69181,0.43781 -1.53386,0.74705 -1.8457,0.79297c-0.9376,0.13815 -2.05083,0.18859 -3.27344,-0.19531c-0.84773,-0.26609 -1.90476,-0.61053 -3.27344,-1.19336c-2.77581,-1.18381 -5.13503,-3.19825 -6.82031,-4.97266c-0.84264,-0.8872 -1.51775,-1.71309 -1.99805,-2.33789c-0.4794,-0.62364 -0.68874,-0.94816 -0.86328,-1.17773l-0.00195,-0.00195c-0.30983,-0.40973 -2.20703,-3.04868 -2.20703,-5.42578c0,-2.51576 1.1685,-3.50231 1.80078,-4.18359c0.33194,-0.35766 0.69484,-0.41016 0.8418,-0.41016z"
                      ></path>
                    </g>
                  </g>
                </svg>
                +54 9 341 378-9757
              </button>
            </a>
          </div>
        </div>
        <!-- GMAIL -->
        <div class="text-center lg:text-start">
          <p class="text-xl">Mandanos un correo</p>
          <a href="mailto:alojamientoelpaso43@gmail.com">
            <button class="lg:pl-7 py-3">
              <p
                class="bg-mostaza text-white font-bold p-2 w-max flex flex-row items-center gap-2 rounded-md shadow-inner hover:brightness-90"
              >
                <svg
                  class="w-8"
                  xmlns="http://www.w3.org/2000/svg"
                  x="0px"
                  y="0px"
                  viewBox="0,0,256,256"
                >
                  <g
                    fill="#ffffff"
                    fill-rule="nonzero"
                    stroke="none"
                    stroke-width="1"
                    stroke-linecap="butt"
                    stroke-linejoin="miter"
                    stroke-miterlimit="10"
                    stroke-dasharray=""
                    stroke-dashoffset="0"
                    font-family="none"
                    font-weight="none"
                    font-size="none"
                    text-anchor="none"
                    style="mix-blend-mode: normal"
                  >
                    <g transform="scale(5.12,5.12)">
                      <path
                        d="M5.5,7c-2.46875,0 -4.48828,2.01563 -4.5,4.48438c0,0 0,0.00391 0,0.00781c0,0.00391 0,0.00391 0,0.00781v27c0,2.47266 2.02734,4.5 4.5,4.5h39c2.47266,0 4.5,-2.02734 4.5,-4.5v-27c0,-0.00391 0,-0.00391 0,-0.00781c0,-0.00391 0,-0.00781 0,-0.00781c-0.01172,-2.46875 -2.03125,-4.48437 -4.5,-4.48437zM8.10156,9h33.80078l-16.90234,11.78125zM4.77344,9.11719l20.22656,14.10156l20.23047,-14.10156c1.02344,0.30859 1.76172,1.23828 1.76953,2.37109c-0.00391,0.21094 -0.21875,0.63281 -0.53125,0.97266c-0.31641,0.34375 -0.625,0.55859 -0.625,0.55859l-0.00391,0.00781l-20.83984,14.75l-20.83984,-14.75l-0.00391,-0.00781c0,0 -0.30859,-0.21484 -0.625,-0.55859c-0.3125,-0.33984 -0.52734,-0.76172 -0.53125,-0.97266c0.00781,-1.13281 0.74609,-2.0625 1.77344,-2.37109zM3,14.65234l0.00781,0.00781l0.00781,0.00391v0.00391l2.98438,2.10938v24.22266h-0.5c-1.39062,0 -2.5,-1.10937 -2.5,-2.5zM47,14.65234v23.84766c0,1.39063 -1.10937,2.5 -2.5,2.5h-0.5v-24.22266l2.98438,-2.10937v-0.00391zM8,18.19141l17,12.03125l17,-12.03125v22.80859h-34z"
                      ></path>
                    </g>
                  </g>
                </svg>
                alojamientoelpaso43@gmail.com
              </p>
            </button>
          </a>
        </div>
        <!-- INSTAGRAM -->
        <div class="text-center lg:text-start">
          <p class="text-xl">Seguinos en Instagram</p>
          <button class="lg:pl-7 lg:py-3 py-2">
            <a target="_blank" href="https://www.instagram.com/elpaso.43">
              <p
                class="bg-mostaza lg:py-3 flex flex-row items-center gap-2 text-white font-bold rounded-md p-2 w-max hover:brightness-90"
              >
                <svg
                  class="w-8"
                  xmlns="http://www.w3.org/2000/svg"
                  x="0px"
                  y="0px"
                  viewBox="0,0,256,256"
                >
                  <g transform="">
                    <g
                      fill="#ffffff"
                      fill-rule="nonzero"
                      stroke="none"
                      stroke-width="1"
                      stroke-linecap="butt"
                      stroke-linejoin="miter"
                      stroke-miterlimit="10"
                      stroke-dasharray=""
                      stroke-dashoffset="0"
                      font-family="none"
                      font-weight="bold"
                      font-size="none"
                      text-anchor="none"
                      style="mix-blend-mode: normal"
                    >
                      <g transform="scale(5.12,5.12)">
                        <path
                          d="M16,3c-7.16752,0 -13,5.83248 -13,13v18c0,7.16752 5.83248,13 13,13h18c7.16752,0 13,-5.83248 13,-13v-18c0,-7.16752 -5.83248,-13 -13,-13zM16,5h18c6.08648,0 11,4.91352 11,11v18c0,6.08648 -4.91352,11 -11,11h-18c-6.08648,0 -11,-4.91352 -11,-11v-18c0,-6.08648 4.91352,-11 11,-11zM37,11c-1.10457,0 -2,0.89543 -2,2c0,1.10457 0.89543,2 2,2c1.10457,0 2,-0.89543 2,-2c0,-1.10457 -0.89543,-2 -2,-2zM25,14c-6.06329,0 -11,4.93671 -11,11c0,6.06329 4.93671,11 11,11c6.06329,0 11,-4.93671 11,-11c0,-6.06329 -4.93671,-11 -11,-11zM25,16c4.98241,0 9,4.01759 9,9c0,4.98241 -4.01759,9 -9,9c-4.98241,0 -9,-4.01759 -9,-9c0,-4.98241 4.01759,-9 9,-9z"
                        ></path>
                      </g>
                    </g>
                  </g>
                </svg>
                @ElPaso.43
              </p>
            </a>
          </button>
        </div>
      </div>
      <!-- MAPA -->
      <div class="flex flex-col grow">
        <div class="font-monse text-xl font-bold flex flex-row">
          <!-- <svg
            class="w-7"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g
              id="SVGRepo_tracerCarrier"
              stroke-linecap="round"
              stroke-linejoin="round"
            ></g>
            <g id="SVGRepo_iconCarrier">
              <path
                d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                stroke="#000000"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              ></path>
              <path
                d="M12 22C16 18 20 14.4183 20 10C20 5.58172 16.4183 2 12 2C7.58172 2 4 5.58172 4 10C4 14.4183 8 18 12 22Z"
                stroke="#000000"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              ></path>
            </g>
          </svg> -->
        </div>
        <iframe
          class="min-w-full min-h-full"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56824.20688804611!2d-56.717270815552844!3d-36.67191198918766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x959c6fee9962afbb%3A0x6cb6db07ee940fd5!2sel%20paso%2043!5e0!3m2!1ses-419!2sar!4v1693318291746!5m2!1ses-419!2sar"
          style="border: 0"
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
        <div
          class="font-monse text-xl justify-center flex flex-row bg-[#14274A] text-white"
        >
          <svg
            class="w-6"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g
              id="SVGRepo_tracerCarrier"
              stroke-linecap="round"
              stroke-linejoin="round"
            ></g>
            <g id="SVGRepo_iconCarrier">
              <path
                d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                stroke="#ffffff"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              ></path>
              <path
                d="M12 22C16 18 20 14.4183 20 10C20 5.58172 16.4183 2 12 2C7.58172 2 4 5.58172 4 10C4 14.4183 8 18 12 22Z"
                stroke="#ffffff"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              ></path>
            </g>
          </svg>
          Av. Costanera 4148, Costa Azul
        </div>
      </div>
    </div>
  </div>

  <Footindex></Footindex>
</template>
<script setup>
import { ref, computed } from "vue";
import { useReservas } from "@/composables/reservas";

const { useGetReservasPub, reservasPub, useGetHabitaciones, habitaciones } =
  useReservas();

onBeforeMount(() => {
  useGetReservasPub();
  useGetHabitaciones();
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
const tablames = ref();
const tablaaño = ref();

function getClass(dia, habitacion) {
  if (!reservasPub.value) return "";
  var fechaDesde = null;
  var fechaHasta = null;
  const fechaDia = new Date(Date.UTC(tablaaño.value, tablames.value - 1, dia)); // Meses en JavaScript son base 0 (enero = 0, febrero = 1, ...)
  const reserva = reservasPub.value.filter((reserva) => {
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
        return "primer-dia";
      }
      if (fechaDia.getTime() === new Date(reserva[0].hasta).getTime()) {
        return "ultimo-dia";
      }
      return "bg-red-400 fade-in";
    }
    return "";
  } else {
    if (reserva.length === 2) {
      return "dia-compartido";
    }
  }
}
</script>
