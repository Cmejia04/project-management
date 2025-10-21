import axios from 'axios'

const api = axios.create({
    baseURL: '/api',
    headers: {
        'Content-Type': 'application/json',
    },
})

export const getUsers = () => api.get('/user/list')
export const getTasksByUser = (userId) => api.get(`/user/${userId}/tasks`)
export const getDashboards = () => api.get(`/dashboards`)

export default api
