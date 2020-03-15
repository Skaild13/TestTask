<?php 

class CheckingUpdatingCest
{
    public function updateString(AcceptanceTester $I)
    {
        $I->amOnPage('/sql/trysql.asp?filename=trysql_select_all'); //getting on the testing page
        $I->maximizeWindow(); //full screen mode
        $I->executeJS('document.getElementsByClassName("CodeMirror")[0].CodeMirror.setValue(\'select * from Customers where CustomerID = "1"\')'); //selecting the entry from BD where CustomerID = 1
        $I->click('.w3-btn');
        $I->executeJS('document.getElementsByClassName("CodeMirror")[0].CodeMirror.setValue(\'update Customers set CustomerName = "Queen Elizabeth", ContactName = "Mary Shelly", Address = "Buckingham Palace", City = "Westminster", PostalCode = "111", Country = "Australia" where CustomerID = "1"\')'); //updating this entry with new values
        $I->click('.w3-btn');
        $I->executeJS('document.getElementsByClassName("CodeMirror")[0].CodeMirror.setValue(\'select * from Customers where CustomerID = "1"\')'); // selecting updated entry
        $I->click('.w3-btn');
        $I->see('Queen Elizabeth', '//*[@id="divResultSQL"]/div/table/tbody/tr[2]/td[2]'); //we can see the certain CustomertName
        $I->see('Mary Shelly', '//*[@id="divResultSQL"]/div/table/tbody/tr[2]/td[3]'); //we can see the certain ContactName
        $I->see('Buckingham Palace', '//*[@id="divResultSQL"]/div/table/tbody/tr[2]/td[4]'); //we can see the certain Address
        $I->see('Westminster', '//*[@id="divResultSQL"]/div/table/tbody/tr[2]/td[5]'); //we can see the certain City
        $I->see('111', '//*[@id="divResultSQL"]/div/table/tbody/tr[2]/td[6]'); //we can see the certain PostalCode
        $I->see('Australia', '//*[@id="divResultSQL"]/div/table/tbody/tr[2]/td[7]'); //we can see the certain Country
        $I->click('.w3-dark-gray'); // Restore BD to defaults
        $I->wait('1');
    }
}
