<template>
  <div class="bg-[#14274A] flex flex-col lg:mt-28">
    <div
      class="flex lg:justify-around py-10 flex-col-reverse lg:flex-row items-center lg:items-start"
    >
      <div class="text-sm text-white text-center lg:text-start">
        <div>©2023 El Paso 43</div>
        <div class="lg:px-0 px-2">
          Av. Costanera 4148, B7112, Costa Azul, Provincia de Buenos Aires
        </div>
        <div>(Tel.) +54 9 341 383-2007 / +54 9 341 378-9757</div>
      </div>

      <br />
      <NuxtLink to="/contacto"> <Boton texto="Contactanos"></Boton></NuxtLink>
    </div>

    <hr />
    <div class="flex justify-around py-6">
      <div class="flex gap-2 text-white">
        <NuxtLink to="/"><button>Inicio</button></NuxtLink>
        <NuxtLink to="/cabanas"><button>Cabañas</button></NuxtLink>
        <NuxtLink to="instalaciones"> <button>Servicios</button></NuxtLink>
        <NuxtLink to="/contacto"><button>Contactanos</button></NuxtLink>
      </div>
      <br />
      <div class="flex gap-5 self-center">
        <a
          target="_blank"
          href="https://www.facebook.com/p/El-paso-43-100064087783055/"
        >
          <svg
            height="16"
            viewBox="0 0 16 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M9 5.5V3.5C9 2.948 9.448 2.5 10 2.5H11V0H9C7.343 0 6 1.343 6 3V5.5H4V8H6V16H9V8H11L12 5.5H9Z"
              fill="#B0B8BC"
            />
          </svg>
        </a>
        <a target="_blank" href="https://www.instagram.com/elpaso.43">
          <svg
            width="16"
            height="16"
            viewBox="0 0 16 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M5 0H11C13.761 0 16 2.239 16 5V11C16 13.761 13.761 16 11 16H5C2.239 16 0 13.761 0 11V5C0 2.239 2.239 0 5 0ZM11 14.5C12.93 14.5 14.5 12.93 14.5 11V5C14.5 3.07 12.93 1.5 11 1.5H5C3.07 1.5 1.5 3.07 1.5 5V11C1.5 12.93 3.07 14.5 5 14.5H11ZM4 8C4 5.791 5.791 4 8 4C10.209 4 12 5.791 12 8C12 10.209 10.209 12 8 12C5.791 12 4 10.209 4 8ZM5.5 8C5.5 9.378 6.622 10.5 8 10.5C9.378 10.5 10.5 9.378 10.5 8C10.5 6.621 9.378 5.5 8 5.5C6.622 5.5 5.5 6.621 5.5 8ZM12.833 3.7C12.833 3.99437 12.5944 4.233 12.3 4.233C12.0057 4.233 11.767 3.99437 11.767 3.7C11.767 3.40564 12.0057 3.167 12.3 3.167C12.5944 3.167 12.833 3.40564 12.833 3.7Z"
              fill="#B0B8BC"
            />
          </svg>
        </a>
      </div>
    </div>
  </div>
</template>
