<?php

namespace App\Core;

class Permission
{
    //CHAMADOS
    public const OPEN_TICKET = 'abrir_chamado';
    public const VIEW_MY_TICKETS = 'ver_meus_chamados';
    public const VIEW_ALL_TICKETS = 'ver_todos_chamados';
    public const COMMENT_TICKET = 'comentar_chamado';
    public const ATTACH_FILE_TICKET = 'anexar_arquivo_chamado';
    public const CONFIRM_RESOLUTION = 'confirmar_resolucao';
    public const REOPEN_TICKET = 'reabrir_chamado';
    public const ASSIGN_TICKET = 'atribuir_chamado';
    public const TAKE_TICKET = 'assumir_chamado';
    public const EDIT_TICKET = 'editar_chamado';
    public const CLOSE_TICKET = 'fechar_chamado';
    public const ARCHIVE_TICKET = 'arquivar_chamado';
    public const DELETE_TICKET = 'excluir_chamado';
    public const VIEW_TICKET_HISTORY = 'ver_historico_chamado';
    public const VIEW_MY_ASSIGNED_TICKETS = 'ver_chamados_atribuidos_a_mim';

    //COMENTÁRIOS
    public const EDIT_OWN_COMMENT = 'editar_proprio_comentario';
    public const DELETE_OWN_COMMENT = 'excluir_proprio_comentario';
    public const DELETE_ANY_COMMENT = 'excluir_qualquer_comentario';

    //ANEXOS
    public const  DELETE_OWN_ATTACHMENT = 'excluir_proprio_anexo';
    public const DELETE_ANY_ATTACHMENT = 'excluir_qualquer_anexo';
    public const DOWNLOAD_ATTACHMENT = 'baixar_anexo';

    //DASHBOARD
    public const  VIEW_REQUEST_DASHBOARD = 'ver_dashboard_solicitante';
    public const VIEW_TECHNICIAN_DASHBOARD = 'Ver_dashboard_tecnico';
    public const VIEW_MANAGER_DASHBOARD = 'ver_dashboard_gestor';

    //RELATORIOS
    public const  VIEW_REPORTS = 'ver_relatorios';
    public const EXPORT_REPORTS = 'exportar_relatorios';

    //USUARIOS
    public const VIEW_USERS = 'ver_usuarios';
    public const CREATE_USER = 'criar_usuario';
    public const EDIT_USER = 'editar_usuario';
    public const TOGGLE_USER_STATUS = 'ativar_inativar_usuario';
    public const DELETE_USER = 'excluir_usuario';
    public const RESET_USER_PASSWORD = 'redefinir_senha_usuario';
    public const VIEW_USER_LAST_ACCESS = 'ver_ultimo_acesso_usuario';

    //PERFIS
    public const VIEW_ROLES = 'ver_perfis';
    public const CREATE_ROLE = 'criar_perfil';
    public const EDIT_ROLE = 'editar_perfil';
    public const DELETE_ROLE = 'excluir_perfil';
    public const MANAGE_ROLE_PERMISSIONS = 'gerenciar_permissoes_perfil';

    //DEPARTAMENTOS
    public const VIEW_DEPARTMENTS = 'ver_departamentos';
    public const CREATE_DEPARTMENTS = 'criar_departamentos';
    public const EDIT_DEPARTMENTS = 'editar_departamentos';
    public const DELETE_DEPARTMENTS = 'excluir_departamentos';
    public const LINK_USER_DEPARTMENT = 'vincular_usuario_departamento';
    public const UNLINK_USER_DEPARTMENT = 'desvincular_usuario_departamento';

    //CATEGORIAS
    public const VIEW_CATEGORIES = 'ver_categoria';
    public const CREATE_CATEGORIES = 'criar_categoria';
    public const EDIT_CATEGORIES = 'editar_categoria';
    public const DELETE_CATEGORIES = 'excluir_categoria';

    //ESCOLAS
    public const VIEW_SCHOOLS = 'ver_escolas';
    public const CREATE_SCHOOL = 'criar_escola';
    public const EDIT_SCHOOL = 'editar_escola';
    public const DELETE_SCHOOL = 'excluir_escola';

    //PERFIL_PESSOAL
    public const EDIT_OWN_PROFILE = 'editar_proprio_perfil';
    public const CHANGE_OWN_PASSWORD = 'alterar_propria_senha';

    //SISTEMA
    public const VIEW_SYSTEM_LOG = 'ver_log_sistema';
    public const MANAGE_SESSIONS = 'gerenciar_sessoes';


    public function __construct()
    {
    }
}