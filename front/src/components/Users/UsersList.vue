<script setup>
import { getUsers } from '@/components/Users/constants.js';
import { onMounted, ref } from 'vue';

    const users = ref([]);

    onMounted(() => {
        loadUsers();
    });

    const loadUsers = async() => {
        users.value = await getUsers();
    }
</script>

<template>
    <h1>Список пользователей с навыками</h1>
    <div
        v-if="users?.length"
        class="users"
    >
        <div
            v-for="user in users"
            :key="user.id"
            class="user"
        >
            <h2>{{ user.name }}</h2>

            <ul class="skills-list">
                <li
                    v-for="skill in user.description"
                    :key="skill.id"
                >
                    {{ skill.name }}
                </li>
            </ul>
        </div>
    </div>
    <div
        v-else
        class="error"
    >
        <h2>Ошибка загрузки</h2>
    </div>

</template>

<style scoped>
    .users {
        margin-top: 20px;
    }

    .user {
        padding: 20px;
        border-radius: 10px;
        background-color: #3e3d3d;
        color: white;
    }

    .user:not(:last-child) {
        margin-bottom: 20px;
    }

    .skills-list {
        padding-left: 20px;
    }
</style>