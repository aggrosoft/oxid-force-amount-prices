<?php

class agforceamountprices_oxarticle extends agforceamountprices_oxarticle_parent {

    protected function _getAmountPrice($amount = 1) // phpcs:ignore PSR2.Methods.MethodDeclaration.Underscore
    {
        startProfile("_getAmountPrice");

        $dPrice = $this->_getGroupPrice();
        $blCheckGroupPrice = true;

        // if no group price is base price, do not check
        if ($dPrice === $this->oxarticles__oxprice->value){
            $blCheckGroupPrice = false;
        }

        $oAmtPrices = $this->_getAmountPriceList();
        foreach ($oAmtPrices as $oAmPrice) {
            if (
                $oAmPrice->oxprice2article__oxamount->value <= $amount
                && $amount <= $oAmPrice->oxprice2article__oxamountto->value
                && (! $blCheckGroupPrice || $dPrice > $oAmPrice->oxprice2article__oxaddabs->value )
            ) {
                $dPrice = $oAmPrice->oxprice2article__oxaddabs->value;
            }
        }

        stopProfile("_getAmountPrice");

        return $dPrice;
    }

}