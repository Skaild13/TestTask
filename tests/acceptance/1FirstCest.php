<?php 

class FirstCest
{

    public function allColumns(AcceptanceTester $I)
    {
        $I->amOnPage('/sql/trysql.asp?filename=trysql_select_all');
        $I->maximizeWindow();
        $I->executeJS('document.getElementsByClassName(\'CodeMirror\')[0].CodeMirror.setValue(\'select * from Customers \')');
        $I->click('.w3-btn');
        $I->wait('2');
        $I->canSee('Giovanni Rovelli');
        $I->executeJS('document.getElementsByClassName(\'CodeMirror\')[0].CodeMirror.setValue(\'select * from Customers where ContactName = "Giovanni Rovelli"\')');
        $I->click('.w3-btn');
        $giovanniAddress = 'Via Ludovico il Moro 22';
        $I->canSee('Giovanni Rovelli');
        $I->canSee($giovanniAddress);
        $I->click('.w3-dark-gray');
        $I->wait('1');
        #$I->


    }
}
