<?php

class Carrinho
{
    private $total;
    private $produtos;

    public function calcularTotal()
    {
        $this->total = 0;
        foreach ($this->produtos as $prod) {
            $this->total += unserialize($prod)->getPreco();
        }
        return $this->total;
    }

    /**
     * @return mixed
     */
    public function getProdutos()
    {
        return $this->produtos;
    }

    /**
     * @param mixed $produtos
     *
     * @return self
     */
    public function setProdutos($produtos)
    {
        $this->produtos = $produtos;
        return $this;
    }
}
