<?php

class CpfCnpj
{
    private string $documento;

    private function __construct(
        string $documento
    ) {
        $this->documento = $documento;
    }

   public static function cpfConfiavel(string $cpfConfiavel): self
    {
        $numeroNovo = preg_replace('/[^0-9]/', '', $cpfConfiavel);

        $numeros = strlen($numeroNovo);

        if ($numeros <= 11) {
            $numeroNovo = str_pad($numeroNovo, 11, '0', STR_PAD_LEFT);
        } else {
            $numeroNovo = str_pad($numeroNovo, 14, '0', STR_PAD_LEFT);
        }

        return new self($numeroNovo);
    }

    public function getDocumento(): string
    {
        return $this->documento;
    }

    public function getDocumentoFormatado(): string
    {
        return $this->eCpf()
            ? preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $this->documento)
            : preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $this->documento);
    }

    public function eCpf(): bool
    {
        return strlen($this->documento) === 11;
    }

    public function eCnpj(): bool
    {
        return strlen($this->documento) === 14;
    }
}
