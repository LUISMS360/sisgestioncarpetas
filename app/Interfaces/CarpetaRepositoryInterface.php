<?php

namespace App\Interfaces;

interface CarpetaRepositoryInterface
{
    public function createNew($data);
    public function searchByUser($dni);
    public function addHjAceptcion($data);
    public function addCriteriosEvCualitativa($data);
    public function addHjEvaluacion($data);
    public function addHjInforme($data);
    public function addMonitoreo($data);
    public function addHjResumen($data);
}
