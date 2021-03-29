<?php

namespace App\Model;

use App\Controllers\Reader;
use App\Repository\EmbraespTableRepository;


class EmbraespTable
{
    private string|null $origem;
    private string|null $tipo;
    private string|null $dataLancamento;
    private string|null $nomeDoEmpreendimento;
    private string|null $zonaDeValor;
    private string|null $endereco;
    private string|null $ficha;
    private int|null $dormitorios;
    private int|null $banheiros;
    private int|null $vagas;
    private int|null $elevadores;
    private int|null $coberturas;
    private float|null $blocos;
    private int|null $unidades;
    private int|null $andares;
    private int|null $totalUnidades;
    private string|null $dataEntrega;
    private float|null $areaUtil;
    private float|null $areaTotal;
    private int|null $terreno;
    private float|null $precoReal;
    private float|null $precoAreaUtilReal;
    private float|null $precoAreaTotalReal;
    private float|null $precoDolar;
    private float|null $precoAreaUtilDolar;
    private float|null $precoAreaTotalDolar;
    private string|null $agente;
    private string|null $vendedora;
    private string|null $consultora;
    private string|null $engenheiro;
    private string|null $arquiteto;


    public function buildAndSave($worksheet): \ArrayObject
    {
        $tables = new \ArrayObject();
        $highestRow = $worksheet->getHighestRow(); // e.g. 10



        for ($row = 1; $row <= $highestRow; ++$row) {
            ob_start();
            $embraespTableRepository = new EmbraespTableRepository();
            $et = new EmbraespTable();
            $et->setOrigem($worksheet->getCellByColumnAndRow(1, $row)->getValue());
            $et->setTipo($worksheet->getCellByColumnAndRow(2, $row)->getValue());
            $et->setDataLancamento($worksheet->getCellByColumnAndRow(3, $row)->getValue());
            $et->setNomeDoEmpreendimento($worksheet->getCellByColumnAndRow(4, $row)->getValue());
            $et->setZonaDeValor($worksheet->getCellByColumnAndRow(5, $row)->getValue());
            $et->setEndereco($worksheet->getCellByColumnAndRow(6, $row)->getValue());
            $et->setFicha($worksheet->getCellByColumnAndRow(7, $row)->getValue());
            $et->setDormitorios((int)$worksheet->getCellByColumnAndRow(8, $row)->getValue());
            $et->setBanheiros((int)$worksheet->getCellByColumnAndRow(9, $row)->getValue());
            $et->setVagas((int)$worksheet->getCellByColumnAndRow(10, $row)->getValue());
            $et->setElevadores((int)$worksheet->getCellByColumnAndRow(11, $row)->getValue());
            $et->setCoberturas((int)$worksheet->getCellByColumnAndRow(12, $row)->getValue());
            $et->setBlocos((float)$worksheet->getCellByColumnAndRow(13, $row)->getValue());
            $et->setUnidades((int)$worksheet->getCellByColumnAndRow(14, $row)->getValue());
            $et->setAndares((int)$worksheet->getCellByColumnAndRow(15, $row)->getValue());
            $et->setTotalUnidades((int)$worksheet->getCellByColumnAndRow(16, $row)->getValue());
            $et->setDataEntrega($worksheet->getCellByColumnAndRow(17, $row)->getValue());
            $et->setAreaUtil((float)$worksheet->getCellByColumnAndRow(18, $row)->getValue());
            $et->setAreaTotal((float)$worksheet->getCellByColumnAndRow(19, $row)->getValue());
            $et->setTerreno((float)$worksheet->getCellByColumnAndRow(20, $row)->getValue());
            $et->setPrecoReal((float)$worksheet->getCellByColumnAndRow(21, $row)->getValue());
            $et->setPrecoAreaUtilReal((float)$worksheet->getCellByColumnAndRow(22, $row)->getValue());
            $et->setPrecoAreaTotalReal((float)$worksheet->getCellByColumnAndRow(23, $row)->getValue());
            $et->setPrecoDolar((float)$worksheet->getCellByColumnAndRow(24, $row)->getValue());
            $et->setPrecoAreaUtilDolar((float)$worksheet->getCellByColumnAndRow(25, $row)->getValue());
            $et->setPrecoAreaTotalDolar((float)$worksheet->getCellByColumnAndRow(26, $row)->getValue());
            $et->setAgente((float)$worksheet->getCellByColumnAndRow(27, $row)->getValue());
            $et->setVendedora($worksheet->getCellByColumnAndRow(28, $row)->getValue());
            $et->setConsultora($worksheet->getCellByColumnAndRow(29, $row)->getValue());
            $et->setEngenheiro($worksheet->getCellByColumnAndRow(30, $row)->getValue());
            $et->setArquiteto($worksheet->getCellByColumnAndRow(31, $row)->getValue());
            $embraespTableRepository->table = $et;
            $embraespTableRepository->save();
            ob_flush();
        }


        return $tables;
    }

    public function count():int
    {
        return (new EmbraespTableRepository)->count();

    }

    /**
     * @return string|null
     */
    public function getOrigem(): ?string
    {
        return $this->origem;
    }

    /**
     * @param string|null $origem
     * @return EmbraespTable
     */
    public function setOrigem(?string $origem): EmbraespTable
    {
        $this->origem = $origem;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    /**
     * @param string|null $tipo
     * @return EmbraespTable
     */
    public function setTipo(?string $tipo): EmbraespTable
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDataLancamento(): ?string
    {
        return $this->dataLancamento;
    }

    /**
     * @param string|null $dataLancamento
     * @return EmbraespTable
     */
    public function setDataLancamento(?string $dataLancamento): EmbraespTable
    {
        $this->dataLancamento = $dataLancamento;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNomeDoEmpreendimento(): ?string
    {
        return $this->nomeDoEmpreendimento;
    }

    /**
     * @param string|null $nomeDoEmpreendimento
     * @return EmbraespTable
     */
    public function setNomeDoEmpreendimento(?string $nomeDoEmpreendimento): EmbraespTable
    {
        $this->nomeDoEmpreendimento = $nomeDoEmpreendimento;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getZonaDeValor(): ?string
    {
        return $this->zonaDeValor;
    }

    /**
     * @param string|null $zonaDeValor
     * @return EmbraespTable
     */
    public function setZonaDeValor(?string $zonaDeValor): EmbraespTable
    {
        $this->zonaDeValor = $zonaDeValor;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEndereco(): ?string
    {
        return $this->endereco;
    }

    /**
     * @param string|null $endereco
     * @return EmbraespTable
     */
    public function setEndereco(?string $endereco): EmbraespTable
    {
        $this->endereco = $endereco;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFicha(): ?string
    {
        return $this->ficha;
    }

    /**
     * @param string|null $ficha
     * @return EmbraespTable
     */
    public function setFicha(?string $ficha): EmbraespTable
    {
        $this->ficha = $ficha;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDormitorios(): ?int
    {
        return $this->dormitorios;
    }

    /**
     * @param int|null $dormitorios
     * @return EmbraespTable
     */
    public function setDormitorios(?int $dormitorios): EmbraespTable
    {
        $this->dormitorios = $dormitorios;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getBanheiros(): ?int
    {
        return $this->banheiros;
    }

    /**
     * @param int|null $banheiros
     * @return EmbraespTable
     */
    public function setBanheiros(?int $banheiros): EmbraespTable
    {
        $this->banheiros = $banheiros;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getVagas(): ?int
    {
        return $this->vagas;
    }

    /**
     * @param int|null $vagas
     * @return EmbraespTable
     */
    public function setVagas(?int $vagas): EmbraespTable
    {
        $this->vagas = $vagas;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getElevadores(): ?int
    {
        return $this->elevadores;
    }

    /**
     * @param int|null $elevadores
     * @return EmbraespTable
     */
    public function setElevadores(?int $elevadores): EmbraespTable
    {
        $this->elevadores = $elevadores;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCoberturas(): ?int
    {
        return $this->coberturas;
    }

    /**
     * @param int|null $coberturas
     * @return EmbraespTable
     */
    public function setCoberturas(?int $coberturas): EmbraespTable
    {
        $this->coberturas = $coberturas;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getBlocos(): ?float
    {
        return $this->blocos;
    }

    /**
     * @param float|null $blocos
     * @return EmbraespTable
     */
    public function setBlocos(?float $blocos): EmbraespTable
    {
        $this->blocos = $blocos;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUnidades(): ?int
    {
        return $this->unidades;
    }

    /**
     * @param int|null $unidades
     * @return EmbraespTable
     */
    public function setUnidades(?int $unidades): EmbraespTable
    {
        $this->unidades = $unidades;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAndares(): ?int
    {
        return $this->andares;
    }

    /**
     * @param int|null $andares
     * @return EmbraespTable
     */
    public function setAndares(?int $andares): EmbraespTable
    {
        $this->andares = $andares;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTotalUnidades(): ?int
    {
        return $this->totalUnidades;
    }

    /**
     * @param int|null $totalUnidades
     * @return EmbraespTable
     */
    public function setTotalUnidades(?int $totalUnidades): EmbraespTable
    {
        $this->totalUnidades = $totalUnidades;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDataEntrega(): ?string
    {
        return $this->dataEntrega;
    }

    /**
     * @param string|null $dataEntrega
     * @return EmbraespTable
     */
    public function setDataEntrega(?string $dataEntrega): EmbraespTable
    {
        $this->dataEntrega = $dataEntrega;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getAreaUtil(): ?float
    {
        return $this->areaUtil;
    }

    /**
     * @param float|null $areaUtil
     * @return EmbraespTable
     */
    public function setAreaUtil(?float $areaUtil): EmbraespTable
    {
        $this->areaUtil = $areaUtil;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getAreaTotal(): ?float
    {
        return $this->areaTotal;
    }

    /**
     * @param float|null $areaTotal
     * @return EmbraespTable
     */
    public function setAreaTotal(?float $areaTotal): EmbraespTable
    {
        $this->areaTotal = $areaTotal;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTerreno(): ?int
    {
        return $this->terreno;
    }

    /**
     * @param int|null $terreno
     * @return EmbraespTable
     */
    public function setTerreno(?int $terreno): EmbraespTable
    {
        $this->terreno = $terreno;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrecoReal(): ?float
    {
        return $this->precoReal;
    }

    /**
     * @param float|null $precoReal
     * @return EmbraespTable
     */
    public function setPrecoReal(?float $precoReal): EmbraespTable
    {
        $this->precoReal = $precoReal;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrecoAreaUtilReal(): ?float
    {
        return $this->precoAreaUtilReal;
    }

    /**
     * @param float|null $precoAreaUtilReal
     * @return EmbraespTable
     */
    public function setPrecoAreaUtilReal(?float $precoAreaUtilReal): EmbraespTable
    {
        $this->precoAreaUtilReal = $precoAreaUtilReal;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrecoAreaTotalReal(): ?float
    {
        return $this->precoAreaTotalReal;
    }

    /**
     * @param float|null $precoAreaTotalReal
     * @return EmbraespTable
     */
    public function setPrecoAreaTotalReal(?float $precoAreaTotalReal): EmbraespTable
    {
        $this->precoAreaTotalReal = $precoAreaTotalReal;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrecoDolar(): ?float
    {
        return $this->precoDolar;
    }

    /**
     * @param float|null $precoDolar
     * @return EmbraespTable
     */
    public function setPrecoDolar(?float $precoDolar): EmbraespTable
    {
        $this->precoDolar = $precoDolar;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrecoAreaUtilDolar(): ?float
    {
        return $this->precoAreaUtilDolar;
    }

    /**
     * @param float|null $precoAreaUtilDolar
     * @return EmbraespTable
     */
    public function setPrecoAreaUtilDolar(?float $precoAreaUtilDolar): EmbraespTable
    {
        $this->precoAreaUtilDolar = $precoAreaUtilDolar;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrecoAreaTotalDolar(): ?float
    {
        return $this->precoAreaTotalDolar;
    }

    /**
     * @param float|null $precoAreaTotalDolar
     * @return EmbraespTable
     */
    public function setPrecoAreaTotalDolar(?float $precoAreaTotalDolar): EmbraespTable
    {
        $this->precoAreaTotalDolar = $precoAreaTotalDolar;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAgente(): ?string
    {
        return $this->agente;
    }

    /**
     * @param string|null $agente
     * @return EmbraespTable
     */
    public function setAgente(?string $agente): EmbraespTable
    {
        $this->agente = $agente;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVendedora(): ?string
    {
        return $this->vendedora;
    }

    /**
     * @param string|null $vendedora
     * @return EmbraespTable
     */
    public function setVendedora(?string $vendedora): EmbraespTable
    {
        $this->vendedora = $vendedora;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getConsultora(): ?string
    {
        return $this->consultora;
    }

    /**
     * @param string|null $consultora
     * @return EmbraespTable
     */
    public function setConsultora(?string $consultora): EmbraespTable
    {
        $this->consultora = $consultora;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEngenheiro(): ?string
    {
        return $this->engenheiro;
    }

    /**
     * @param string|null $engenheiro
     * @return EmbraespTable
     */
    public function setEngenheiro(?string $engenheiro): EmbraespTable
    {
        $this->engenheiro = $engenheiro;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getArquiteto(): ?string
    {
        return $this->arquiteto;
    }

    /**
     * @param string|null $arquiteto
     * @return EmbraespTable
     */
    public function setArquiteto(?string $arquiteto): EmbraespTable
    {
        $this->arquiteto = $arquiteto;
        return $this;
    }


}