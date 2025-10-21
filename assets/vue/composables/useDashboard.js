import { ref, onMounted } from 'vue'
import { getDashboards } from '../services/api'

export function useDashboard() {
    const dashboards = ref([])
    const loading = ref(true)
    const error = ref(null)

    const fetchDashboards = async () => {
        loading.value = true
        try {
            const { data } = await getDashboards()
            dashboards.value = data
        } catch (err) {
            error.value = err
        } finally {
            loading.value = false
        }
    }

    onMounted(fetchDashboards)

    return { dashboards, loading, error, fetchDashboards }
}
