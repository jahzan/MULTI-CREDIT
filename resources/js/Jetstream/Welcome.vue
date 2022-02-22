<template>
  <div>
    <div class="flex bg-white border-b border-gray-200 sm:px-10">
      <div class="hidden sm:flex">
        <jet-application-logo class="block float-left w-auto px-10" />
      </div>
      <div
        class="py-3 mx-auto my-auto text-3xl font-extrabold text-center text-transparent sm:py-0 sm:mx-0 sm:text-left sm:text-6xl bg-clip-text bg-gradient-to-l via-orange-600 from-orange-500 to-blue-600"
      >
        Bienvenido a Multicredito!
      </div>
    </div>

    <div class="grid grid-cols-1 bg-gray-200 bg-opacity-20 md:grid-cols-2">
      <!-- almacenes -->
      <div class="p-6 border-gray-200" v-if="this.$inertia.page.props.permissions.almacenes">
        <div class="flex items-center">
          <i class="w-8 h-8 text-2xl text-gray-400 fas fa-store fa-fw"></i>
          <div class="ml-4 text-lg font-semibold leading-7 text-gray-600">
            <jet-nav-link :href="route('almacen.index')">
              Almacenes
            </jet-nav-link>
          </div>
        </div>

        <div class="ml-12">
          <div class="mt-2 text-sm text-gray-500">
            Lista de almacenes asociados. Puedes crear, modficar o inactivar almacenes.
          </div>

          <div class="flex items-center mt-3 font-semibold">
            <jet-nav-link :href="route('almacen.index')">
              <div
                class="flex p-2 pl-5 pr-5 text-sm text-blue-600 bg-transparent border-2 border-blue-600 rounded-lg hover:border-blue-300 hover:text-blue-300 focus:border-4 focus:border-blue-300"
              >
                <div class="">Ver Almacenes</div>

                <div class="ml-1">
                  <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                    <path
                      fill-rule="evenodd"
                      d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
              </div>
            </jet-nav-link>
          </div>
        </div>
      </div><!-- almacenes -->

      <!-- solicitar credito -->
      <div class="p-6 border border-b border-r border-gray-200" v-if="this.$inertia.page.props.permissions.solicitud">
        <div class="flex items-center">
          <i class="w-8 h-8 text-gray-400 fas fa-file-alt fa-fw"></i>
          <div class="ml-4 text-lg font-semibold leading-7 text-gray-600">
            <jet-nav-link :href="route('solicitud.create')">
                Solicitar Credito
            </jet-nav-link>
          </div>
        </div>

        <div class="ml-12">
          <div class="mt-2 text-sm text-gray-500">
            Solicita un credito llenando el sieguiente formulario con siguiente
          </div>

          <div class="flex items-center mt-3 font-semibold">
            <jet-nav-link :href="route('solicitud.create')" class="">
              <div
                class="flex p-2 pl-5 pr-5 text-sm text-blue-600 bg-transparent border-2 border-blue-600 rounded-lg hover:border-blue-300 hover:text-blue-300 focus:border-4 focus:border-blue-300"
              >
                <div class="">Ir al Formulario</div>

                <div class="ml-1">
                  <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                    <path
                      fill-rule="evenodd"
                      d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
              </div>
            </jet-nav-link>
          </div>
        </div>
      </div><!-- solicitar credito -->


      <!-- Solicitudes -->
      <div class="p-6 border border-b border-r border-gray-200" v-if="this.$inertia.page.props.permissions.solicitudes">
        <div class="flex items-center">
          <i class="text-2xl text-gray-400 fas fa-tasks fa-fw"></i>
          <div class="ml-4 text-lg font-semibold leading-7 text-gray-600">
            <jet-nav-link :href="route('solicitud.index')">
                Solicitudes
            </jet-nav-link>
          </div>
        </div>

        <div class="ml-12">
          <div class="mt-2 text-sm text-gray-500">
            Listar todas las solicitudes realizadas y asociadas. Puedes ver los
            detalles de cada solicitud.
          </div>

          <div class="flex items-center mt-3 font-semibold">
            <jet-nav-link :href="route('solicitud.index')" class="">
              <div
                class="flex p-2 pl-5 pr-5 text-sm text-blue-600 bg-transparent border-2 border-blue-600 rounded-lg hover:border-blue-300 hover:text-blue-300 focus:border-4 focus:border-blue-300"
              >
                <div class="">Ver Solicitudes</div>

                <div class="ml-1">
                  <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                    <path
                      fill-rule="evenodd"
                      d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
              </div>
            </jet-nav-link>
          </div>
        </div>
      </div><!-- Solicitudes -->

      <!-- Transferencia -->
      <div class="p-6 border border-b border-r border-gray-200" v-if="this.$inertia.page.props.permissions.transferencia">
        <div class="flex items-center">
          <i class="text-2xl text-gray-400 fas fa-money-bill-wave fa-fw"></i>
          <div class="ml-4 text-lg font-semibold leading-7 text-gray-600">
            <jet-nav-link :href="route('solicitud.index')">
                Transferir Dinero
            </jet-nav-link>
          </div>
        </div>

        <div class="ml-12">
          <div class="mt-2 text-sm text-gray-500">
            Transfiere dinero de las solicitudes de credito desembolsadas.
          </div>

          <div class="flex items-center mt-3 font-semibold">
            <jet-nav-link :href="route('solicitud.index')" class="">
              <div
                class="flex p-2 pl-5 pr-5 text-sm text-blue-600 bg-transparent border-2 border-blue-600 rounded-lg hover:border-blue-300 hover:text-blue-300 focus:border-4 focus:border-blue-300"
              >
                <div class="">Transferir Dinero</div>

                <div class="ml-1">
                  <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                    <path
                      fill-rule="evenodd"
                      d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
              </div>
            </jet-nav-link>
          </div>
        </div>
      </div><!-- Transferencia -->

      <!-- Gestionar Usuarios -->
      <div class="p-6 border border-b border-gray-200" v-if="this.$inertia.page.props.permissions.user">
        <div class="flex items-center">
          <i class="w-8 h-8 mr-3 text-2xl text-gray-400 fas fa-users fa-fw"></i>
          <div class="ml-4 text-lg font-semibold leading-7 text-gray-600">
            <jet-nav-link :href="route('solicitud.index')">
                Gestionar Usuarios
            </jet-nav-link>
          </div>
        </div>

        <div class="ml-12">
          <div class="mt-2 text-sm text-gray-500">
            Crea, elimina o actualiza usuarios.
          </div>

          <div class="flex items-center mt-3 font-semibold">
            <jet-nav-link :href="route('solicitud.index')" class="">
              <div
                class="flex p-2 pl-5 pr-5 text-sm text-blue-600 bg-transparent border-2 border-blue-600 rounded-lg hover:border-blue-300 hover:text-blue-300 focus:border-4 focus:border-blue-300"
              >
                <div class="">Ver Usuarios</div>

                <div class="ml-1">
                  <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                    <path
                      fill-rule="evenodd"
                      d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
              </div>
            </jet-nav-link>
          </div>
        </div>
      </div><!-- Gestionar Usuarios -->

      <!-- Gestionar Roles y Permisos -->
      <div class="p-6 border border-b border-r border-gray-200" v-if="this.$inertia.page.props.permissions.role">
        <div class="flex items-center">
          <i class="w-8 h-8 mr-3 text-2xl text-gray-400 fas fa-user-shield fa-fw"></i>
          <div class="ml-4 text-lg font-semibold leading-7 text-gray-600">
            <jet-nav-link :href="route('solicitud.index')">
                Gestionar Roles y Permisos
            </jet-nav-link>
          </div>
        </div>

        <div class="ml-12">
          <div class="mt-2 text-sm text-gray-500">
            Listar todas las solicitudes realizadas y asociadas. Puedes ver los
            detalles de cada solicitud.
          </div>

          <div class="flex items-center mt-3 font-semibold">
            <jet-nav-link :href="route('solicitud.index')" class="">
              <div
                class="flex p-2 pl-5 pr-5 text-sm text-blue-600 bg-transparent border-2 border-blue-600 rounded-lg hover:border-blue-300 hover:text-blue-300 focus:border-4 focus:border-blue-300"
              >
                <div class="">Gestionar Permisos</div>

                <div class="ml-1">
                  <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                    <path
                      fill-rule="evenodd"
                      d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
              </div>
            </jet-nav-link>
          </div>
        </div>
      </div><!-- Gestionar Roles y Permisos -->
    </div>
  </div>
</template>

<script>
import JetApplicationLogo from "@/Jetstream/ApplicationLogo";
import Button from "@/Jetstream/DangerButton";
import JetNavLink from "@/Jetstream/NavLink";
import Modal from "@/Jetstream/ConfirmationModal";

export default {
  components: {
    JetApplicationLogo,
    Button,
    Modal,
    JetNavLink,
  },
};
</script>
