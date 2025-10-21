import { ref } from 'vue'
import { getTasksByUser } from '../services/api'

export function useTask() {
    const tasks = ref([])
    const loadingTask = ref(false)
    const errorTask = ref(null)

    const fetchTasksByUser = async (userId) => {
        loadingTask.value = true
        try {
            const { data } = await getTasksByUser(userId)
            tasks.value = data
        } catch (err) {
            errorTask.value = err
        } finally {
            loadingTask.value = false
        }
    }

    return { tasks, loadingTask, errorTask, fetchTasksByUser }
}
