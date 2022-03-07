<template>
  <!-- Notifications Dropdown -->
  <!-- Perfil Dropdown -->
  <div class="flex px-4 sm:items-center">
    <!-- Settings Dropdown -->
    <div class="relative">
      <jet-dropdown align="right" width="48">
        <template #trigger>
          <!-- boton que despliega el dropdonw -->
          <button
            class="flex text-sm transition duration-150 ease-in-out border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300"
          >
            <!-- contenedor de iconos e newbaged muestra en un circulo rojo el numero de  notificaciones pendientes-->
            <div
              v-if="Nnotify > 0"
              class="absolute top-0 right-0 flex items-center w-4 h-4 py-1 mt-5 font-semibold bg-red-500 rounded-full cursor-pointer"
            >
              <p class="mx-auto text-xs text-center text-white">{{ notify }}</p>
            </div>
            <!-- icono de campana para las notificaciones -->
            <i class="my-auto text-gray-500 far fa-bell fa-2x" />
          </button>
        </template>

        <template #content>
            <!-- div layout para el dropdown-responsive -->
                <div class="flex flex-col h-full md:max-h-96">
                    <div class="h-full overflow-y-scroll">
                            <!-- Div que se muestra en caso que no halla notificaciones -->
                            <div
                                v-if="Nnotify < 1"
                                class="flex items-center px-4 py-3 -mx-2 border-b hover:bg-gray-100"
                            >
                                <p class="mx-2 text-sm text-gray-600">
                                <span href="" class="font-bold">Nó hay notificaiones nuevas</span>
                                </p>
                            </div>
                            <!-- Div que se muestra en caso que halla notificaciones -->
                            <div v-else>
                                <!-- La estructura de las notificaciones {Emisor Mensaje Cliente} -->
                                <!-- Ejemplo PepeShop ha solicitado un credito para Sandra Paez -->
                                <!-- Multicredito informa que ha sido aprobada la solicitud de credito a nombre Sandra Paez -->
                                <!-- PepeShop = Emisor sender-->
                                <!-- ha solicitado un credito para o informa que ha sido aprobada la solicitud de credito a nombre = Mensaje message-->
                                <!-- Sandra Paez = Cliente client -->

                                <a
                                href="#"
                                v-for="notify in unread_notifications"
                                :key="notify.id"
                                class="flex items-center px-1 py-3 border-b hover:bg-gray-100"
                                >
                                <p class="mx-2 text-sm text-gray-600">
                                    <span href="#" class="font-bold">{{ notify.data.sender }}</span>
                                    {{ notify.data.message }}
                                    <span href="#" class="font-bold text-blue-500">{{
                                    notify.data.client
                                    }}</span>
                                    . {{diferenciaFechas(notify.created_at)}}
                                </p>
                                {{ unread_notifications.data }}
                                </a>
                            </div>
                    </div>
                    <div class="h-16">
                            <!-- Link para direcionar a la pagina de las notificaciones donde se muestran todas-->
                            <a class="block py-2 text-xl font-bold text-center text-white bg-gray-800">
                                Mostrar todas las notificaiones
                            </a>
                    </div>
                </div>


        </template>
      </jet-dropdown>
    </div>
  </div>
</template>

<script>
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import timediff from 'timediff';
import { Inertia } from '@inertiajs/inertia'

export default {
  components: {
    JetDropdown,
    JetDropdownLink,
  },
  props: ["Nnotify", "unread_notifications", "userId"],

  data() {
    return {
      newNotify: 0,
    };
  },
// propiedad computada
  computed: {
    //funcion que se tra el nuemro actual de notificaciones
    notify() {
      return this.Nnotify + this.newNotify;
    },
  },
  methods: {
    suma() {
      this.newNotify++;
    },
    diferenciaFechas(date){
        var hola = timediff(date,Date());
        if(hola.years != 0 ){
            return hola.years+"a"
        }
        if(hola.months != 0 ){
            return hola.months+"M"
        }
        if(hola.days != 0 ){
            return hola.days+"d"
        }
        if(hola.hours != 0 ){
            return hola.hours+"h"
        }
        if(hola.minutes != 0 ){
            return hola.minutes+"m"
        }
        return "hace segundos"
    },
      // Metodo que se ejecuta cuando se lanza un evento de tipo broadcast,
      // Este metodo agregara en tiempo real las notificaciones
    notification() {
      Echo.private("App.Models.User." + this.userId).notification((notification) => {
        this.unread_notifications.unshift({
          data: {
            message: notification.message,
            sender: notification.sender,
            client: notification.client,
          },
        });
        this.suma();
      });

    },
    reloadSolicitudes(){
      Inertia.reload({ only: ['solicitudes'] });
    },
  },
  // se ejecuta antes de renderizar el contenido
  async mounted() {
    // llama al evento que se encarga de conectar brodcast
    await this.notification();
    await this.reloadSolicitudes();

  },
  updated(){
  }
};
</script>

<style></style>
