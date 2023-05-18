<script>
import { useForm } from '@inertiajs/vue3';
import validator from 'validator';
import FormField from '@/Components/FormField.vue';
import FormTextInput from '@/Components/FormTextInput.vue';
import FormErrorMessage from '@/Components/FormErrorMessage.vue';

export default {
  components: {
    FormField,
    FormTextInput,
    FormErrorMessage,
  },
  data() {
    return {
      form: useForm({
        email: '',
        password: '',
      }),
    };
  },
  methods: {
    validateEmail() {
      this.form.clearErrors('email');

      if (!validator.isEmail(this.form.email)) {
        this.form.setError('email', 'Enter valid email');
      }
    },
    validatePassword() {
      this.form.clearErrors('password');

      if (validator.isEmpty(this.form.password)) {
        this.form.setError('password', 'Enter password');
      }
    },
    onSubmit() {
      this.validateEmail();
      this.validatePassword();

      if (!this.form.hasErrors) {
        this.form.post(route('sessions.store'));
      }
    },
  },
  mounted() {
    this.$refs.emailTextField.$el.focus();
  },
};
</script>

<template>
  <main class="mt-12 flex flex-col items-center gap-4 p-4">
    <h1 class="text-2xl font-bold">Log In</h1>

    <form @submit.prevent="onSubmit" class="w-full">
      <div class="flex flex-col gap-2">
        <FormField>
          <label for="email">Email</label>
          <FormTextInput
            ref="emailTextField"
            v-model="form.email"
            @focusout="validateEmail"
            type="email"
            id="email"
            autocomplete="email"
          />
          <FormErrorMessage>{{ form.errors.email }}</FormErrorMessage>
        </FormField>

        <FormField>
          <label for="password">Password</label>
          <FormTextInput
            v-model="form.password"
            type="password"
            id="password"
            autocomplete="current-password"
          />
          <FormErrorMessage>{{ form.errors.password }}</FormErrorMessage>
        </FormField>

        <button
          type="submit"
          class="mt-4 w-full rounded-lg bg-blue-500 py-3 font-bold text-white hover:bg-blue-400"
        >
          Log In
        </button>
      </div>
    </form>
  </main>
</template>
