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
  props: {
    user: Object,
  },
  data() {
    return {
      form: useForm({
        name: this.user.name,
        email: this.user.email,
        nickname: this.user.nickname || '',
        bio: this.user.bio || '',

        // TODO implement later

        // avatar_image: this.user.avatar_image || '',
        // cover_image: this.user.cover_image || '',
        // birthdate: this.user.birthdate || null,
        // country_id: this.user.country_id || null,
        // state_id: this.user.state_id || null,
        // city_id: this.user.city_id || null,
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
    validateNickname() {
      this.form.clearErrors('nickname');

      // Nickname is optional; don't validate if none is entered
      if (this.form.nickname === '') {
        return;
      }

      if (!validator.isAlpha(this.form.nickname)) {
        this.form.setError(
          'nickname',
          'Nickname can only contain Latin characters',
        );
      } else if (!validator.isLength(this.form.nickname, { min: 5, max: 32 })) {
        this.form.setError(
          'nickname',
          'Nickname must be between 5 and 32 characters.',
        );
      }
    },
    validateBio() {
      this.form.clearErrors('bio');

      // Bio is optional; don't validate if none is entered
      if (this.form.bio === '') {
        return;
      }

      if (!validator.isLength(this.form.bio, { min: 0, max: 140 })) {
        this.form.setError('bio', 'Bio should be 140 charactes or shorter');
      }
    },
    onSubmit() {
      this.validateName();
      this.validateEmail();
      this.validateNickname();
      this.validateBio();

      if (!this.form.hasErrors) {
        this.form.patch(route('users.update'));
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
    <h1 class="text-2xl font-bold">Edit Profile</h1>

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

        <hr class="mb-4" />

        <FormField>
          <label for="nickname">Nickname</label>
          <FormTextInput
            v-model="form.nickname"
            @focusout="validateNickname"
            id="nickname"
            autocomplete="nickname"
          />
          <FormErrorMessage>{{ form.errors.nickname }}</FormErrorMessage>
        </FormField>

        <FormField>
          <label for="bio">Bio</label>
          <FormTextInput v-model="form.bio" @focusout="validateBio" id="bio" />
          <FormErrorMessage>{{ form.errors.bio }}</FormErrorMessage>
        </FormField>
      </div>

      <button
        type="submit"
        class="mt-4 w-full rounded-lg bg-blue-500 py-3 font-bold text-white hover:bg-blue-400"
      >
        Update Profile
      </button>
    </form>
  </main>
</template>
