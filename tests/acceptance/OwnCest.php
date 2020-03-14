<?php 

class OwnCest
{

    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/sql/trysql.asp?filename=trysql_select_all');
        $I->maximizeWindow();
        $I->executeJS('document.getElementsByClassName(\'CodeMirror\')[0].CodeMirror.setValue(\'select * from Customers where CustomerID = 0 \')');
        $I->click('.w3-btn');
        $I->canSee('No result');
        $I->executeJS('document.getElementsByClassName(\'CodeMirror\')[0].CodeMirror.setValue(\'insert into Customers (CustomerID, CustomerName, ContactName, Address, City, PostalCode, Country) values ("0", "", "", "", "", "", "") \')');
        $I->click('.w3-btn');
        $I->executeJS('document.getElementsByClassName(\'CodeMirror\')[0].CodeMirror.setValue(\'select * from Customers where CustomerID = 0 \')');
        $I->click('.w3-btn');
        $I->click('.w3-dark-gray');
        $I->wait('1');    }
}
