<?php

use App\Models\CandidateHability;
use App\Models\DocumentType;
use App\Models\Genre;
use App\Models\JobBond;
use App\Models\MatrialStatus;
use App\Models\NotificationStatus;
use App\Models\NotificationType;
use App\Models\PermissionInformation;
use App\Models\Profession;
use App\Models\Type_vehicle;
use App\Models\User;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class DefaultInserts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @throws Exception
     */
    public function up(): void
    {

        $roles = [
            [
                'name' => 'Desenvolvedor',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Administrador',
                'guard_name' => 'web',
            ],
            [
                'name' => 'Funcionário',
                'guard_name' => 'web',
            ]
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate($role);
        }

        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Ver Menu de Desenvolvedor', 'guard_name' => 'web']);
        Role::findByName('Administrador')->permissions()->firstOrCreate(['name' => 'Ver Menu de Administrador', 'guard_name' => 'web']);
        Role::findByName('Funcionário')->permissions()->firstOrCreate(['name' => 'Ver Menu de Funcionário', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Ver e listar Permissões', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Criar Permissões', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Editar Permissões', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Deletar Permissões', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Ver e Listar Regras', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Criar Regras', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Editar Regras', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Deletar Regras', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Ver e Listar Usuários', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Criar Usuários', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Editar Usuários', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Deletar Usuários', 'guard_name' => 'web']);

        //travel
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Ver e Listar Pessoas', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Criar Pessoas', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Editar Pessoas', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Deletar Pessoas', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Ver e Listar Documentos', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Criar Documentos', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Editar Documentos', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Deletar Documentos', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Ver e Listar E-mails', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Criar E-mails', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Editar E-mails', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Deletar E-mails', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Ver e Listar Telefones', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Criar Telefones', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Editar Telefones', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Deletar Telefones', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Ver e Listar Departamentos', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Criar Departamentos', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Editar Departamentos', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Deletar Departamentos', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Ver e Listar Unidades', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Criar Unidades', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Editar Unidades', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Deletar Unidades', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Ver e Listar Endereços', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Criar Endereços', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Editar Endereços', 'guard_name' => 'web']);
        Role::findByName('Desenvolvedor')->permissions()->firstOrCreate(['name' => 'Deletar Endereços', 'guard_name' => 'web']);

        $document_types = [
            ['type' => 'CPF'],
            ['type' => 'RG'],
            ['type' => 'PASSAPORTE'],
            ['type' => 'CADASTUR'],
            ['type' => 'RESEXMAR'],
            ['type' => 'CNH'],
            ['type' => 'CNPJ'],
            ['type' => 'INSCRIÇÃO MUNICIPAL'],
            ['type' => 'INSCRIÇÃO ESTADUAL'],
            ['type' => 'SUS o Cartão Nacional de Saúde (CNS)']
        ];

        foreach ($document_types as $document_type) {
            DocumentType::firstOrCreate($document_type);
        }

        $permission_informations = [
            [
                'permission_id' => 1,
                'description' => 'acesso total no sistema'
            ],
            [
                'permission_id' => 2,
                'description' => ' - '
            ],
            [
                'permission_id' => 3,
                'description' => ' - '
            ],
            [
                'permission_id' => 4,
                'description' => ' - '
            ],
            [
                'permission_id' => 5,
                'description' => ' - '
            ],
            [
                'permission_id' => 6,
                'description' => ' - '
            ],
            [
                'permission_id' => 7,
                'description' => ' - '
            ],
            [
                'permission_id' => 8,
                'description' => ' - '
            ],
            [
                'permission_id' => 9,
                'description' => ' - '
            ],
            [
                'permission_id' => 10,
                'description' => ' - '
            ],
            [
                'permission_id' => 11,
                'description' => ' - '
            ],
            [
                'permission_id' => 12,
                'description' => ' - '
            ],
            [
                'permission_id' => 13,
                'description' => ' - '
            ],
            [
                'permission_id' => 14,
                'description' => ' - '
            ],
            [
                'permission_id' => 15,
                'description' => ' - '
            ],
            [
                'permission_id' => 16,
                'description' => ' - '
            ],
            [
                'permission_id' => 17,
                'description' => ' - '
            ],
            [
                'permission_id' => 18,
                'description' => ' - '
            ],
            [
                'permission_id' => 19,
                'description' => ' - '
            ],
            [
                'permission_id' => 20,
                'description' => ' - '
            ],
            [
                'permission_id' => 21,
                'description' => ' - '
            ],
            [
                'permission_id' => 22,
                'description' => ' - '
            ],
            [
                'permission_id' => 23,
                'description' => ' - '
            ],
            [
                'permission_id' => 24,
                'description' => ' - '
            ],
            [
                'permission_id' => 25,
                'description' => ' - '
            ],
            [
                'permission_id' => 26,
                'description' => ' - '
            ],
            [
                'permission_id' => 27,
                'description' => ' - '
            ],
            [
                'permission_id' => 28,
                'description' => ' - '
            ],
            [
                'permission_id' => 29,
                'description' => ' - '
            ],
            [
                'permission_id' => 30,
                'description' => ' - '
            ],
            [
                'permission_id' => 31,
                'description' => ' - '
            ],
            [
                'permission_id' => 32,
                'description' => ' - '
            ],
            [
                'permission_id' => 33,
                'description' => ' - '
            ],
            [
                'permission_id' => 34,
                'description' => ' - '
            ],
            [
                'permission_id' => 35,
                'description' => ' - '
            ],
            [
                'permission_id' => 36,
                'description' => ' - '
            ],
            [
                'permission_id' => 37,
                'description' => ' - '
            ],
            [
                'permission_id' => 38,
                'description' => ' - '
            ],
            [
                'permission_id' => 39,
                'description' => ' - '
            ],
            [
                'permission_id' => 40,
                'description' => ' - '
            ],
            [
                'permission_id' => 41,
                'description' => ' - '
            ],
            [
                'permission_id' => 42,
                'description' => ' - '
            ],
            [
                'permission_id' => 43,
                'description' => ' - '
            ]
        ];

        foreach ($permission_informations as $permission_information) {
            PermissionInformation::firstOrCreate($permission_information);
        }

        $genre_types = [
            ['type' => 'Feminino'],
            ['type' => 'Masculino']
        ];

        foreach ($genre_types as $genre_type) {
            Genre::firstOrCreate($genre_type);
        }

        $matrial_status_types = [
            ['type' => 'Solteiro(a)'],
            ['type' => 'Casado(a)'],
            ['type' => 'Viúvo(a)'],
            ['type' => 'Separado(a)'],
            ['type' => 'Divorciado(a)'],
            ['type' => 'União estável'],
            ['type' => 'outro']
        ];

        foreach ($matrial_status_types as $matrial_status_type) {
            MatrialStatus::firstOrCreate($matrial_status_type);
        }

        $notification_statuses = [
            ['status' => 'Visualizado'],
            ['status' => 'Não visualizado'],
            ['status' => 'Confirmado'],
            ['status' => 'Rejeitado'],
            ['status' => 'Armazenado']
        ];

        foreach ($notification_statuses as $notification_status) {
            NotificationStatus::firstOrCreate($notification_status);
        }

        $notification_types = [
            [   
                'title' => 'Novidades', 
                'active' => 1
            ],
            [   
                'title' => 'Atividades da Conta', 
                'active' => 1
            ],
            [   
                'title' => 'Acessos de novos navegadores', 
                'active' => 1
            ]
        ];

        foreach ($notification_types as $notification_type) {
            NotificationType::firstOrCreate($notification_type);
        }

        if (!App::environment('production')) {
            Model::withoutEvents(function () {
                User::create([
                        'name' => 'Admin',
                        'email' => 'admin@admin.com',
                        'password' => Hash::make('admin')
                    ]
                );
            });
        }

        if(App::environment('production')) {
            User::create([
                'name'      => 'Admin',
                'email'     => 'code.dev@arraial.rj.gov.br',
                'status'    => 'active',
                'password'  =>  Hash::make('@135devcode')
            ]);
        }
        User::find(1)->syncRoles(Role::all());
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
    }
}
