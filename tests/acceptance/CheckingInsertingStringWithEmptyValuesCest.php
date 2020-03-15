<?php 

class CheckingInsertingStringWithEmptyValuesCest
{
    public function insertString(AcceptanceTester $I)
    {
        $I->amOnPage('/sql/trysql.asp?filename=trysql_select_all'); //getting on the testing page
        $I->maximizeWindow(); //full screen mode
        $I->executeJS('document.getElementsByClassName("CodeMirror")[0].CodeMirror.setValue(\'select * from Customers where CustomerID = 0 \')'); //checking if there is an entry with CustomerID = 0
        $I->click('.w3-btn');
        $I->see('No result', '//*[@id="divResultSQL"]/div'); // we can see - there is no such an entry
        $I->executeJS('document.getElementsByClassName("CodeMirror")[0].CodeMirror.setValue(\'insert into Customers (CustomerID, CustomerName, ContactName, Address, City, PostalCode, Country) values ("0", "", "", "", "", "", "") \')'); //adding new entry with CustomerID = 0 and empty all other fields
        $I->click('.w3-btn');
        $I->see('You have made changes to the database. Rows affected: 1', '//*[@id="divResultSQL"]/div'); //we can see entry is successful added
        $I->executeJS('document.getElementsByClassName("CodeMirror")[0].CodeMirror.setValue(\'select * from Customers where CustomerID = 0 \')'); //selecting the appropriate entry
        $I->click('.w3-btn');
        $I->executeJS('document.getElementsByClassName("CodeMirror")[0].CodeMirror.setValue(\'select count(1) from Customers where CustomerID = 0 \')'); //counting the number of entries where CustomerID = 0
        $I->click('.w3-btn');
        $I->see('1', '//*[@id="divResultSQL"]/div/table/tbody/tr[2]/td'); //we can see there is only one such an entry
        $I->click('.w3-dark-gray'); // Restore BD to defaults
        $I->wait('1');
    }
}
