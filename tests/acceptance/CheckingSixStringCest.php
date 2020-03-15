<?php 

class CheckingSixStringCest
{
    public function sixStringCount(AcceptanceTester $I)
    {
        $I->amOnPage('/sql/trysql.asp?filename=trysql_select_all'); //getting on the testing page
        $I->maximizeWindow(); //full screen mode
        $I->executeJS('document.getElementsByClassName("CodeMirror")[0].CodeMirror.setValue(\'select * from Customers where city = "London"\')'); //writing SQL request for showing all entries in the DB, where Address = 'London'
        $I->click('.w3-btn');
        $I->executeJS('document.getElementsByClassName("CodeMirror")[0].CodeMirror.setValue(\'select count(1) from Customers where city = "London"\')'); //count all entries in the DB, where Address = 'London'
        $I->click('.w3-btn');
        $I->see('6', '//*[@id="divResultSQL"]/div/table/tbody/tr[2]/td'); //we can see the nubmer of all entries in the DB, where Address = 'London'
        $I->click('.w3-dark-gray'); // Restore BD to defaults
        $I->wait('1');
    }
}
