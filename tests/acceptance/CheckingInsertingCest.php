<?php 

class CheckingInsertingCest
{
    public function addNew(AcceptanceTester $I)
    {
        $I->amOnPage('/sql/trysql.asp?filename=trysql_select_all'); //getting on the testing page
        $I->maximizeWindow(); //full screen mode
        $I->executeJS('document.getElementsByClassName("CodeMirror")[0].CodeMirror.setValue(\'insert into Customers (CustomerID, CustomerName, ContactName, Address, City, PostalCode, Country) values ("92", "Skaild Leprechaun", "Oberon", "Eireann go bragh", "Dublin", "www mmm", "Ireland");\')'); //adding new entry to the DB
        $I->click('.w3-btn');
        $I->wait('1');
        $I->executeJS('document.getElementsByClassName("CodeMirror")[0].CodeMirror.setValue(\'select * from Customers where CustomerID = "92"\')'); // selecting added entry
        $I->click('.w3-btn');
        $I->see('Skaild Leprechaun', '//*[@id="divResultSQL"]/div/table/tbody/tr[2]/td[2]'); //we can see the certain CustomertName
        $I->see('Oberon', '//*[@id="divResultSQL"]/div/table/tbody/tr[2]/td[3]'); //we can see the certain ContactName
        $I->see('Eireann go bragh', '//*[@id="divResultSQL"]/div/table/tbody/tr[2]/td[4]'); //we can see the certain Address
        $I->see('Dublin', '//*[@id="divResultSQL"]/div/table/tbody/tr[2]/td[5]'); //we can see the certain City
        $I->see('www mmm', '//*[@id="divResultSQL"]/div/table/tbody/tr[2]/td[6]'); //we can see the certain PostalCode
        $I->see('Ireland', '//*[@id="divResultSQL"]/div/table/tbody/tr[2]/td[7]'); //we can see the certain Country
        $I->click('.w3-dark-gray'); // Restore BD to defaults
        $I->wait('1');
    }
}
