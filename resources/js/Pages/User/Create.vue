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
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
      }),
    };
  },
  methods: {
    validateName() {
      this.form.clearErrors('name');

      if (validator.isEmpty(this.form.name)) {
        this.form.setError('name', 'Enter name');
      }
    },
    validateEmail() {
      this.form.clearErrors('email');

      if (!validator.isEmail(this.form.email)) {
        this.form.setError('email', 'Enter valid email');
      }
    },
    validatePassword() {
      this.form.clearErrors('password');

      // TODO stricter password rules for production
      if (!validator.isLength(this.form.password, { min: 4 })) {
        this.form.setError(
          'password',
          "Password's length should be at least 4",
        );
      }
    },
    validatePasswordConfirmation() {
      this.form.clearErrors('password_confirmation');

      if (
        !validator.equals(this.form.password, this.form.password_confirmation)
      ) {
        this.form.setError('password_confirmation', "Passwords don't match");
      }
    },
    onSubmit() {
      this.validateName();
      this.validateEmail();
      this.validatePassword();
      this.validatePasswordConfirmation();

      if (!this.form.hasErrors) {
        // post to server
      }
    },
  },
  mounted() {
    this.$refs.nameTextField.$el.focus();
  },
};
</script>

<template>
  <main class="mt-12 flex flex-col items-center gap-4 p-4">
    <h1 class="text-2xl font-bold">Sign Up</h1>

    <form @submit.prevent="onSubmit" class="w-full">
      <div class="flex flex-col gap-2">
        <FormField>
          <label for="name">Name</label>
          <FormTextInput
            ref="nameTextField"
            v-model="form.name"
            @focusout="validateName"
            id="name"
            autocomplete="name"
          />
          <FormErrorMessage>{{ form.errors.name }}</FormErrorMessage>
        </FormField>

        <FormField>
          <label for="email">Email</label>
          <FormTextInput
            type="email"
            v-model="form.email"
            @focusout="validateEmail"
            id="email"
            autocomplete="email"
          />
          <FormErrorMessage>{{ form.errors.email }}</FormErrorMessage>
        </FormField>

        <FormField>
          <label for="password">Password</label>
          <FormTextInput
            type="password"
            v-model="form.password"
            @focusout="validatePassword"
            id="password"
            autocomplete="new-password"
          />
          <FormErrorMessage>{{ form.errors.password }}</FormErrorMessage>
        </FormField>

        <FormField>
          <label for="password_confirmation">Password Confirmation</label>
          <FormTextInput
            type="password"
            v-model="form.password_confirmation"
            @focusout="validatePasswordConfirmation"
            id="password_confirmation"
            autocomplete="new-password"
          />
          <FormErrorMessage>{{
            form.errors.password_confirmation
          }}</FormErrorMessage>
        </FormField>
      </div>

      <button
        type="submit"
        class="mt-4 w-full rounded-lg bg-blue-500 py-3 font-bold text-white hover:bg-blue-400"
      >
        Sign Up
      </button>
    </form>
  </main>
</template>
