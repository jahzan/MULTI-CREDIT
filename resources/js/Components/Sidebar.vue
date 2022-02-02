<template>
  <div
    class="fixed z-0 flex invisible w-16 h-screen px-3 overflow-y-auto transition-all duration-700 ease-in-out bg-white shadow group nunito md:visible hover:w-3/12 min-w-max hover:shadow-4xl"
    id="sidebar"
  >
    <ul class="w-full max-h-screen list-reset hover:bg-white">
      <!-- Home -->
      <li class="my-2 md:my-0">
        <jet-nav-link
          :href="route('dashboard')"
          :active="route().current('dashboard')"
        >
          <i class="mr-3 fas fa-home fa-fw"></i>

          <span
            class="z-0 hidden w-full pb-1 text-xl transition ease-in-out md:pb-0 duration-2000 group-hover:inline"
            >Home</span
          >
        </jet-nav-link>
      </li>

      <!-- Almacenes -->
      <li
        class="my-2 md:my-0"
        v-if="this.$inertia.page.props.permissions.almacenes"
      >
        <jet-nav-link
          :href="route('almacen.index')"
          :active="route().current('almacen.index')"
        >
          <i class="mr-3 fas fa-store fa-fw"></i>
          <span
            class="z-0 hidden w-full pb-1 text-xl transition ease-in-out md:pb-0 duration-2000 group-hover:inline"
            >Almacenes</span
          >
        </jet-nav-link>
      </li><!-- Almacenes -->

      <!-- Solicitar credito -->
      <li
        class="my-2 md:my-0"
        v-if="this.$inertia.page.props.permissions.solicitud"
      >
        <jet-nav-link
          :href="route('solicitud.create')"
          :active="
            route().current('solicitud.create') ||
            route().current('referencia.index') ||
            route().current('socioeconomico.index')
          "
        >
          <i class="mr-3 fas fa-file-alt fa-fw"></i>
          <span
            class="z-0 hidden w-full pb-1 text-xl transition ease-in-out md:pb-0 duration-2000 group-hover:inline"
            >Solicitar Credito</span
          >
        </jet-nav-link>
      </li><!-- Solicitar credito -->

      <!-- Solicitudes-->
      <li
        class="my-2 md:my-0"
        v-if="this.$inertia.page.props.permissions.solicitudes"
      >
        <jet-nav-link
          :href="route('solicitud.index')"
          :active="route().current('solicitud.index')"
        >
          <i class="mr-3 fas fa-tasks fa-fw"></i>
          <span
            class="z-0 hidden w-full text-xl transition ease-in-out dpb-1 md:pb-0 duration-2000 group-hover:inline"
            >Solicitudes</span
          >
        </jet-nav-link>
      </li> <!-- Solicitudes-->

      <!-- Tranferencia de dinero -->
      <li
        class="my-2 md:my-0"
        v-if="this.$inertia.page.props.permissions.transferencia"
      >
        <jet-nav-link
          :href="route('transferencia.index')"
          :active="route().current('transferencia.index')"
        >
          <i class="mr-3 fas fa-money-bill-wave fa-fw"></i>
          <span
            class="z-0 hidden w-full pb-1 text-xl transition ease-in-out md:pb-0 duration-2000 group-hover:inline"
            >Transferir Dinero</span
          >
        </jet-nav-link>
      </li><!-- Tranferencia de dinero -->

      <!-- Usuarios -->
      <li class="my-2 md:my-0" v-if="this.$inertia.page.props.permissions.user">
        <jet-nav-link
          :href="route('user.index')"
          :active="route().current('user.index')"
        >
          <i class="mr-3 fas fa-users fa-fw"></i>
          <span
            class="z-0 hidden w-full pb-1 text-xl transition ease-in-out md:pb-0 duration-2000 group-hover:inline"
            >Gestionar Usuarios</span
          >
        </jet-nav-link>
      </li> <!-- Usuarios -->

      <!-- Roles y Permisos -->
      <li class="my-2 md:my-0" v-if="this.$inertia.page.props.permissions.role">
        <jet-nav-link
          :href="route('roles-permisos')"
          :active="route().current('roles-permisos')"
        >
          <i class="mr-3 fas fa-user-shield fa-fw"></i>
          <span
            class="z-0 hidden w-full pb-1 text-xl transition ease-in-out md:pb-0 duration-2000 group-hover:inline"
            >Gestionar Roles y Permisos</span
          >
        </jet-nav-link>
      </li><!-- Roles y Permisos -->
    </ul>
  </div>
</template>

<script>
import JetNavLink from "@/Jetstream/NavLink";
export default {
  components: {
    JetNavLink,
  },
};
</script>
<style>
.nunito {
  font-family: "nunito", font-sans;
}
</style>
