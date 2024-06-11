<script setup>
import { computed, reactive } from 'vue';
import { storeNewUser } from '@/components/Users/api.js';

    const formData = reactive({});

    const isFormValidated = computed(() => {
        if(!formData.name || !formData.email) {
            return false;
        }

        return validateFormName() && validateFormEmail();
    });

    const validateFormName = () => {
        const intRegex = /^\d+$/;
        const isOnlyNumbers = intRegex.test(formData.name);
        
        if(isOnlyNumbers) {
            return Boolean(String(formData.name).length <= 12);
        }
        
        const strRegex = /^[A-zА-я]+$/;
        return strRegex.test(formData.name);
    }

    const validateFormEmail = () => {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(formData.email);
    }

    const submitForm = () => {
        storeNewUser(formData);
        resetFormData();
    }

    const resetFormData = () => {
        formData.name = '';
        formData.email = '';
    }
</script>

<template>
    <div>
        <h1>Добавить пользователя</h1>

        <form 
            class="form"
            @submit.prevent="submitForm"
        >
            <input 
                v-model="formData.name"
                placeholder="Имя"
            >

            <input 
                v-model="formData.email"
                placeholder="Email"
            >

            <input 
                :disabled="!isFormValidated"
                type="submit" 
                value="Создать"
                class="submit-button"
            >
        </form>
    </div>
</template>

<style scoped>
.form {
    display: flex;
    flex-direction: column;
    width: 300px;
    margin-top: 20px;
}

.form > * {
    padding: 5px;
    margin-bottom: 10px;
    border-radius: 5px;
}

.submit-button {
    cursor: pointer;
}

.submit-button:hover:not(:disabled) {
    box-shadow: 2px 2px 5px gray;
}
</style>