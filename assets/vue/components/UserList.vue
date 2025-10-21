<template>
    <div class="card">
        <div class="list-header">
            Listado de Usuarios
        </div>
        <div class="table-responsive">
            <table class="table table-blue mb-0" v-if="!loading && users.length">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Identificación</th>
                    <th>Teléfono</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="user in users" :key="user.id">
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.identification }}</td>
                    <td>{{ user.phone }}</td>
                    <td>
                        <span class="badge" :class="user.active ? 'badge-status-active' : 'badge-status-delayed'">
                            {{ user.active ? 'Si' : 'No' }}
                        </span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tasksModal" @click="fetchTasksByUser(user.id)">
                            Ver tareas
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <Modal>
    <div class="card">
        <div class="table-responsive">
            <table
                class="table table-blue mb-0"
                v-if="!loadingTask && tasks.length"
            >
                <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Proyecto</th>
                    <th>Tarifa</th>
                    <th>Asignado a</th>
                    <th>Estado</th>
                    <th>Fecha de Actualización</th>
                </tr>
                </thead>
                <tbody>
                    <tr v-for="task in tasks" :key="task.id">
                        <td class="fw-bold">{{ task.name }}</td>
                        <td>{{ task.description }}</td>
                        <td class="fw-bold">{{ task.project }}</td>
                        <td class="fw-bold">{{ task.rate ? "$" + task.rate : "$0" }}</td>
                        <td>{{ task.user }}</td>
                        <td>
                        <span class="badge" :class="task.active ? 'badge-status-active' : 'badge-status-delayed'">
                            {{ task.active ? 'Si' : 'No' }}
                        </span>
                        </td>
                        <td>{{ task.updateAt }}</td>
                    </tr>
                </tbody>
            </table>
            <tr v-else>
                <td colspan="8" class="text-center">No hay tareas</td>
            </tr>
        </div>
    </div>

    </Modal>
</template>

<script setup>
import { useUser } from '../composables/useUser'
import Modal from "./Modal.vue";
import {useTask} from "../composables/useTask";

const { users, loading, error } = useUser()
const { tasks, loadingTask, errorTask, fetchTasksByUser } = useTask()

</script>

<style scoped>

</style>
