<?php 

class FourthCest
{

    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/sql/trysql.asp?filename=trysql_select_all');
        $I->maximizeWindow();
        $I->executeJS('document.getElementsByClassName(\'CodeMirror\')[0].CodeMirror.setValue(\'select * from Customers where CustomerID = "1"\')');
        $I->click('.w3-btn');
        $I->executeJS('document.getElementsByClassName(\'CodeMirror\')[0].CodeMirror.setValue(\'update Customers set CustomerName = "Queen Elizabeth", ContactName = "Mary Shelly", Address = "Buckingham Palace", City = "Westminster", PostalCode = "111", Country = "Australia" where CustomerID = "1"\')');
        $I->click('.w3-btn');
        $I->executeJS('document.getElementsByClassName(\'CodeMirror\')[0].CodeMirror.setValue(\'select * from Customers where CustomerID = "1"\')');
        $I->click('.w3-btn');
        $I->canSee('Queen Elizabeth');
        $I->canSee('Mary Shelly');
        $I->canSee('Buckingham Palace');
        $I->canSee('Westminster');
        $I->canSee('111');
        $I->canSee('Australia');
        $I->click('.w3-dark-gray');
        $I->wait('1');
    }
}
