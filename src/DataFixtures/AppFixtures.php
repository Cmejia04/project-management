<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Project;
use App\Entity\Task;
use App\Entity\UserProject;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('es_ES');

        // Crear usuarios
        $users = [];
        for ($i = 0; $i < 4; $i++) {
            $user = new User();
            $user->setName($faker->name());
            $user->setEmail($faker->unique()->email());
            $user->setIdentification($faker->unique()->randomNumber());
            $user->setPhone($faker->randomNumber());
            $manager->persist($user);
            $users[] = $user;
        }

        $projectNames = [
            'Rediseño Web',
            'App Móvil',
            'Sistema ERP',
            'Portal de Clientes',
            'Dashboard de Ventas',
            'Consultoría Digital',
            'Optimización SEO',
            'Migración a la Nube',
            'Automatización de Procesos',
            'Gestor de Inventario'
        ];

        // Crear proyectos
        $projects = [];
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->setName($faker->randomElement($projectNames));
            $project->setDescription($faker->paragraph());
            $manager->persist($project);
            $projects[] = $project;
        }

        // Crear relacion entre usuarios y projectos
        $userProjects = [];
        foreach ($projects as $project) {
            $userProject = new UserProject();
            $userProject->setProject($project);
            $userProject->setUser($faker->randomElement($users));
            $userProject->setRate($faker->randomFloat(2, 0, 100));
            $manager->persist($userProject);
            $userProjects[] = $userProject;
        }

        $taskNames = [
            'Diseñar la interfaz de usuario',
            'Implementar autenticación de usuarios',
            'Revisar requerimientos del cliente',
            'Configurar entorno de desarrollo',
            'Optimizar rendimiento de la base de datos',
            'Realizar pruebas unitarias',
            'Escribir documentación técnica',
            'Integrar API externa',
            'Diseñar logo y branding',
            'Configurar despliegue continuo (CI/CD)',
            'Revisar código en pull request',
            'Actualizar dependencias del proyecto',
            'Analizar métricas de rendimiento',
            'Crear backup automatizado',
            'Reunión con el cliente',
            'Planificar sprint semanal',
            'Corregir errores reportados',
            'Prototipar nueva funcionalidad',
            'Ajustar permisos de usuarios',
            'Actualizar dashboard de reportes'
        ];


        // Crear tareas
        foreach ($userProjects as $userProject) {
            $task = new Task();
            $task->setName($faker->randomElement($taskNames));
            $task->setDescription($faker->paragraph());
            $task->setEstimation($faker->numberBetween(1, 16));
            $task->setActive($faker->boolean());
            $task->setUserProject($userProject);
            $manager->persist($task);
        }

        $manager->flush();
    }
}
