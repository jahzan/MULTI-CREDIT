<template>
      <div class="w-full flex flex-wrap">

        <!-- Login Section -->
        <div class="w-full h-screen overflow-auto md:w-1/2 flex flex-col">

            <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-24">
                <a href="#" class=" text-white font-bold text-xl p-4">
                    <jet-application-mark class="block h-16 w-auto" />
                </a>
            </div>

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <div class="text-4xl flex font-extrabold items-center">
                    <span class="mx-auto bg-clip-text text-transparent bg-gradient-to-r from-blue-800 to-blue-400">
                        Solicitar contraseña
                    </span>
                </div>
        <div class="mb-4 text-sm text-gray-600">
            ¿Olvidaste tu contraseña? No hay problema. Solamente dijita el email  y le enviaremos un enlace para restablecer la contraseña.
        </div>


                <form class="flex flex-col pt-3 md:pt-3" @submit.prevent="submit">
                      <div v-if="status" class=" font-medium text-sm text-green-600">
                            {{ status }}
                     </div>
                    <div class="flex flex-col pt-4">
                        <jet-label for="email" class="text-lg" value="Email"/>
                        <jet-input v-model="form.email" type="email" id="email" placeholder="su@email.com" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline"/>
                    </div>

    
                    <jet-button type="submit" value="Enviar correo electronico" class="flex-auto bg-black text-white font-bold text-sm text-center hover:bg-gray-700 p-4 mt-6">Enviar correo electronico</jet-button>
                </form>
                <div class="text-center pt-12 pb-12">
                    <p>Ya puedes ingresar? 
                        <inertia-link :href="route('login')" class="underline font-semibold">
                            Igresa desde aquí.
                        </inertia-link>
                    </p>
                </div>
            </div>

        </div>

        <!-- Image Section -->
        <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-screen hidden md:block" src="https://source.unsplash.com/IXUM4cJynP0">
        </div>
    </div>
</template>

<script>
    import JetApplicationMark from "@/Jetstream/ApplicationMark";
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            JetAuthenticationCard,
            JetApplicationMark,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors
        },

        props: {
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: ''
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.email'),{
                     preserveState: true,
                     preserveScroll: true
                })
            }
        }
    }
</script>
