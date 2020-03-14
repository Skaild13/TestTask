<?php 

class SecondCest
{

    public function numberOfstrings(AcceptanceTester $I)
    {
        $I->amOnPage('/sql/trysql.asp?filename=trysql_select_all');
        $I->maximizeWindow();
        $I->executeJS('document.getElementsByClassName(\'CodeMirror\')[0].CodeMirror.setValue(\'select * from Customers where city = "London"\')');
        $I->click('.w3-btn');
        $I->executeJS('document.getElementsByClassName(\'CodeMirror\')[0].CodeMirror.setValue(\'select count(1) from Customers where city = "London"\')');
        $I->click('.w3-btn');
        $I->canSee('6');
        $I->click('.w3-dark-gray');
        $I->wait('1');

    }
}
