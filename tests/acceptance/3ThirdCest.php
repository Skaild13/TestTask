<?php 

class ThirdCest
{

    public function addNew(AcceptanceTester $I)
    {
        $I->amOnPage('/sql/trysql.asp?filename=trysql_select_all');
        $I->maximizeWindow();
        $I->executeJS('document.getElementsByClassName(\'CodeMirror\')[0].CodeMirror.setValue(\'insert into Customers (CustomerID, CustomerName, ContactName, Address, City, PostalCode, Country) values ("92", "Skaild Leprechaun", "Oberon", "Eireann go bragh", "Dublin", "www mmm", "Ireland");\')');
        $I->click('.w3-btn');
        $I->executeJS('document.getElementsByClassName(\'CodeMirror\')[0].CodeMirror.setValue(\'select * from Customers where CustomerID = "92"\')');
        $I->click('.w3-btn');
        $I->canSee('Skaild Leprechaun');
        $I->canSee('Oberon');
        $I->canSee('Eireann go bragh');
        $I->canSee('Dublin');
        $I->canSee('www mmm');
        $I->canSee('Ireland');
        $I->click('.w3-dark-gray');
        $I->wait('1');
    }
}
