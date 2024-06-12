import { fetchData, storeData} from '@/components/api.js'

const usersEndpoint = `${import.meta.env.VITE_BACKEND_DOMAIN}/users`;
const skillsEndpoint = `${import.meta.env.VITE_BACKEND_DOMAIN}/skills`;

export const getUsers = async() => {
    return await fetchData(usersEndpoint);
}

export const getSkills = async() => {
    return await fetchData(skillsEndpoint);
}

export const storeNewUser = async(formData) => {
    return await storeData(usersEndpoint, formData);
}
