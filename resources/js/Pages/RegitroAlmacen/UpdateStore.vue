<template>
  <!-- Logout Other Devices Confirmation Modal -->
  <jet-dialog-modal :show="confirmingLogout" @close="closeModal">
    <template #title> Logout Other Browser Sessions </template>

    <template #content>
      Please enter your password to confirm you would like to logout of your other browser
      sessions across all of your devices.


            <!-- Razon social -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="Empresa" value="Empresa" class="font-serif text-xl" />
              <hr />
              <br />
              <jet-label for="name" value="Razon social" />
              <jet-input
                id="name"
                type="text"
                class="mt-1 block w-full"
                v-model="CreateStoreForm.name"
                autocomplete="name"
              />
              <jet-input-error :message="CreateStoreForm.errors.name" class="mt-2" />
            </div>

            <!-- Nit -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="nit" value="Nit" />
              <jet-input
                id="nit"
                type="number"
                class="mt-1 block w-full"
                v-model="CreateStoreForm.nit"
                autocomplete="nit"
              />
              <jet-input-error :message="CreateStoreForm.errors.nit" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="email" value="Email" />
              <jet-input
                id="email"
                type="email"
                class="mt-1 block w-full"
                v-model="CreateStoreForm.email"
              />
              <jet-input-error :message="CreateStoreForm.errors.email" class="mt-2" />
            </div>

            <!-- Numero telefonico -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="name" value="Numero Telefonico" />
              <jet-input
                id="telefono"
                type="number"
                class="mt-1 block w-full"
                v-model="CreateStoreForm.telefono"
                autocomplete="telefono"
              />
              <jet-input-error :message="CreateStoreForm.errors.telefono" class="mt-2" />
            </div>
            <!-- representante -->
            <div class="col-span-6 sm:col-span-4">
              <jet-label
                for="representante"
                value="Representante"
                class="font-serif text-xl"
              />
              <hr />
              <br />
              <jet-label for="representante" value="Nombre" />
              <jet-input
                id="representante"
                type="text"
                class="mt-1 block w-full"
                v-model="CreateStoreForm.nombre"
                autocomplete="nombre"
              />
              <jet-input-error :message="CreateStoreForm.errors.nombre" class="mt-2" />
              <jet-label for="representante" value="Apellido" />
              <jet-input
                id="apellido"
                type="text"
                class="mt-1 block w-full"
                v-model="CreateStoreForm.apellido"
                autocomplete="apellido"
              />
              <jet-input-error :message="CreateStoreForm.errors.apellido" class="mt-2" />
            </div>
          
    </template>

    <template #footer>
      <jet-secondary-button @click.native="closeModal"> Nevermind </jet-secondary-button>

      <jet-button
        class="ml-2"
        @click.native="logoutOtherBrowserSessions"
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Logout Other Browser Sessions
      </jet-button>
    </template>
  </jet-dialog-modal>
</template>
<script>
export default {
    data() {
        return {
            
        }
    },
};
</script>
