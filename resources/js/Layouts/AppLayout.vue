<template>
  <div class="">
    <jet-banner />

    <div class="min-h-screen bg-gray-100">
      <!-- cabecera de lapagina -->
      <nav class="fixed z-10 w-full mb-16 bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="flex mx-auto max-w-8xl">
          <!-- Logo -->
          <div class="flex items-center w-16">
            <inertia-link :href="route('dashboard')" class="mx-auto">
              <jet-application-mark class="block w-auto h-9" />
            </inertia-link>
          </div>

          <!-- Text Multicredito -->
          <div class="justify-between flex-grow h-16">
            <!-- Navigation Links (MULTICREDITO)-->
            <div class="flex items-center h-16">
              <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex">
                <jet-nav-link
                  :href="route('dashboard')"
                  :active="route().current('dashboard')"
                  class="font-medium"
                >
                  Multicredito
                </jet-nav-link>
              </div>
            </div>
          </div>
          <!-- component de notificacion -->
          <notifications-dropdown
            :userId="this.$page.props.user.id"
            :Nnotify="this.$page.props.Nnotifications"
            :unread_notifications="this.$page.props.user.unread_notifications"
          />
          <!-- componente de dropdown para las opciones del perfil y sescion -->
          <perfil-dropdown/>

<!-- menu responsivo -->
          <!-- menu Hamburger -->
          <div class="flex items-center px-4 -mr-2 lg:hidden">
            <!-- Boton que abre el menu -->
            <button
              @click="showingNavigationDropdown = !showingNavigationDropdown"
              class="inline-flex items-center justify-center p-2 text-gray-500 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500"
            >
              <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path
                  :class="{
                    hidden: showingNavigationDropdown,
                    'inline-flex': !showingNavigationDropdown,
                  }"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"
                />
                <path
                  :class="{
                    hidden: !showingNavigationDropdown,
                    'inline-flex': showingNavigationDropdown,
                  }"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
        </div>
        <!-- Menu es elemento que se abre al hacer click en el boton de menu -->
        <div
          :class="{
            block: showingNavigationDropdown,
            hidden: !showingNavigationDropdown,
          }"
          class="block h-screen pb-16 overflow-y-auto lg:hidden"
        >

          <responsive-menu/>

          <!-- Responsive Settings Options -->
          <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
              <div
                v-if="$page.props.jetstream.managesProfilePhotos"
                class="flex-shrink-0 mr-3"
              >
                <img
                  class="object-cover w-10 h-10 rounded-full"
                  :src="$page.props.user.profile_photo_url"
                  :alt="$page.props.user.name"
                />
              </div>

              <div>
                <div class="text-base font-medium text-gray-800">
                  {{ $page.props.user.name }}
                </div>
                <div class="text-sm font-medium text-gray-500">
                  {{ $page.props.user.email }}
                </div>
              </div>
            </div>

            <div class="mt-3 space-y-1">
              <jet-responsive-nav-link
                :href="route('profile.show')"
                :active="route().current('profile.show')"
              >
                Profile
              </jet-responsive-nav-link>

              <jet-responsive-nav-link
                :href="route('api-tokens.index')"
                :active="route().current('api-tokens.index')"
                v-if="$page.props.jetstream.hasApiFeatures"
              >
                API Tokens
              </jet-responsive-nav-link>

              <!-- Authentication -->
              <form method="POST" @submit.prevent="logout">
                <jet-responsive-nav-link as="button"> Logout </jet-responsive-nav-link>
              </form>

              <!-- Team Management -->
              <template v-if="$page.props.jetstream.hasTeamFeatures">
                <div class="border-t border-gray-200"></div>

                <div class="block px-4 py-2 text-xs text-gray-400">Manage Team</div>

                <!-- Team Settings -->
                <jet-responsive-nav-link
                  :href="route('teams.show', $page.props.user.current_team)"
                  :active="route().current('teams.show')"
                >
                  Team Settings
                </jet-responsive-nav-link>

                <jet-responsive-nav-link
                  :href="route('teams.create')"
                  :active="route().current('teams.create')"
                >
                  Create New Team
                </jet-responsive-nav-link>

                <div class="border-t border-gray-200"></div>

                <!-- Team Switcher -->
                <div class="block px-4 py-2 text-xs text-gray-400">Switch Teams</div>

                <template v-for="team in $page.props.user.all_teams">
                  <form @submit.prevent="switchToTeam(team)" :key="team.id">
                    <jet-responsive-nav-link as="button">
                      <div class="flex items-center">
                        <svg
                          v-if="team.id == $page.props.user.current_team_id"
                          class="w-5 h-5 mr-2 text-green-400"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          stroke="currentColor"
                          viewBox="0 0 24 24"
                        >
                          <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>{{ team.name }}</div>
                      </div>
                    </jet-responsive-nav-link>
                  </form>
                </template>
              </template>
            </div>
          </div>
        </div>
<!-- menu responsivo -->
      </nav>

      <!-- menu lateral -->
      <Sidebar class="pt-16" />

      <!-- Page Content -->
      <main class="max-h-screen overflow-y-auto md:ml-16 md:pr-2 md:pt-16">
        <div class="pt-10 md:pt-0">
          <slot></slot>
        </div>
      </main>

      <!-- Modal Portal -->
      <portal-target name="modal" multiple> </portal-target>
    </div>
  </div>
</template>

<script>
import JetApplicationMark from "@/Jetstream/ApplicationMark";
import PerfilDropdown from "@/Components/PerfilDropdown";
import NotificationsDropdown from "@/Components/NotificationsDropdown";
import JetBanner from "@/Jetstream/Banner";
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetNavLink from "@/Jetstream/NavLink";
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink";
import Sidebar from "@/Components/Sidebar";
import ResponsiveMenu from "@/Components/ResponsiveMenu";

export default {
  components: {
    JetApplicationMark,
    PerfilDropdown,
    NotificationsDropdown,
    JetBanner,
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
    JetResponsiveNavLink,
    Sidebar,
    ResponsiveMenu,
  },

  data() {
    return {
      showingNavigationDropdown: false,
    };
  },

  methods: {
    switchToTeam(team) {
      this.$inertia.put(
        route("current-team.update"),
        {
          team_id: team.id,
        },
        {
          preserveState: false,
        }
      );
    },

    logout() {
      this.$inertia.visit(route("logout"), {
        method: "post",
        onBefore: (visit) => {
          this.$loading(true);
        },
        onSuccess: (page) => {
          this.$loading(false);
        },
        onError: () => {
          this.$loading(false);
        },
      });
    },
  },
};
</script>
