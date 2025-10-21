<template>
    <div class="row text-center mb-4" v-if="!loading">
        <div class="col-md-4 mb-3">
            <div class="card bg-primary-dark text-white h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Usuarios</h5>
                    <p class="card-text fs-2">{{ dashboards.usersCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card bg-primary-medium text-white h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Proyectos</h5>
                    <p class="card-text fs-2">{{ dashboards.projectsCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card bg-primary-light text-white h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Tareas</h5>
                    <p class="card-text fs-2">{{ dashboards.tasksCount }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useDashboard } from '../composables/useDashboard'

const { dashboards, loading, error } = useDashboard()
</script>

<style scoped>

</style>
