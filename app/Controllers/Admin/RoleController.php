<?php

namespace App\Controllers\Admin;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Message;
use App\Core\Permission;
use App\Models\Role\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        parent::__construct('App');
        Auth::requirePermission(Permission::VIEW_ROLES);
    }

    public function index(): void
    {
        Auth::requirePermission(Permission::VIEW_ROLES);

        $roles = new Role();
        $roles = $roles
            ->orderBy("name", "ASC")
            ->get();


        echo $this->view->render("admin/role/index", [
            "roles" => $roles
        ]);
    }

    public function create(): void
    {
        Auth::requirePermission(Permission::CREATE_ROLE);
        echo $this->view->render("admin/role/create");

        clear_old();
    }

    public function store(?array $data): void
    {
        Auth::requirePermission(Permission::CREATE_ROLE);
        $this->validateCsrfToken($data, "admin/perfis/cadastrar");

        $newRole = new Role();

        try {
            $newRole->fill([
                "name" => $data["name"],
                "description" => $data["description"]
            ]);

            $errors = array_merge(
                $newRole->validate($data),
                $newRole->validateBusinessRule()
            );

            if ($errors) {

                flash_old($data);

                foreach ($errors as $error) {
                    Message::warning($error);
                }
                redirect("admin/perfis/cadastrar");
            }

            $newRole->save();

        } catch (\InvalidArgumentException $invalidArgumentException) {
            Message::error($invalidArgumentException->getMessage());
            redirect("admin/perfis/cadastrar");
            return;
        }

        Message::success("Perfil cadastrado com sucesso.");
        redirect("admin/perfis/editar/" . $newRole->getId());
    }

    public function edit(?array $data): void
    {
        Auth::requirePermission(Permission::EDIT_ROLE);
        $role = Role::find($data["id"]);

        if (!$role) {
            Message::warning("Perfil não cadastrado ou não existe.");
            redirect("admin/perfis");
            return;
        }

        echo $this->view->render("admin/role/edit", [
            "role" => $role
        ]);

        clear_old();
    }

    public function update(?array $data): void
    {
        Auth::requirePermission(Permission::EDIT_ROLE);
        $this->validateCsrfToken($data, "admin/perfis");

        $role = Role::find($data["id"]);

        if (!$role) {
            Message::warning("Esse perfil não existe.");
            redirect("admin/perfis");
            return;
        }

        try {
            $role->fill([
                "name" => $data["name"],
                "description" => $data["description"]
            ]);

            $errors = array_merge(
                $role->validate($data),
                $role->validateBusinessRule($role->getId())
            );

            if ($errors) {

                flash_old($data);

                foreach ($errors as $error) {
                    Message::warning($error);
                }
                redirect("admin/perfis/editar" . $role->getId());
            }

            $role->save();

        } catch (\InvalidArgumentException $invalidArgumentException) {

            Message::error($invalidArgumentException->getMessage());
            redirect("admin/perfis/editar/" . $role->getId());
            return;
        }

        Message::success("Perfil atualizado com sucesso.");
        redirect("admin/perfis");

    }

}