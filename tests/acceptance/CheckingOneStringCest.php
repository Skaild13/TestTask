<?php 

class CheckingOneStringCest
{
    public function allColumns(AcceptanceTester $I)
    {
        $I->amOnPage('/sql/trysql.asp?filename=trysql_select_all'); //getting on the testing page
        $I->maximizeWindow(); //full screen mode
        $I->executeJS('document.getElementsByClassName("CodeMirror")[0].CodeMirror.setValue("select * from Customers")'); //writing SQL request for showing all entries in the DB
        $I->click('.w3-btn'); // executing SQL request
        $I->see('Giovanni Rovelli'); //We can see if the appropriate entry in the DB
        $I->executeJS('document.getElementsByClassName("CodeMirror")[0].CodeMirror.setValue(\'select * from Customers where ContactName = "Giovanni Rovelli"\')'); //jumping to the appropriate entry
        $I->click('.w3-btn');
        $I->see('Giovanni Rovelli', '//*[@id="divResultSQL"]/div/table/tbody/tr[2]/td[3]'); //we can see the certain ContactName
        $I->see('Via Ludovico il Moro 22', '//*[@id="divResultSQL"]/div/table/tbody/tr[2]/td[4]'); // we can see the certain Address
        $I->click('.w3-dark-gray'); // Restore BD to defaults
        $I->wait('1');
    }
}
