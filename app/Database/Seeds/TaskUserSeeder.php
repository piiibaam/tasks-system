<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskUserSeeder extends Seeder
{
    public function run()
    {
        // Insert tasks
        $tasks = [
            [
                'title'      => 'Finish Database Laboratory',
                'status'     => 'pending',
                'task_date'  => '2026-09-24',
                'created_at' => '2026-09-24 08:00:00',
            ],
            [
                'title'      => 'Review CodeIgniter Routes',
                'status'     => 'completed',
                'task_date'  => '2026-09-24',
                'created_at' => '2026-09-24 09:00:00',
            ],
            [
                'title'      => 'Submit Networking Activity',
                'status'     => 'pending',
                'task_date'  => '2026-09-24',
                'created_at' => '2026-09-24 10:00:00',
            ],
            [
                'title'      => 'Study for Programming Quiz',
                'status'     => 'pending',
                'task_date'  => '2026-09-23',
                'created_at' => '2026-09-23 13:00:00',
            ],
            [
                'title'      => 'Work on Group Project',
                'status'     => 'completed',
                'task_date'  => '2026-09-23',
                'created_at' => '2026-09-23 15:00:00',
            ],
            [
                'title'      => 'Read Chapter 4',
                'status'     => 'pending',
                'task_date'  => '2026-09-22',
                'created_at' => '2026-09-22 10:00:00',
            ],
            [
                'title'      => 'Practice PHP',
                'status'     => 'completed',
                'task_date'  => '2026-09-22',
                'created_at' => '2026-09-22 14:00:00',
            ],
            [
                'title'      => 'Organize Project Files',
                'status'     => 'pending',
                'task_date'  => '2026-09-22',
                'created_at' => '2026-09-22 16:00:00',
            ],
        ];

        $this->db->table('tasks')->insertBatch($tasks);

        // Insert exactly one demo user
        $user = [
            'username'   => 'demo_user',
            'full_name'  => 'Demo User',
            'email'      => 'demo@example.com',
            'created_at' => '2026-09-24 08:00:00',
        ];

        $this->db->table('users')->insert($user);
    }
}