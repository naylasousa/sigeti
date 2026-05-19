<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Message;
use App\Core\Permission;
use App\Models\Role\Role;
use App\Models\Role\RolePermission;

class RolePermissionController extends Controller
{
    public function __construct()
    {
        parent::__construct("App");
    }
    public function update(?array $data): void
    {
        Auth::requirePermission(Permission::EDIT_ROLE);
        $permissionId = $data["id"];
        $this->validateCsrfToken($data, "/admin/perfis/editar/" . $permissionId. "/permissoes");
        $role = Role::find($data['id']);
        if($role->isProtected()){
            Message::warning("O oerfil é protegido e não pode ter as permissões editadas");
            redirect("admin/perfis");
            return;
        }

        $permissionIds = array_map('intval', $data['permissions'] ?? []);


        try {
            if(!$role){
                Message::error("Esse perfil não existe!");
                redirect("/admin/perfis");
                return;
            }
            RolePermission::syncPermissions($role->getId(), $permissionIds);


        } catch (\InvalidArgumentException $invalidArgumentException) {
            Message::error($invalidArgumentException->getMessage());
            redirect("/admin/perfis/editar/" . $permissionId);
            return;
        }

        Message::success("Permissões atualizada com sucesso!");
        redirect("/admin/perfis/editar/" . $permissionId );

    }
}