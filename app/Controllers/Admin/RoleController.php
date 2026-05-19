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
<<<<<<< HEAD
        parent::__construct('App');
=======
        parent::__construct("App");
>>>>>>> 98cef16b49e68a4b5d2cb7c5d7968329b2854e0e
        Auth::requirePermission(Permission::VIEW_ROLES);
    }

    public function index(): void
    {
<<<<<<< HEAD
        Auth::requirePermission(Permission::VIEW_ROLES);

        $roles = new Role();
        $roles = $roles
            ->orderBy("name", "ASC")
            ->get();


        echo $this->view->render("admin/role/index", [
            "roles" => $roles
        ]);
=======
        $roles = (new Role())->orderBy("name", "ASC")->get();

        echo $this->view->render("admin/role/index", [
            "roles" => $roles,
        ]);

        clear_old();
>>>>>>> 98cef16b49e68a4b5d2cb7c5d7968329b2854e0e
    }

    public function create(): void
    {
        Auth::requirePermission(Permission::CREATE_ROLE);
<<<<<<< HEAD
        echo $this->view->render("admin/role/create");

=======

        echo $this->view->render("admin/role/create");
>>>>>>> 98cef16b49e68a4b5d2cb7c5d7968329b2854e0e
        clear_old();
    }

    public function store(?array $data): void
    {
        Auth::requirePermission(Permission::CREATE_ROLE);
<<<<<<< HEAD
        $this->validateCsrfToken($data, "admin/perfis/cadastrar");
=======

        $this->validateCsrfToken($data, "/admin/perfis/cadastrar");
>>>>>>> 98cef16b49e68a4b5d2cb7c5d7968329b2854e0e

        $newRole = new Role();

        try {
            $newRole->fill([
                "name" => $data["name"],
<<<<<<< HEAD
                "description" => $data["description"]
=======
                "description" => $data["description"] ?? null,
                "is_protected" => 0,
>>>>>>> 98cef16b49e68a4b5d2cb7c5d7968329b2854e0e
            ]);

            $errors = array_merge(
                $newRole->validate($data),
                $newRole->validateBusinessRule()
            );

            if ($errors) {
<<<<<<< HEAD

                flash_old($data);

                foreach ($errors as $error) {
                    Message::warning($error);
                }
                redirect("admin/perfis/cadastrar");
=======
                flash_old($data);
                foreach ($errors as $error) {
                    Message::warning($error);
                }
                redirect("/admin/perfis/cadastrar");
                return;
>>>>>>> 98cef16b49e68a4b5d2cb7c5d7968329b2854e0e
            }

            $newRole->save();

        } catch (\InvalidArgumentException $invalidArgumentException) {
            Message::error($invalidArgumentException->getMessage());
<<<<<<< HEAD
            redirect("admin/perfis/cadastrar");
=======
            redirect("/admin/perfis/cadastrar");
>>>>>>> 98cef16b49e68a4b5d2cb7c5d7968329b2854e0e
            return;
        }

        Message::success("Perfil cadastrado com sucesso.");
<<<<<<< HEAD
        redirect("admin/perfis/editar/" . $newRole->getId());
=======
        redirect("/admin/perfis/editar/" . $newRole->getId());
>>>>>>> 98cef16b49e68a4b5d2cb7c5d7968329b2854e0e
    }

    public function edit(?array $data): void
    {
        Auth::requirePermission(Permission::EDIT_ROLE);
<<<<<<< HEAD
        $role = Role::find($data["id"]);

        if (!$role) {
            Message::warning("Perfil não cadastrado ou não existe.");
            redirect("admin/perfis");
=======

        $role = Role::find((int)$data["id"]);

        if (!$role) {
            Message::warning("Perfil não encontrado ou não existe.");
            redirect("/admin/perfis");
>>>>>>> 98cef16b49e68a4b5d2cb7c5d7968329b2854e0e
            return;
        }

        echo $this->view->render("admin/role/edit", [
<<<<<<< HEAD
            "role" => $role
=======
            "role" => $role,
>>>>>>> 98cef16b49e68a4b5d2cb7c5d7968329b2854e0e
        ]);

        clear_old();
    }

    public function update(?array $data): void
    {
        Auth::requirePermission(Permission::EDIT_ROLE);
<<<<<<< HEAD
        $this->validateCsrfToken($data, "admin/perfis");

        $role = Role::find($data["id"]);

        if (!$role) {
            Message::warning("Esse perfil não existe.");
            redirect("admin/perfis");
=======

        $this->validateCsrfToken($data, "/admin/perfis/editar/" . $data["id"]);

        $role = Role::find((int)$data["id"]);

        if (!$role) {
            Message::warning("Perfil não encontrado ou não existe.");
            redirect("/admin/perfis");
            return;
        }

        if ($role->isProtected()) {
            Message::warning("Este perfil é protegido e não pode ser editado.");
            redirect("/admin/perfis");
>>>>>>> 98cef16b49e68a4b5d2cb7c5d7968329b2854e0e
            return;
        }

        try {
            $role->fill([
                "name" => $data["name"],
<<<<<<< HEAD
                "description" => $data["description"]
=======
                "description" => $data["description"] ?? null,
>>>>>>> 98cef16b49e68a4b5d2cb7c5d7968329b2854e0e
            ]);

            $errors = array_merge(
                $role->validate($data),
                $role->validateBusinessRule($role->getId())
            );

            if ($errors) {
<<<<<<< HEAD

                flash_old($data);

                foreach ($errors as $error) {
                    Message::warning($error);
                }
                redirect("admin/perfis/editar" . $role->getId());
=======
                flash_old($data);
                foreach ($errors as $error) {
                    Message::warning($error);
                }
                redirect("/admin/perfis/editar/" . $role->getId());
                return;
>>>>>>> 98cef16b49e68a4b5d2cb7c5d7968329b2854e0e
            }

            $role->save();

        } catch (\InvalidArgumentException $invalidArgumentException) {
<<<<<<< HEAD

            Message::error($invalidArgumentException->getMessage());
            redirect("admin/perfis/editar/" . $role->getId());
=======
            Message::error($invalidArgumentException->getMessage());
            redirect("/admin/perfis/editar/" . $role->getId());
>>>>>>> 98cef16b49e68a4b5d2cb7c5d7968329b2854e0e
            return;
        }

        Message::success("Perfil atualizado com sucesso.");
<<<<<<< HEAD
        redirect("admin/perfis");

    }

=======
        redirect("/admin/perfis/editar/" . $role->getId());
    }

    public function destroy(?array $data): void
    {
        Auth::requirePermission(Permission::DELETE_ROLE);

        $this->validateCsrfToken($data, "/admin/perfis");

        $role = Role::find((int)$data["id"]);

        if (!$role) {
            Message::error("Perfil não encontrado ou não existe.");
            redirect("/admin/perfis");
            return;
        }

        if ($role->isProtected()) {
            Message::warning("Este perfil é protegido e não pode ser excluído.");
            redirect("/admin/perfis");
            return;
        }

        if ($role->existsUsers()) {
            Message::warning("Este perfil possui usuários vinculados e não pode ser excluído.");
            redirect("/admin/perfis");
            return;
        }

        try {
            $role->delete();
        } catch (\InvalidArgumentException $invalidArgumentException) {
            Message::error($invalidArgumentException->getMessage());
            redirect("/admin/perfis");
            return;
        }

        Message::success("Perfil excluído em segurança com sucesso.");
        redirect("/admin/perfis");
    }
>>>>>>> 98cef16b49e68a4b5d2cb7c5d7968329b2854e0e
}