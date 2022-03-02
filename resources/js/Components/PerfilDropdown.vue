<template>
  <!-- Perfil Dropdown -->
  <div class="hidden px-4 lg:flex sm:items-center">
    <div class="relative">
      <!-- Teams Dropdown -->
      <jet-dropdown align="right" width="60" v-if="$page.props.jetstream.hasTeamFeatures">
        <template #trigger>
          <span class="inline-flex rounded-md">
            <button
              type="button"
              class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50"
            >
              {{ $page.props.user.current_team.name }}

              <svg
                class="ml-2 -mr-0.5 h-4 w-4"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                />
              </svg>
            </button>
          </span>
        </template>

        <template #content>
          <div class="w-60">
            <!-- Team Management -->
            <template v-if="$page.props.jetstream.hasTeamFeatures">
              <div class="block px-4 py-2 text-xs text-gray-400">Manage Team</div>

              <!-- Team Settings -->
              <jet-dropdown-link
                :href="route('teams.show', $page.props.user.current_team)"
              >
                Team Settings
              </jet-dropdown-link>

              <jet-dropdown-link
                :href="route('teams.create')"
                v-if="$page.props.jetstream.canCreateTeams"
              >
                Create New Team
              </jet-dropdown-link>

              <div class="border-t border-gray-100"></div>

              <!-- Team Switcher -->
              <div class="block px-4 py-2 text-xs text-gray-400">Switch Teams</div>

              <template v-for="team in $page.props.user.all_teams">
                <form @submit.prevent="switchToTeam(team)" :key="team.id">
                  <jet-dropdown-link as="button">
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
                  </jet-dropdown-link>
                </form>
              </template>
            </template>
          </div>
        </template>
      </jet-dropdown>
    </div>

    <!-- Settings Dropdown -->
    <div class="relative">
      <jet-dropdown align="right" width="48">
        <template #trigger>
          <button
            v-if="$page.props.jetstream.managesProfilePhotos"
            class="flex text-sm transition duration-150 ease-in-out border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300"
          >
            <img
              class="object-cover w-8 h-8 rounded-full"
              :src="$page.props.user.profile_photo_url"
              :alt="$page.props.user.name"
            />
          </button>

          <span v-else class="inline-flex rounded-md">
            <button
              type="button"
              class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none"
            >
              {{ $page.props.user.name }}

              <svg
                class="ml-2 -mr-0.5 h-4 w-4"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                />
              </svg>
            </button>
          </span>
        </template>

        <template #content>
          <div class="bg-white rounded-md ring-1 ring-black ring-opacity-5">
            <!-- Account Management -->
            <div class="block px-4 py-2 text-xs text-gray-400">Manage Account</div>

            <jet-dropdown-link :href="route('profile.show')"> Profile </jet-dropdown-link>

            <jet-dropdown-link
              :href="route('api-tokens.index')"
              v-if="$page.props.jetstream.hasApiFeatures"
            >
              API Tokens
            </jet-dropdown-link>

            <div class="border-t border-gray-100"></div>

            <!-- Authentication -->
            <form @submit.prevent="logout">
              <jet-dropdown-link as="button"> Logout </jet-dropdown-link>
            </form>
          </div>
        </template>
      </jet-dropdown>
    </div>
  </div>
</template>

<script>
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";

export default {
  components: {
    JetDropdown,
    JetDropdownLink,
  },
  methods: {
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

<style></style>
