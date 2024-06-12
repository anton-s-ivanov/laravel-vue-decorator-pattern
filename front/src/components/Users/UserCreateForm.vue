<script setup>
import { computed, onMounted, reactive, ref } from 'vue';
import { storeNewUser, getSkills } from '@/components/Users/constants.js';

    const formData = reactive({
        name: '',
        email: '',
        password: 'password',
        skills: [],
    });
    const skills = ref([]);
    const form = ref(null);
    const notification = ref('');

    onMounted(() => {
        loadSkills();
    });

    const loadSkills = async() => {
        skills.value = await getSkills();
    }

    const isFormValidated = computed(() => {
        if(!formData.name || !formData.email) {
            return false;
        }

        return  validateFormName() 
                && validateFormEmail() 
                && validateFormSkills()
                && validateFormPassword()
                ;
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

    const validateFormSkills = () => {
        return formData.skills.length;
    }

    const validateFormPassword = () => {
        return formData.password.length;
    }

    const submitForm = async() => {
        const newUser = await storeNewUser(formData);

        if(newUser?.name) {
            notification.value = `Пользователь  ${newUser.name} добавлен`;
        } else {
            notification.value = `Ошибка!`;
        }

        resetFormData();
    }

    const resetFormData = () => {
        formData.name = '';
        formData.email = '';
        formData.skills = [];
        form.value.reset();
    }

    const checkboxHandler = (event) => {
        if (event.target.checked) {
            formData.skills.push(Number(event.target.value));
        } else {
            formData.skills = formData.skills.filter(el => el != event.target.value);
        }
    }
</script>

<template>
    <h1>Добавить пользователя</h1>
    
    <div
        v-if="notification"
        class="notification"
    >
        {{ notification }}
    </div>

    <form 
        class="form"
        ref="form"
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
            v-model="formData.password"
            placeholder="Пароль"
            type="password"
        >

        <div 
            v-if="skills?.length"
            class="skills"
        >
            <h3>Навыки</h3>
            <hr>

            <div
                v-for="skill in skills"
                :key="skill.id"
            >
                <label class="label">
                    <input 
                        :value="skill.id"
                        type="checkbox"
                        class="checkbox"
                        @change="checkboxHandler"
                    >
                    {{ skill.name }}
                </label>
            </div>
        </div>

        <input 
            :disabled="!isFormValidated"
            type="submit" 
            value="Создать"
            class="submit-button"
        >
    </form>
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

.skills {
    border: 2px solid;
}

.label {
    display: flex;
    align-items: center;
}

.checkbox {
    margin-right: 10px;
}

.notification {
    padding: 5px 10px;
    background-color: #e6ffea;
    color: black;
    border-radius: 5px;
    width: 300px;
    margin-top: 20px;
}
</style>