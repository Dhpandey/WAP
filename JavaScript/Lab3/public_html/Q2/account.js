(function () {
    "use strict";

    var accountObjects = [];  //holds the actual account objects

    //This is the accounts "module", which is actually an object factory.
    //The factory returns an object with methods that have free variables.  The 
    //free variables are the private variables in the "module".  They are private
    //because they are local to the anonymous function.  The closures on the
    //public methods make them accessible to the public methods even after the
    //anonymous function has finished its execution.  kl9/18/13
    var accounts472 = function () {

        var acctName;
        var acctBalance;

        function createNewAcc() {
            acctName = document.getElementById('accType').value;
            acctBalance = document.getElementById('deposit').value;
        }

        //the public function for creating an account using the information from the html fields
        //CODE NEEDED HERE

        //public helper method for getting the account info as a string
        function makeInfoString() {
            return "Account name:  " + acctName + "  Balance:  " + acctBalance;
        }

        return {// Return an object that is assigned to Module
            createAccount: createNewAcc,
            getInfo: makeInfoString
        };
    };

    //displays the account info on the page
    function displayAccountList() {
        var response = document.getElementById("text");
        var accountsList = [];
        var acctIdx;

        //generate the account list string from the account objects here--make sure they have not been modified by new accounts
        for (acctIdx = 0; acctIdx < accountObjects.length; acctIdx += 1) {
            accountsList.push(accountObjects[acctIdx].getInfo());
        }
        response.value = accountsList.join("\n");
    }

    //create new accout, add to list, display list
    function addNewAccount() {
        var newAcct = accounts472();
        newAcct.createAccount();
        accountObjects.push(newAcct);
        displayAccountList();
    }

    //load event handler
    window.onload = function () {
        var createBtn = document.getElementById("create");
        createBtn.onclick = addNewAccount;
    };

}()); //end of namespace module



//mysolution

//
//(function () {
//    'use strict';
//    var accountInfoList = [];
//    var account = function () {
//        var accType;
//        var deposit;
//        function getAccounts() {
//            accType = document.getElementById('accType').value;
//            deposit = document.getElementById('deposit').value;
//        }
//        return {
//            'accounts': function () {
//                getAccounts();
//                accountInfoList.push(this);
//            },
//            'accountType': function () {
//                return accType;
//            },
//            'deposit': function () {
//                return deposit;
//            }
//        };
//
//    };
//
//    function createAccount() {
//        var acc = new account();
//        acc.accounts();
//        var i;
//        var list = "";
//        for (i = 0; i < accountInfoList.length; i++) {
//            list += "Account Type: " + accountInfoList[i].accountType() + "Deposit: " + accountInfoList[i].deposit() + "\n";
//        }
//        document.getElementById('text').value = list;
//    }
//
//    window.onload = function () {
//        document.getElementById("create").onclick = createAccount;
//    };
//})();

