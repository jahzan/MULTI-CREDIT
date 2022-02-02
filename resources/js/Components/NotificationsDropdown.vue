<template>
  <!-- Notifications Dropdown -->
  <!-- Perfil Dropdown -->
  <div class="hidden px-4 md:flex sm:items-center">
    <div class="relative">
      <!-- Teams Dropdown -->
      <jet-dropdown align="right" width="60" v-if="$page.props.jetstream.hasTeamFeatures">
        <template #trigger>
          <span class="inline-flex rounded-md">
            <button
              type="button"
              class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150"
            >
              <div
                v-if="Nnotify > 0"
                class="mt-5 py-1 absolute top-0 right-0 flex font-semibold rounded-full items-center cursor-pointer bg-red-500 w-4 h-4"
              >
                <p class="text-white text-xs text-center mx-auto">{{ notify }}</p>
              </div>
              <i class="far fa-bell fa-2x text-gray-500 my-auto" />
            </button>
          </span>
        </template>
      </jet-dropdown>
    </div>

    <!-- Settings Dropdown -->
    <div class="relative">
      <jet-dropdown align="right" width="48">
        <template #trigger>
          <!-- boton que despliega el dropdonw -->
          <button
            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out"
          >
            <!-- contenedor de iconos e newbaged muestra en un circulo rojo el numero de  notificaciones pendientes-->
            <div
              v-if="Nnotify > 0"
              class="mt-5 py-1 absolute top-0 right-0 flex font-semibold rounded-full items-center cursor-pointer bg-red-500 w-4 h-4"
            >
              <p class="text-white text-xs text-center mx-auto">{{ notify }}</p>
            </div>
            <!-- icono de campana para las notificaciones -->
            <i class="far fa-bell fa-2x text-gray-500 my-auto" />
          </button>
        </template>

        <template #content>
          <div
            class="absolute right-0 ring-2 ring-black ring-opacity-5 bg-white rounded-md shadow-2xl overflow-hidden z-20"
            style="width: 20rem"
          >
            <!-- Div que contiene el contenido del cuerpo de las notificaciones -->
            <div class="">
              <!-- Div que se muestra en caso que no halla notificaciones -->
              <div
                v-if="Nnotify < 1"
                class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2"
              >
                <p class="text-gray-600 text-sm mx-2">
                  <span href="" class="font-bold">Nó hay notificaiones nuevas</span>
                </p>
              </div>

              <!-- Div que se muestra en caso que halla notificaciones -->
              <div v-else class="max-h-96 overflow-y-scroll">
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
                  <p class="text-gray-600 text-sm mx-2">
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

            <!-- Link para direcionar a la pagina de las notificaciones donde se muestran todas-->
            <a class="block bg-gray-800 text-white text-center font-bold py-2">
              Mostrar todas las notificaiones
            </a>
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
