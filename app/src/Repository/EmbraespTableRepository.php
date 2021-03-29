<?php

namespace App\Repository;
ini_set('max_execution_time', '500');
set_time_limit(0);
use App\Model\EmbraespTable;

class EmbraespTableRepository extends Repository
{
    private \PDO $conn;
    public EmbraespTable $table;

    public function __construct()
    {

        $this->conn = $this->getConnection();
    }

    public function clean() :void
    {
        $sql = "DELETE FROM embraesptable";
        $this->conn->prepare($sql)->execute();
    }

    public function count()
    {
        $sql = "SELECT count(*) as count from embraesptable";
        $count = $this->conn->prepare($sql)->execute()->fetch(PDO::FETCH_ASSOC);
        var_dump($count);
        die();
        return $count['count'];
    }

    public function save() :void
    {
        parent::save();



        $sql = "INSERT INTO embraesptable (
                            origem,
                            tipo,
                            dataLancamento,
                            nomeDoEmpreendimento,
                            zonaDeValor,
                            endereco,
                            ficha,
                            dormitorios,
                            banheiros,
                            vagas,
                            elevadores,
                            coberturas,
                            blocos,
                            unidades,
                            andares,
                            totalUnidades,
                            dataEntrega,
                            areaUtil,
                            areaTotal,
                            terreno,
                            precoReal,
                            precoAreaUtilReal,
                            precoAreaTotalReal,
                            precoDolar,
                            precoAreaUtilDolar,
                            precoAreaTotalDolar,
                            agente,
                            vendedora,
                            consultora,
                            engenheiro,
                            arquiteto
                            ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        try {

           $this->conn->prepare($sql)->execute(
               [
                   $this->table->getOrigem(),
                   $this->table->getTipo(),
                   $this->table->getDataLancamento(),
                   $this->table->getNomeDoEmpreendimento(),
                   $this->table->getZonaDeValor(),
                   $this->table->getEndereco(),
                   $this->table->getFicha(),
                   $this->table->getDormitorios(),
                   $this->table->getBanheiros(),
                   $this->table->getVagas(),
                   $this->table->getElevadores(),
                   $this->table->getCoberturas(),
                   $this->table->getBlocos(),
                   $this->table->getUnidades(),
                   $this->table->getAndares(),
                   $this->table->getTotalUnidades(),
                   $this->table->getDataEntrega(),
                   $this->table->getAreaUtil(),
                   $this->table->getAreaTotal(),
                   $this->table->getTerreno(),
                   $this->table->getPrecoReal(),
                   $this->table->getPrecoAreaUtilReal(),
                   $this->table->getPrecoAreaTotalReal(),
                   $this->table->getPrecoDolar(),
                   $this->table->getPrecoAreaUtilDolar(),
                   $this->table->getPrecoAreaTotalDolar(),
                   $this->table->getAgente(),
                   $this->table->getVendedora(),
                   $this->table->getConsultora(),
                   $this->table->getEngenheiro(),
                   $this->table->getArquiteto()

               ]
           );
        } catch (\PDOException $ex) {
            var_dump($ex->getMessage());
        }


    }


}