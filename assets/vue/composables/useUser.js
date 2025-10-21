import { ref, onMounted } from 'vue'
import { getUsers } from '../services/api'

export function useUser() {
    const users = ref([])
    const loading = ref(true)
    const error = ref(null)

    const fetchUsers = async () => {
        loading.value = true
        try {
            const { data } = await getUsers()
            users.value = data
        } catch (err) {
            error.value = err
        } finally {
            loading.value = false
        }
    }

    onMounted(fetchUsers)

    return { users, loading, error, fetchUsers }
}
