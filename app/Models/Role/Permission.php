<?php

namespace App\Models\Role;

use App\Core\AbstractModel;

class Permission extends AbstractModel
{
    protected string $table = 'permissions';
    protected string $primaryKey = 'id';

    protected array $fillable = [
        "name",
        "label",
        "group_name"
    ];

    protected array $required = [
        "name" => " O Campo Nome é obrigatório ",
        "label" => "O Campo Label é obrigatório",
        "group_name" => "O Campo Grupo é obrigatório"
    ];
    protected bool $timestamps = false;
    protected bool $softDelete = false;

    public function getId(): int
    {
        return $this->attributes["id"];
    }

    public function setName(string $name): void
    {
        $name = trim(strip_tags($name));
        if (strlen($name) < 5) {
            throw new \InvalidArgumentException("O nome da permissão deve ter no pelo menos 5 caracteres");
        }
        if (strlen($name) < 100) {
            throw new \InvalidArgumentException("O nome da permissão deve ter até 100 caracteres.");
        }
        $this->attributes["name"] = $name;
    }

    public function getName(): string
    {
        return $this->attributes["name"];
    }
    public function setLabel(string $label): void
    {
        $label = trim(strip_tags($label));
        if (strlen($label) < 15) {
            throw new \InvalidArgumentException("O nome da permissão deve ter no pelo menos 15 caracteres!");
        }
        if (strlen($label) < 150) {
            throw new \InvalidArgumentException("O nome da permissão deve ter até 150 caracteres!");
        }
        $this->attributes["label"] = $label;
    }

    public function getLabel(): string{
        return $this->attributes["label"];
    }
    public function setGroupName(string $groupName): void{
        $groupName = trim(strip_tags($groupName));
        if (strlen($groupName) < 5) {
            throw new \InvalidArgumentException("O nome do grupo da permissão deve ter no pelo menos 5 caracteres");
        }
        if (strlen($groupName) < 100) {
            throw new \InvalidArgumentException("O nome do grupo da permissão deve ter até 100 caracteres.");
        }
        $this->attributes["group_name"] = $groupName;
    }
    public function getGroupName(): string{
        return $this->attributes["group_name"];
    }

    public function groupedByGroup(): array
    {
        $sql = "SELECT id, name, label, group_name
                FROM {$this->table}
                ORDER BY group_name, label";

        $statement = $this->connection->prepare($sql);
        $statement->execute();

        $grouped = [];

        foreach ($statement->fetchAll(\PDO::FETCH_ASSOC) as $row) {
            $grouped[$row["group_name"]][] = $row;
        }

        return $grouped;
    }

}