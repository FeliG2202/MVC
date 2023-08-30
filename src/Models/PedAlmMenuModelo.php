<?php

namespace PHP\Models;

use PDO;
use PDOException;
use PHP\Models\Connection;
use LionDatabase\Drivers\MySQL\MySQL as DB;

class PedAlmMenuModelo extends Connection {

    public $tabla = 'personas';
    public $tablaMDP = 'menu_seleccionado_dia_persona';

    public function validarIdentificacion($identMenu) {
        $sql = "SELECT idPersona FROM $this->tabla WHERE personaDocumento = ?";

        try {
            $stmt = $this->conectar()->prepare($sql);
            $stmt->bindParam(1, $identMenu);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error al validar el número de identificación: ' . $e->getMessage();
            return false;
        }
    }

    public function consultarAlmMenuIdModelo(int $idPersona) {
        return DB::table('personas')
        ->select()
        ->where(DB::equalTo("idPersona"), $idPersona)
        ->get();
    }

    public function updateCode(array $data) {
        return DB::table('personas')->update([
            'personasCodigo' => $data['code']
        ])->where(
            DB::equalTo("idPersona"),
            $data['idPersona']
        )->execute();
    }

    public function consultarMenuModelo($dia, $semana) {
        $sql = "SELECT * FROM view_nutrimenu WHERE nutriDiasNombre=? AND nutriMenuSemana=?";

        try {
            $stmt = $this->conectar()->prepare($sql);
            $stmt->bindParam(1, $dia, PDO::PARAM_STR);
            $stmt->bindParam(2, $semana, PDO::PARAM_INT);
            return !$stmt->execute() ? [] : $stmt->fetchAll();
        } catch (PDOException $e) {
            print($e->getMessage());
        }
    }

    public function registrarMenuDiaModelo($data) {
        $sql = "INSERT INTO {$this->tablaMDP} (idPersona,idNutriMenu,menuSeleccionadoDiaPersona,fecha_actual) VALUES (?,?,?,?)";
        $menu_str = trim(implode(",", $data['list']));

        try {
            $stmt = $this->conectar()->prepare($sql);
            $stmt->bindParam(1, $data['idPersona'], PDO::PARAM_INT);
            $stmt->bindParam(2, $data['idMenu'], PDO::PARAM_INT);
            $stmt->bindParam(3, $menu_str, PDO::PARAM_STR);
            $stmt->bindParam(4, $data['date'], PDO::PARAM_STR);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
    }

    public function consultarAlmMenuApartModelo() {
        return DB::table(
            DB::as('menu_seleccionado_dia_persona', 'msd')
        )->select(
            DB::column('personaNombreCompleto', 'prs'),
            DB::column('menuSeleccionadoDiaPersona', 'msd'),
            DB::column('fecha_actual', 'msd'),
        )->inner()->join(
            DB::as('personas', 'prs'),
            DB::column('idPersona', 'msd'),
            DB::column('idPersona', 'prs'),
        )->getAll();
    }

    public function generateReportDatesDB() {
        return DB::table(
            DB::as('menu_seleccionado_dia_persona', 'msd')
        )->select(
            DB::column('personaNombreCompleto', 'prs'),
            DB::column('menuSeleccionadoDiaPersona', 'msd'),
            DB::column('fecha_actual', 'msd'),
        )->inner()->join(
            DB::as('personas', 'prs'),
            DB::column('idPersona', 'msd'),
            DB::column('idPersona', 'prs'),
        )->where('fecha_actual')
        ->between(request->date_start, request->date_end)
        ->getAll();
    }
}
