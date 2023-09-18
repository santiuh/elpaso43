<template>
  <HeaderA
    fondo="/images/portadatemp.jpeg"
    class="bg-[url('/images/portada4.jpeg')] lg:bg-[url('/images/portadatemp.jpeg')]"
    modo="A"
  ></HeaderA>
  <div class="font-monse text-4xl justify-center text-center flex py-12">
    Conocé nuestras cabañas e instalaciones
  </div>
  <Cardindex
    titulocard="Hasta 6 personas."
    textocard="Duplex con capacidad para 2, 4 o 6 personas, equipados con Smart TV, cocina, wi-fi, heladera microondas, vajilla, blancos (sabanas y toallas) y con dos balcones al mar."
    imagen="images/DormitorioIndex.jpeg"
    link="/cabanas"
    textoboton="VER CABAÑAS"
  ></Cardindex>
  <Cardindex
    class="lg:!flex-row-reverse"
    titulocard="Sol y agua."
    textocard="El complejo cuenta con Jacuzzi, una pequeña sala de juegos para niños y nuestra terraza en la cual vas a disfrutar de una vista soñada, pileta y parrillero."
    imagen="images/pileta_salto.jpeg"
    link="/instalaciones"
    textoboton="VER INSTALACIONES"
  ></Cardindex>
  <Cardindex
    titulocard="Frente al mar."
    textocard="El paso 43 se destaca por la cercanía a la playa y las vistas al mar desde casi todas sus habitaciones y la terraza."
    imagen="images/playa.jpeg"
    link="/contacto"
    textoboton="DONDE ESTAMOS"
  ></Cardindex>

  <Footindex></Footindex>
</template>
